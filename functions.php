<?php

// it activates lazy-load for styles, scripts and other things
define('CUSTOM_LAZY_LOAD_ENABLED', true);
require_once  get_template_directory() . '/inc/admin-customizer.php';

require_once  get_template_directory() . '/inc/post-customizer.php';

require_once  get_template_directory() . '/inc/Header_Walker_Nav_Menu.php';

require_once  get_template_directory() . '/inc/languages.php';

require_once get_template_directory() . '/inc/kama-thumbnail/kama_thumbnail.php';

require_once get_template_directory() . '/inc/carbon-fields/index.php';

require_once  get_template_directory() . '/inc/excerpt.php';

require_once  get_template_directory() . '/inc/admin/index.php';





if (!function_exists('inhubber_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function inhubber_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MyTheme, use a find and replace
		 * to change 'mytheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('inhubber', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => __('Main Menu', 'inhubber'),
				'product-menu' => __('Product', 'inhubber'),
				'solutions-menu' => __('Solutions', 'inhubber'),
				'resources-menu' => __('Resources', 'inhubber'),
				'company-menu' => __('Company', 'inhubber'),
				'compare-menu' => __('Compare', 'inhubber'),
                'industries-menu' => __('Industries', 'inhubber'),
                'teams-menu' => __('Teams', 'inhubber'),
			)
		);
	}
endif;
add_action('after_setup_theme', 'inhubber_setup');


// add_action('wp_enqueue_scripts', function() {
//   if(isset($_GET['remove_swiper'])) {
//     wp_dequeue_style('wp-block-library');
//     wp_dequeue_style('wp-block-library-theme');

//     if ( is_singular() && has_blocks( get_the_ID() ) ) {
//         wp_enqueue_style('wp-block-library');
//     }
//   }
// }, 20);


// add_action('wp_enqueue_scripts', 'inhubber_critical_scripts');
// function inhubber_critical_scripts() {
//   if(isset($_GET['remove_swiper'])) {

//     wp_deregister_script('jquery');
//     wp_deregister_script('jquery-core');
//     wp_deregister_script('jquery-migrate');
//   }
// 	wp_enqueue_style( 'inhubber-mystyle', get_template_directory_uri() . '/assets/css/style.css');
// }

// add_filter('style_loader_tag', function ($html, $handle, $href, $media) {
//   if ($handle !== 'inhubber-mystyle') return $html;

//   $href = esc_url($href);
//   return sprintf(
//     '<link rel="preload" as="style" href="%1$s" onload="this.onload=null;this.rel=\'stylesheet\'">' .
//     '<noscript><link rel="stylesheet" href="%1$s"></noscript>',
//     $href
//   );
// }, 10, 4);

// // Defer all enqueued scripts except those with specific handles if needed
// add_filter('script_loader_tag', function($tag, $handle) {
//   // Add handles here you do NOT want to defer
//   if(!isset($_GET['remove_swiper'])) {
//     return $tag;
//   }
//   $no_defer = array('jquery');
//   if (in_array($handle, $no_defer)) {
//     return $tag;
//   }
//   // Only add defer if not already present
//   if (strpos($tag, ' defer') === false) {
//     return str_replace(' src', ' defer src', $tag);
//   }
//   return $tag;
// }, 10, 2);

require_once get_template_directory() . '/scripts-styles.php';
require_once get_template_directory() . '/local-proxy.php';

add_filter('intermediate_image_sizes_advanced', 'true_remove_default_sizes');

function true_remove_default_sizes($sizes)
{
	unset($sizes['medium']); // средний
	unset($sizes['large']); // крупный
	unset($sizes['medium_large']); // с шириной 768
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}





if (
	function_exists('carbon_get_post_meta')
	&& ($my_meta = carbon_get_post_meta(get_the_ID(), 'truemisha_page_num'))
) {
	echo $meta;
}


function carbon_lang_prefix() {
	$prefix = '';
	if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
		return $prefix;
	}
	$prefix = '_' . ICL_LANGUAGE_CODE;
	return $prefix;
}


require_once get_template_directory() . '/inc/library-ajax.php';
require_once get_template_directory() . '/inc/blog-ajax.php';
require_once get_template_directory() . '/inc/glossary-ajax.php';

add_action('admin_head', 'my_custom_styles');
function my_custom_styles() {
  echo '<style>.mce-container-body .mce-container iframe {
	min-height: 3em !important;
}</style>';
}


