<?php

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
			)
		);
	}
endif;
add_action('after_setup_theme', 'inhubber_setup');


/**
 * Enqueue scripts and styles.
 */
function inhubber_scripts()
{

	global $wp_query; 

	$my_lang = pll_current_language();  

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.1.min.js');
	wp_enqueue_script('jquery');

	wp_enqueue_style( 'inhubber-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
	wp_enqueue_style( 'inhubber-glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css');
	wp_enqueue_style( 'inhubber-mystyle', get_template_directory_uri() . '/assets/css/style.css');
	//wp_enqueue_style( 'inhubber-animate.min.css', get_template_directory_uri() . '/assets/css/animate.min.css');
	wp_enqueue_style('inhubber-style', get_stylesheet_uri(), array(), '1.0');

	wp_enqueue_script( 'inhubber-swiper-bundle.min.js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), false, true );
	//wp_enqueue_script( 'inhubber-wow.min.js', get_template_directory_uri() . '/assets/js/wow.min.js', array(), false, true );
	wp_enqueue_script( 'inhubber-glightbox.min.js', get_template_directory_uri() . '/assets/js/glightbox.min.js', array(), false, true );
	wp_enqueue_script( 'inhubber-script.min.js', get_template_directory_uri() . '/assets/js/script.min.js', array(), false, true );
	wp_enqueue_script( 'inhubber-main.js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );
	if($my_lang == 'en') {
		wp_enqueue_script( 'inhubber-en.js', get_template_directory_uri() . '/assets/js/en.js', array(), false, true );
	}
	if($my_lang == 'de') {
		wp_enqueue_script( 'inhubber-de.js', get_template_directory_uri() . '/assets/js/de.js', array(), false, true );
	}

	



}
add_action('wp_enqueue_scripts', 'inhubber_scripts');


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

