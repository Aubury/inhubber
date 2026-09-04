<?php

// --- Admin Settings Page: Lazy Load Settings ---
add_action('admin_menu', function() {
    add_options_page(
        'Lazy Load Settings',
        'Lazy Load Settings',
        'manage_options',
        'inhubber-lazy-load-settings',
        'inhubber_lazy_load_settings_page'
    );
});

add_action('admin_init', function() {
    register_setting('inhubber_lazy_load_group', 'inhubber_no_lazy_load_scripts');
    register_setting('inhubber_lazy_load_group', 'inhubber_critical_styles');
});

function inhubber_lazy_load_settings_page() {
    ?>
    <div class="wrap">
        <h1>Lazy Load Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('inhubber_lazy_load_group'); ?>
            <?php do_settings_sections('inhubber_lazy_load_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">No Lazy-Load Scripts</th>
                    <td>
                        <textarea name="inhubber_no_lazy_load_scripts" rows="3" cols="60"><?php echo esc_textarea(get_option('inhubber_no_lazy_load_scripts', 'assets/external/widget.js, assets/external/widget-test.js')); ?></textarea>
                        <p class="description">Comma-separated list. Scripts matching these values will NOT be lazy-loaded.</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Critical Styles</th>
                    <td>
                        <textarea name="inhubber_critical_styles" rows="3" cols="60"><?php echo esc_textarea(get_option('inhubber_critical_styles', '/assets/css/style.css, /themes/inhubber/style.css')); ?></textarea>
                        <p class="description">Comma-separated list. Styles matching these values will be inlined/minified instead of lazy-loaded.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


// -- LAZY LOAD SCRIPT/STYLE FILTERS --

add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (
        is_admin()
        || wp_doing_ajax()
        || wp_doing_cron()
        || is_customize_preview()
        || is_admin_bar_showing()
    ) {
        return $tag;
    }
    if (basename($_SERVER['PHP_SELF']) === 'wp-login.php') {
        return $tag;
    }
    if (!defined('CUSTOM_LAZY_LOAD_ENABLED') || CUSTOM_LAZY_LOAD_ENABLED != true) {
        return $tag;
    }

    $no_lazy_load_scripts = get_option('inhubber_no_lazy_load_scripts', 'assets/external/widget.js,assets/external/widget-test.js');
    $no_lazy_load_scripts_array = explode(',', str_replace(' ', '', $no_lazy_load_scripts));
    $tag_contains_no_lazy_load_script = false;
    // Normalize URLs for better comparison, especially behind proxies or with encoded URLs
    $normalized_src = rawurldecode($src);
    foreach ($no_lazy_load_scripts_array as $script) {
        if (empty($script)) continue;
        // Try to match $script in both the raw and normalized $src
        if (
            strpos($src, $script) !== false ||
            strpos($normalized_src, $script) !== false
        ) {
            $tag_contains_no_lazy_load_script = true;
            break;
        }
    }
    if ($tag_contains_no_lazy_load_script) {
        // Add defer attribute to scripts that should not be lazy loaded
        // Only add defer to script tags (not inline or noscript etc)
        if (strpos($tag, '<script ') !== false && strpos($tag, 'defer') === false) {
            // Add defer before closing >
            $tag = str_replace('<script ', '<script defer ', $tag);
        }
        return $tag;
    } else {
        return '<input type="hidden" name="lazy-load-script" value="' . esc_attr($tag) . '">';
    }
    return $tag;
}, 10, 3);