/**
 * Add hubspot form shortcode;
 */
function add_hubspot_form($atts)
{

    $atts = shortcode_atts(array(
        'region' => 'na1',
        'portal_id' => '6737149',
        'form_id' => 'c09f92f9-95ec-4f80-a6eb-ce813cce18e0',
    ), $atts);

    $script = '<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                <script>
                hbspt.forms.create({
                region: "' . $atts['region'] . '",
                portalId: "' . $atts['portal_id'] . '",
                formId: "' . $atts['form_id'] . '"
                });
                </script>
                <style>
                    .hbspt-form iframe [type="submit"] {
                        background: #7363E0;
                        border-radius: 8px;
                        padding: 4px 15px;
                        font-weight: 500;
                        color: #FFFFFF;
                        transition: all 0.3s ease;
                        font-size: 14px;
                        height: 32px;
                        line-height: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                </style>';

    return $script;
}

add_shortcode('hubspot_form', 'add_hubspot_form'); // [hubspot_form] region, portal_id, form_id


// allow events to have categories, to avoid error on trying to show related posts, see single.php, l. 49
function create_event_taxonomy() {
    register_taxonomy(
        'event_categories', // taxonomy name
        'events', // connected post type
        array(
            'label' => __( 'Event Categories' ),
            'rewrite' => array( 'slug' => 'event-category' ),
            'hierarchical' => true,
            'show_admin_column' => false, // hide, because not used
        )
    );
}


add_action( 'init', 'create_event_taxonomy' );

/////////////////////////////////////////

add_filter('template_include', function ($template) {
	if (is_single()) {
		$categories = get_the_category();
		$category_slugs = wp_list_pluck($categories, 'slug');

		foreach ($category_slugs as $slug) {
			$new_template = locate_template("single-{$slug}.php");
			if ($new_template) {
				return $new_template;
			}
		}
	}
	return $template;
});

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
      'page_title'    => 'ACF Global Settings',
      'menu_title'    => 'ACF Global Settings',
      'menu_slug'     => 'global-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
  ));
}


////////////////////////////////////////////



function mytheme_setup() {
    add_theme_support('post-thumbnails'); // Поддержка миниатюр (если нужно)
    add_theme_support('post-tags'); // Это необязательно, теги работают по умолчанию
}
add_action('after_setup_theme', 'mytheme_setup');

function fix_post_tags_support() {
    // Повторно регистрируем стандартную таксономию меток для записей
    register_taxonomy_for_object_type('post_tag', 'post');

    // Убеждаемся, что у постов включена поддержка меток
    $post_type = get_post_type_object('post');
    if (!in_array('post_tag', get_object_taxonomies('post'))) {
        add_post_type_support('post', 'post_tag');
    }
}
add_action('init', 'fix_post_tags_support', 100);

function custom_taxonomy() {
    // Регистрируем таксономию для меток
    register_taxonomy(
        'post_tag',  // Имя таксономии (метки)
        'post',      // Тип записи (post)
        array(
            'hierarchical' => false,
            'label' => 'Метки',
            'show_ui' => true,
            'show_tagcloud' => true,
            'show_in_rest' => true, // Для использования в блоках и REST API
            'rewrite' => array( 'slug' => 'tag' ),
        )
    );
}
add_action('init', 'custom_taxonomy');



/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}
add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

function add_svg_to_upload_mimes( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes' );

// Безопасная обработка SVG перед сохранением
function sanitize_svg_on_upload($file) {
    if ($file['type'] === 'image/svg+xml') {
        $svg = file_get_contents($file['tmp_name']);
        // Удаляем потенциально опасный JS и ненужные теги
        $svg = preg_replace('/<script.*?<\/script>/is', '', $svg);       // скрипты
        $svg = preg_replace('/<\?php.*?\?>/is', '', $svg);               // php-теги
        $svg = preg_replace('/<!--.*?-->/s', '', $svg);                  // комментарии

        // Минимизация пробелов
        $svg = preg_replace('/\s+/', ' ', $svg);                         // все пробелы
        $svg = preg_replace('/>\s+</', '><', $svg);                      // между тегами
        $svg = trim($svg);

        file_put_contents($file['tmp_name'], $svg);
    }
    return $file;
}

add_filter('wp_handle_upload_prefilter', 'sanitize_svg_on_upload');

/** Отключения Отключение авто обновлений плагинов и тем */
// Отключение авто обновлений плагинов
add_filter('auto_update_plugin', '__return_false');
// Отключение авто обновлений тем
add_filter('auto_update_theme', '__return_false');
/** END - Отключения Отключение авто обновлений плагинов и тем */

add_filter( 'pll_rel_hreflang_attributes', function( $hreflangs ) {
    $hreflangs['x-default'] = $hreflangs['en'];
    return $hreflangs;
} );

// Вимкнути короткі посилання WordPress
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11, 0);

