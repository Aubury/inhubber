<?php



##  отменим показ выбранного термина наверху в checkbox списке терминов
add_filter('wp_terms_checklist_args', 'set_checked_ontop_default', 10);
function set_checked_ontop_default($args)
{
	// изменим параметр по умолчанию на false
	if (!isset($args['checked_ontop']))
		$args['checked_ontop'] = false;

	return $args;
}

## Добавляем все типы записей в виджет "Прямо сейчас" в консоли
add_action('dashboard_glance_items', 'add_right_now_info');
function add_right_now_info($items)
{

	if (!current_user_can('edit_posts')) return $items; // выходим

	// типы записей
	$args = array('public' => true, '_builtin' => false);

	$post_types = get_post_types($args, 'object', 'and');

	foreach ($post_types as $post_type) {
		$num_posts = wp_count_posts($post_type->name);
		$num       = number_format_i18n($num_posts->publish);
		$text      = _n($post_type->labels->singular_name, $post_type->labels->name, intval($num_posts->publish));

		$items[] = "<a href=\"edit.php?post_type=$post_type->name\">$num $text</a>";
	}

	// таксономии
	$taxonomies = get_taxonomies($args, 'object', 'and');

	foreach ($taxonomies as $taxonomy) {
		$num_terms = wp_count_terms($taxonomy->name);
		$num       = number_format_i18n($num_terms);
		$text      = _n($taxonomy->labels->singular_name, $taxonomy->labels->name, intval($num_terms));

		$items[] = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$num $text</a>";
	}

	// пользователи
	global $wpdb;

	$num  = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users");
	$text = _n('User', 'Users', $num);

	$items[] = "<a href='users.php'>$num $text</a>";

	return $items;
}




## заменим слово "запии" на "посты" для типа записей 'post'
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
	// заменять автоматически нельзя: Запись = Статья, а в тексте получим "Просмотреть статья"

	$new = array(
		'name'                  => __('Blog', 'inhubber'),
		'singular_name'         => __('Blog', 'inhubber'),
		'add_new'               => __('Add post', 'inhubber'),
		'add_new_item'          => __('Add post', 'inhubber'),
		'edit_item'             => __('Edit post', 'inhubber'),
		'new_item'              => __('New post', 'inhubber'),
		'view_item'             => __('View post', 'inhubber'),
		'search_items'          => __('Search', 'inhubber'),
		'not_found'             => __('Nothing found', 'inhubber'),
		'not_found_in_trash'    => __('Not found in trash', 'inhubber'),
		'parent_item_colon'     => '',
		'all_items'             => __('All post', 'inhubber'),
		'archives'              => __('Archives', 'inhubber'),
		'insert_into_item'      => __('Insert into post', 'inhubber'),
		'uploaded_to_this_item' => __('Uploaded to this post', 'inhubber'),
		'featured_image'        => __('Featured image', 'inhubber'),
		'filter_items_list'     => __('Filter post list', 'inhubber'),
		'items_list_navigation' => __('Post list navigation', 'inhubber'),
		'items_list'            => __('Post list', 'inhubber'),
		'menu_name'             => __('Blog', 'inhubber'),
		'name_admin_bar'        => __('Add post', 'inhubber'),
	);

	return (object) array_merge( (array) $labels, $new );
}


add_action('admin_menu', 'add_user_menu_bubble');
function add_user_menu_bubble()
{
	global $menu;

	// записи
	$count = wp_count_posts()->pending; // на утверждении
	if ($count) {
		foreach ($menu as $key => $value) {
			if ($menu[$key][2] == 'edit.php') {
				$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
				break;
			}
		}
	}
}






/*add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo(){
	echo '<style type="text/css">
	h1 a { background-image:url('.get_bloginfo('template_directory').'/img/logo-white.svg) !important; background-size: 180px !important; width: 200px !important; }
	</style>';
}*/

## Фильтр элементо втаксономии для метабокса таксономий в админке.
## Позволяет удобно фильтровать (искать) элементы таксономии по назанию, когда их очень много
add_action('admin_print_scripts', 'my_admin_term_filter', 99);
function my_admin_term_filter()
{
	$screen = get_current_screen();

	if ('post' !== $screen->base) return; // только для страницы редактирвоания любой записи
?>
	<script>
		jQuery(document).ready(function($) {
			var $categoryDivs = $('.categorydiv');

			$categoryDivs.prepend(
				'<input type="search" class="fc-search-field" placeholder="Поиск..." style="width:100%" />');

			$categoryDivs.on('keyup search', '.fc-search-field', function(event) {

				var searchTerm = event.target.value,
					$listItems = $(this).parent().find('.categorychecklist li');

				if ($.trim(searchTerm)) {
					$listItems.hide().filter(function() {
						return $(this).text().toLowerCase().indexOf(searchTerm.toLowerCase()) !== -1;
					}).show();
				} else {
					$listItems.show();
				}
			});
		});
	</script>
<?php
}