add_filter('style_loader_tag', function ($html, $handle, $href, $media) {
    if (
        is_admin()
        || wp_doing_ajax()
        || wp_doing_cron()
        || is_customize_preview()
        || is_admin_bar_showing()
    ) {
        return $html;
    }
    if (basename($_SERVER['PHP_SELF']) === 'wp-login.php') {
        return $html;
    }
    if (!defined('CUSTOM_LAZY_LOAD_ENABLED') || CUSTOM_LAZY_LOAD_ENABLED != true) {
        return $html;
    }

    $critical_styles = get_option('inhubber_critical_styles', '/assets/css/style.css,/themes/inhubber/style.css');
    $critical_styles_array = explode(',', str_replace(' ', '', $critical_styles));
    $is_critical_style = false;
    foreach ($critical_styles_array as $style) {
        if (empty($style)) continue;
        if (strpos($html, $style) !== false) {
            $is_critical_style = true;
            break;
        }
    }
    if (!$is_critical_style) {
        return '<input type="hidden" name="lazy-load-style" value="' . esc_attr($html) . '">';
    }

    // file_exists might not work for styles enqueued from plugins or external URLs,
    // fallback to outputting the original HTML in that case.
    // var_dump($html);

    // Remove query vars from $href before converting it to a file path
    $href_path = strtok($href, '?');
    $cssFile = str_replace(get_template_directory_uri(), get_template_directory(), $href_path);

    // Only minify and inline if the file is local and accessible, otherwise return original HTML.
    if (strpos($href, get_template_directory_uri()) === 0 && is_readable($cssFile)) {
        $css = @file_get_contents($cssFile);
        if ($css !== false) {
            // Simple minification: remove comments, whitespace, and newlines
            $css = preg_replace('!/\*.*?\*/!s', '', $css);     // Remove comments
            $css = preg_replace('/\s+/', ' ', $css);           // Collapse whitespace
            $css = preg_replace('/\s*([{}|:;,])\s*/', '$1', $css); // Remove space around characters
            $css = preg_replace('/;}/', '}', $css);            // Remove unnecessary semicolons
            $css = trim($css);
            return '<style id="' . esc_attr($handle) . '">' . $css . '</style>';
        }
    }
    return $html;
}, 10, 4);



// Enqueue theme's scripts and styles.
function inhubber_scripts() {
    // Files, versions, handles in arrays for looping to reduce repetition
    $assets = [
        'jquery' => [
            'file'   => get_template_directory() . '/assets/js/jquery-3.6.1.min.js',
            'uri'    => get_template_directory_uri() . '/assets/js/jquery-3.6.1.min.js',
            'deps'   => [],
            'in_footer' => true,
            'type'   => 'script',
        ],
        'glightbox_css' => [
            'file' => get_template_directory() . '/assets/css/glightbox.min.css',
            'uri'  => get_template_directory_uri() . '/assets/css/glightbox.min.css',
            'type' => 'style',
        ],
        'style_css' => [
            'file' => get_template_directory() . '/assets/css/style.css',
            'uri'  => get_template_directory_uri() . '/assets/css/style.css',
            'type' => 'style',
        ],
        'theme_style' => [
            'file' => get_stylesheet_directory() . '/style.css',
            'uri'  => get_stylesheet_uri(),
            'type' => 'style',
        ],
        'swiper' => [
            'file'   => get_template_directory() . '/assets/js/swiper-bundle.min.js',
            'uri'    => get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
            'in_footer' => true,
            'type'   => 'script',
        ],
        'glightbox_js' => [
            'file'   => get_template_directory() . '/assets/js/glightbox.min.js',
            'uri'    => get_template_directory_uri() . '/assets/js/glightbox.min.js',
            'in_footer' => true,
            'type'   => 'script',
        ],
        'main_inhubber_script_js' => [
            'file'   => get_template_directory() . '/assets/js/script.min.js',
            'uri'    => get_template_directory_uri() . '/assets/js/script.min.js',
            'in_footer' => true,
            'type'   => 'script',
        ],
        'main_inhubber_main_js' => [
            'file'   => get_template_directory() . '/assets/js/main.js',
            'uri'    => get_template_directory_uri() . '/assets/js/main.js',
            'in_footer' => true,
            'type'   => 'script',
        ],
        'inhubber-fonts' => [
            'uri'  => 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
            'type' => 'style',
        ],
        'calendly-widget-css' => [
            'uri'  => 'https://assets.calendly.com/assets/external/widget.css',
            'type' => 'style',
        ],
        'calendly-widget-js' => [
            'uri'    => 'https://assets.calendly.com/assets/external/widget.js',
            'type'   => 'script',
            'use_local_proxy' => true,
        ],
    ];

    wp_deregister_script('jquery');

    // Cache-busted versions
    $versions = [];
    foreach ($assets as $key => &$asset) { // Pass by reference to allow changing 'uri'
        $versions[$key] = isset($asset['file']) && @file_exists($asset['file']) ? md5_file($asset['file']) : false;
        if (isset($asset['use_local_proxy']) && $asset['use_local_proxy'] == true) {
            $asset['uri'] = home_url('/?_proxy_asset=' . urlencode($asset['uri']));
            $versions[$key] = false;
        }
    }
    unset($asset); // Break the reference
    

    foreach ($assets as $key => $asset) {
        if ($asset['type'] === 'script') {
            wp_enqueue_script($key, $asset['uri'], [], $versions[$key], $asset['in_footer']);
        }
        if ($asset['type'] === 'style') {
            wp_enqueue_style($key, $asset['uri'], [], $versions[$key]);
        }
    }
}
add_action('wp_enqueue_scripts', 'inhubber_scripts');