// Disable RSS Feeds
function disable_rss_feeds() {
  wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}
add_action('do_feed', 'disable_rss_feeds', 1);
add_action('do_feed_rdf', 'disable_rss_feeds', 1);
add_action('do_feed_rss', 'disable_rss_feeds', 1);
add_action('do_feed_rss2', 'disable_rss_feeds', 1);
add_action('do_feed_atom', 'disable_rss_feeds', 1);
add_action('do_feed_rss2_comments', 'disable_rss_feeds', 1);
add_action('do_feed_atom_comments', 'disable_rss_feeds', 1);

// Remove RSS feed links from header
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);



add_filter( 'rank_math/frontend/canonical', function( $canonical ) {
  global $post;

  if ( is_singular() && isset( $post->ID ) ) {
      $canonical = get_permalink( $post->ID );
  }
  return $canonical;
});

/**
 * Возвращает исходные размеры изображения.
 *
 * Для PNG/JPG/WebP берет данные из WordPress.
 * Для SVG читает width/height или viewBox.
 */
function inhubber_get_image_dimensions( $image ) {
    $dimensions = array(
        'width'  => 0,
        'height' => 0,
    );

    if ( empty( $image ) || ! is_array( $image ) ) {
        return $dimensions;
    }

    // ACF уже может содержать размеры PNG/JPG/WebP.
    if ( ! empty( $image['width'] ) && ! empty( $image['height'] ) ) {
        return array(
            'width'  => (int) $image['width'],
            'height' => (int) $image['height'],
        );
    }

    $attachment_id = ! empty( $image['ID'] )
        ? (int) $image['ID']
        : 0;

    if ( ! $attachment_id ) {
        return $dimensions;
    }

    // Проверяем метаданные WordPress.
    $metadata = wp_get_attachment_metadata( $attachment_id );

    if (
        ! empty( $metadata['width'] ) &&
        ! empty( $metadata['height'] )
    ) {
        return array(
            'width'  => (int) $metadata['width'],
            'height' => (int) $metadata['height'],
        );
    }

    // Для SVG получаем размеры непосредственно из файла.
    $file_path = get_attached_file( $attachment_id );
    $mime_type = get_post_mime_type( $attachment_id );

    if (
        'image/svg+xml' !== $mime_type ||
        ! $file_path ||
        ! is_readable( $file_path )
    ) {
        return $dimensions;
    }

    $svg_content = file_get_contents( $file_path );

    if ( ! $svg_content ) {
        return $dimensions;
    }

    // Сначала пробуем width и height.
    if (
        preg_match( '/<svg[^>]*\bwidth=["\']([\d.]+)(?:px)?["\']/i', $svg_content, $width_match ) &&
        preg_match( '/<svg[^>]*\bheight=["\']([\d.]+)(?:px)?["\']/i', $svg_content, $height_match )
    ) {
        return array(
            'width'  => (int) round( (float) $width_match[1] ),
            'height' => (int) round( (float) $height_match[1] ),
        );
    }

    // Если width/height отсутствуют, берем пропорции из viewBox.
    if (
        preg_match(
            '/<svg[^>]*\bviewBox=["\'][\d.\-]+\s+[\d.\-]+\s+([\d.]+)\s+([\d.]+)["\']/i',
            $svg_content,
            $viewbox_match
        )
    ) {
        return array(
            'width'  => (int) round( (float) $viewbox_match[1] ),
            'height' => (int) round( (float) $viewbox_match[2] ),
        );
    }

    return $dimensions;
}

