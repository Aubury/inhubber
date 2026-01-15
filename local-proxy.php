<?php
/**
 * Local proxy for third-party JS with caching (plus direct URL allow).
 * 
 * This version allows you to send a direct JS file URL as the _proxy_asset parameter (must be urlencoded).
 * You can use either the simple whitelisted "calendly.js" or a full JS URL.
 *
 * Example usage:
 *   - https://example.com/cdn/calendly.js
 *   - https://example.com/cdn/<?=urlencode('https://cdn.example.com/some.js')?>
 */

add_action('init', function () {
    // Rewrite for /cdn/<key> (legacy, accepts both key and urlencoded URL)
    add_rewrite_rule('^cdn/([^/]+)$', 'index.php?_proxy_asset=$matches[1]', 'top');
    // flush_rewrite_rules(); // Uncomment for diagnostics if rules stop working
});

add_filter('query_vars', function ($vars) {
    $vars[] = '_proxy_asset';
    return $vars;
});

// Proxy logic
add_action('template_redirect', function () {
    $key = get_query_var('_proxy_asset');
    $without_cache = isset($_GET['_proxy_asset_without_cache']);
    if (!$key) return;

    // First allowlist - simple mapping from aliases (legacy)
    $map = [
        'calendly.js' => 'https://assets.calendly.com/assets/external/widget.js',
    ];

    // Try to see if it's a known key in the map, else treat as URL if it looks like one
    $is_url = false;
    $target_url = null;

    if (isset($map[$key])) {
        $target_url = $map[$key];
    } else {
        // Support urlencoded URLs as _proxy_asset
        // nginx or Apache usually passes the urlencoded value, so we decode
        $decoded = urldecode($key);

        // Basic security: only allow http(s) and .js paths
        if (
            preg_match('!^https?://!i', $decoded) &&
            preg_match('!\.js($|\?)!i', $decoded)
        ) {
            $target_url = $decoded;
            $is_url = true;
        }
    }

    if (!$target_url) {
        status_header(404);
        echo 'Not found or not allowed (_proxy_asset must be whitelisted or direct URL to .js)';
        exit;
    }

    // Ensure transient key is safe (cannot use http(s):// in the transient key), use md5 for urls
    $transient_key = 'proxy_asset_' . ($is_url ? md5($target_url) : sanitize_key($key));
    $cached = get_transient($transient_key);
    if ($without_cache) {
        $cached = false;
    }

    // ETag logic
    if ($cached && !empty($_SERVER['HTTP_IF_NONE_MATCH'])) {
        if (trim($_SERVER['HTTP_IF_NONE_MATCH'], '"') === ($cached['etag'] ?? '')) {
            header('HTTP/1.1 304 Not Modified');
            header('Cache-Control: public, max-age=31536000, immutable');
            exit;
        }
    }

    if (!$cached) {
        $res = wp_remote_get($target_url, [
            'timeout' => 15,
            'user-agent' => 'WP Local Proxy (+'.home_url().')',
        ]);
        if (is_wp_error($res)) {
            status_header(502);
            echo "Proxy error: " . esc_html($res->get_error_message());
            exit;
        }
        if (wp_remote_retrieve_response_code($res) !== 200) {
            status_header(wp_remote_retrieve_response_code($res));
            echo "Proxy failed: status ".wp_remote_retrieve_response_code($res);
            exit;
        }

        $body = wp_remote_retrieve_body($res);
        $etag = md5($body);
        $type = wp_remote_retrieve_header($res, 'content-type') ? wp_remote_retrieve_header($res, 'content-type') : 'application/javascript; charset=utf-8';
        $cached = [
            'body' => $body,
            'etag' => $etag,
            'fetched' => time(),
            'type' => $type,
        ];
        set_transient($transient_key, $cached, DAY_IN_SECONDS);
    }

    // Output logic
    header('Content-Type: ' . ($cached['type'] ?: 'application/javascript; charset=utf-8'));
    header('Cache-Control: public, max-age=31536000, immutable');
    header('ETag: "'.$cached['etag'].'"');
    header('Last-Modified: '. gmdate('D, d M Y H:i:s', $cached['fetched']) .' GMT');
    // header('Access-Control-Allow-Origin: *'); // Enable if CORS required

    if (!$cached['body']) {
        status_header(500);
        echo "Proxy internal error: no body";
        exit;
    }
    echo $cached['body'];
    exit;
});