add_action( 'wp_head', function () {
    ?>
    <link
            rel="preload"
            href="<?php echo esc_url(
                get_template_directory_uri() .
                '/assets/fonts/Inter-Variable.woff2'
            ); ?>"
            as="font"
            type="font/woff2"
            crossorigin
    >

    <?php
    $style_file = get_template_directory() .
        '/assets/css/preload-style.css';

    $style_url = get_template_directory_uri() .
        '/assets/css/preload-style.css';

    if ( file_exists( $style_file ) ) {
        $style_url = add_query_arg(
            'ver',
            md5_file( $style_file ),
            $style_url
        );
    }
    ?>

    <link
            rel="stylesheet"
            href="<?php echo esc_url( $style_url ); ?>"
            as="style"
    >
    
    <?php
}, 1 );

// script for lazy loading scripts and styles
add_action('wp_footer', function() {
    if (defined('CUSTOM_LAZY_LOAD_ENABLED') && CUSTOM_LAZY_LOAD_ENABLED) {
        ?>
        <script>
            let ran = false;

            function injectLazyScripts(e) {
                console.log('injectLazyScripts');
                if (ran) return;
                ran = true;
                // Use setInterval to check if DOM is ready every 100ms, then run the code
                let readyInterval = setInterval(function () {
                    if (document.readyState !== "loading") {
                        clearInterval(readyInterval);
                        document.querySelectorAll(
                            'input[name="lazy-load-script"], input[name="lazy-load-style"]'
                        ).forEach(function (input) {
                            let html = input.value || '';
                            if (html) {
                                let tempDiv = document.createElement('div');
                                tempDiv.innerHTML = html;
                                let node = tempDiv.firstElementChild;
                                if (node) {
                                    if (node.tagName === "SCRIPT") {
                                        let newScript = document.createElement('script');
                                        for (let { name, value } of node.attributes) {
                                            newScript.setAttribute(name, value);
                                        }
                                        if (node.src) {
                                            newScript.src = node.src;
                                        }
                                        if (node.textContent) {
                                            newScript.textContent = node.textContent;
                                        }
                                        document.body.appendChild(newScript);
                                    } else if (node.tagName === "STYLE") {
                                        let newStyle = document.createElement('style');
                                        for (let { name, value } of node.attributes) {
                                            newStyle.setAttribute(name, value);
                                        }
                                        if (node.textContent) {
                                            newStyle.textContent = node.textContent;
                                        }
                                        document.head.appendChild(newStyle);
                                    } else if (node.tagName === "LINK") {
                                        // Properly move <link> tags (for stylesheets, etc)
                                        let newLink = document.createElement('link');
                                        for (let { name, value } of node.attributes) {
                                            newLink.setAttribute(name, value);
                                        }
                                        document.head.appendChild(newLink);
                                    }
                                }
                            }
                            input.parentNode && input.parentNode.removeChild(input);
                        });
                    }
                }, 100);
                console.log(document.readyState);

                // Remove listeners
                window.removeEventListener('mousemove', injectLazyScripts);
                window.removeEventListener('scroll', injectLazyScripts);
                window.removeEventListener('click', injectLazyScripts);
            }

            const isReturning = document.referrer.includes(window.location.hostname);
            if (isReturning) {
                console.log("This is a returning user on the site");
                injectLazyScripts();
            } else {
                window.addEventListener('mousemove', injectLazyScripts, { passive: true, once: true });
                window.addEventListener('scroll', injectLazyScripts, { passive: true, once: true });
                window.addEventListener('click', injectLazyScripts, { passive: true, once: true });
            }
        </script>
        <?php
    }
});