add_filter('login_headerurl', 'custom_login_header_url');
function custom_login_header_url($url)
{

	return home_url();
}


/**
 * Заполняет поле для атрибута alt на основе заголовка изображения при его вставки в контент поста.
 *
 * @param array $response
 *
 * @return array
 */
function change_empty_alt_to_title($response)
{
	if (!$response['alt']) {
		$response['alt'] = sanitize_text_field($response['title']);
	}

	return $response;
}

add_filter('wp_prepare_attachment_for_js', 'change_empty_alt_to_title');


// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function true_rewrite_search_results_permalink()
{
	global $wp_rewrite;
	// обязательно проверим, включены ли чпу, чтобы не закосячить весь поиск
	if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks())
		return;
	if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/search/") === false && !empty($_GET['s'])) {
		wp_redirect(site_url() . "/search/" . urlencode(get_query_var('s')));
		exit;
	}
}

add_action('template_redirect', 'true_rewrite_search_results_permalink');

// вторая функция нужна для поддержки русских букв и специальных символов
function true_urldecode_s($query)
{
	if (is_search()) {
		$query->query_vars['s'] = urldecode($query->query_vars['s']);
	}
	return $query;
}

add_filter('parse_query', 'true_urldecode_s');

add_filter('body_class', function ($classes) {
	foreach ($classes as $key => $class) {
		if ($class == "page") {
			unset($classes[$key]);
		}
	}
	return $classes;
}, 1000);

//Сортировка дереом таксономию https://wp-kama.ru/question/nuzhno-poluchit-spisok-kategorij-taksonomii-soblyudaya-ierarhiyu
function sort_terms_hierarchicaly( & $cats, & $into, $parentId = 0 ){
	foreach( $cats as $i => $cat ){
		if( $cat->parent == $parentId ){
			$into[ $cat->term_id ] = $cat;
			unset( $cats[$i] );
		}
	}

	foreach( $into as $top_cat ){
		$top_cat->children = array();
		sort_terms_hierarchicaly( $cats, $top_cat->children, $top_cat->term_id );
	}
}

add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);

function myplugin_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});




function unregister_taxonomy_post_tag(){
	register_taxonomy('post_tag', array());
	}
add_action('init', 'unregister_taxonomy_post_tag'); 


/** чтоб РЕДАКТОР не удалял теги span без атрибутов */
add_filter('tiny_mce_before_init', 'my_adds_alls_elements', 20);
function my_adds_alls_elements($init) {
if(current_user_can('unfiltered_html')) {
$init['extended_valid_elements'] = 'span[*]';
}
return $init;
}
/** чтоб РЕДАКТОР не удалял теги span без атрибутов */


add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {

	if ( $response['mime'] === 'image/svg+xml' ) {

		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}


add_action( 'admin_menu', 'remove_admin_menus' );
function remove_admin_menus(){
	global $menu;

	$unset_titles = [
		//__( 'Dashboard' ),
		//__( 'Posts' ),
		//__( 'Media' ),
		//__( 'Links' ),
		//__( 'Pages' ),
		//__( 'Appearance' ),
		//__( 'Tools' ),
		//__( 'Users' ),
		//__( 'Settings' ),
		__( 'Comments' ),
		//__( 'Plugins' ),
	];

	end( $menu );
	while( prev( $menu ) ){

		$value = explode( ' ', $menu[ key( $menu ) ][0] );
		$title = $value[0] ?: '';

		if( in_array( $title, $unset_titles, true ) ){
			unset( $menu[ key( $menu ) ] );
		}
	}

}


//Создание категорий для гутенберга
function library_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'category-library',
				'title' => 'library',
			),
			array(
				'slug' => 'category-security',
				'title' => 'security',
			),
			array(
				'slug' => 'category-overwiew',
				'title' => 'Overwiew',
			),

			array(
				'slug' => 'category-inhubber',
				'title' => 'Inhubber',
			),

			array(
				'slug' => 'category-solutions',
				'title' => 'Solutions',
			),

			array(
				'slug' => 'category-about-us',
				'title' => 'AboutUs',
			),

			array(
				'slug' => 'category-customers',
				'title' => 'Customers',
			),

			array(
				'slug' => 'category-customers-single',
				'title' => 'Customers Single',
			),


			


			
			
		)
	);
}
add_filter( 'block_categories', 'library_block_category', 10, 2);
//Создание категорий для гутенберга