function inhubber_get_svg_dimensions($svg_path) {
    $width  = '';
    $height = '';

    if (file_exists($svg_path)) {
        $svg = simplexml_load_file($svg_path);

        if ($svg !== false) {
            $attributes = $svg->attributes();

            // Если в SVG заданы width и height
            $width  = isset($attributes->width)
                ? preg_replace('/[^0-9.]/', '', (string) $attributes->width)
                : '';

            $height = isset($attributes->height)
                ? preg_replace('/[^0-9.]/', '', (string) $attributes->height)
                : '';

            // Если размеров нет, получаем их из viewBox
            if ((!$width || !$height) && isset($attributes->viewBox)) {
                $view_box = preg_split(
                    '/[\s,]+/',
                    trim((string) $attributes->viewBox)
                );

                if (count($view_box) === 4) {
                    $width  = $view_box[2];
                    $height = $view_box[3];
                }
            }
        }
    }

    return array('width' => $width, 'height' => $height);
}

add_action('after_setup_theme', function () {
    add_image_size('customer-logo-mobile', 150, 50, false);
});

function inhubber_get_mobile_logo_url($attachment_id)
{
    $attachment_id = (int) $attachment_id;

    // Проверяем, существует ли уже мобильная копия.
    $mobile_image = image_get_intermediate_size(
        $attachment_id,
        'customer-logo-mobile'
    );

    if (!empty($mobile_image['url'])) {
        return $mobile_image['url'];
    }

    $original_path = get_attached_file($attachment_id);

    if (!$original_path || !file_exists($original_path)) {
        return wp_get_attachment_url($attachment_id);
    }

    /*
     * Создаём изображение, вписанное в область 150×50.
     * false — без обрезки, с сохранением пропорций.
     */
    $resized = image_make_intermediate_size(
        $original_path,
        150,
        50,
        false
    );

    if (!$resized || is_wp_error($resized)) {
        return wp_get_attachment_url($attachment_id);
    }

    // Добавляем новый размер в метаданные WordPress.
    $metadata = wp_get_attachment_metadata($attachment_id);

    if (!is_array($metadata)) {
        $metadata = [];
    }

    if (empty($metadata['sizes'])) {
        $metadata['sizes'] = [];
    }

    $metadata['sizes']['customer-logo-mobile'] = $resized;

    wp_update_attachment_metadata(
        $attachment_id,
        $metadata
    );

    $original_url = wp_get_attachment_url($attachment_id);

    return trailingslashit(dirname($original_url)) . $resized['file'];
}

function inhubber_get_mobile_logo_data($attachment_id)
{
    $attachment_id = (int) $attachment_id;

    if (!$attachment_id) {
        return false;
    }

    /*
     * SVG не требует отдельной мобильной версии.
     */
    if (get_post_mime_type($attachment_id) === 'image/svg+xml') {
        return false;
    }

    /*
     * Проверяем, создал ли WordPress нужную
     * миниатюру при загрузке изображения.
     */
    $existing = image_get_intermediate_size(
        $attachment_id,
        'customer-logo-mobile'
    );

    if (
        !empty($existing['url']) &&
        !empty($existing['width']) &&
        !empty($existing['height'])
    ) {
        return [
            'url'    => $existing['url'],
            'width'  => (int) $existing['width'],
            'height' => (int) $existing['height'],
        ];
    }

    /*
     * Если миниатюры нет, создаём её
     * автоматически при первом выводе.
     */
    if (!function_exists('image_make_intermediate_size')) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
    }

    $original_path = get_attached_file($attachment_id);
    $original_url  = wp_get_attachment_url($attachment_id);

    if (
        !$original_path ||
        !file_exists($original_path) ||
        !$original_url
    ) {
        return false;
    }

    $resized = image_make_intermediate_size(
        $original_path,
        150,
        50,
        false
    );

    if (
        !is_array($resized) ||
        empty($resized['file']) ||
        empty($resized['width']) ||
        empty($resized['height'])
    ) {
        return false;
    }

    /*
     * Сохраняем новый размер в метаданных,
     * чтобы больше его не создавать.
     */
    $metadata = wp_get_attachment_metadata($attachment_id);

    if (!is_array($metadata)) {
        $metadata = [];
    }

    if (empty($metadata['sizes'])) {
        $metadata['sizes'] = [];
    }

    $metadata['sizes']['customer-logo-mobile'] = $resized;

    wp_update_attachment_metadata(
        $attachment_id,
        $metadata
    );

    return [
        'url' => trailingslashit(
                dirname($original_url)
            ) . $resized['file'],

        'width'  => (int) $resized['width'],
        'height' => (int) $resized['height'],
    ];
}