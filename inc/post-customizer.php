<?php 

//Library library


add_action('init','library');

function library() {



	register_post_type('library',array(
		
		'public'=>true,
		'supports' => array('title', 'thumbnail', 'editor'),
		'menu_position' => 7,
		'menu_icon' => 'dashicons-book',
		'has_archive' => true,
		'show_in_rest' => true,
		'taxonomies' => ['library_cat'],
		'labels' => array(
			'name' => __('Library', 'inhubber'),
			'all_items' => __('All Library', 'inhubber'),
			'add_new' => __('Add library', 'inhubber'),
			'add_new_item' => __('Add new library', 'inhubber'),
		)
	));
}

// хук для регистрации
add_action( 'init', 'create_taxonomy_library' );
function create_taxonomy_library(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'library_cat', [ 'library' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              =>  __('Type Library', 'inhubber'),
			'singular_name'     =>  __('Type Library', 'inhubber'),
			'search_items'      =>  __('Search type', 'inhubber'),
			'all_items'         =>  __('All type', 'inhubber'),
			'view_item '        =>  __('View type', 'inhubber'),
			'parent_item'       =>  __('Parent type', 'inhubber'),
			'parent_item_colon' =>  __('Parent type:', 'inhubber'),
			'edit_item'         =>  __('Edit type', 'inhubber'),
			'update_item'       =>  __('Update', 'inhubber'),
			'add_new_item'      =>  __('Add New type', 'inhubber'),
			'new_item_name'     =>  __('New type', 'inhubber'),
			'menu_name'         =>  __('Type Library', 'inhubber'),
			'back_to_items'     =>  __('← Back', 'inhubber'),
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

//events


add_action('init','events');

function events() {



	register_post_type('events',array(
		
		'public'=>true,
		//'supports' => array('title', 'thumbnail', 'editor'),
		'supports' => array('title', 'editor'),
		'menu_position' => 7,
		'menu_icon' => 'dashicons-clock',
		'has_archive' => true,
		//'show_in_rest' => true,
		'taxonomies' => ['events_cat'],
		'labels' => array(
			'name' => __('Events', 'inhubber'),
			'all_items' => __('All Events', 'inhubber'),
			'add_new' => __('Add Event', 'inhubber'),
			'add_new_item' => __('Add new Event', 'inhubber'),
		)
	));
}

// хук для регистрации
add_action( 'init', 'create_taxonomy_events' );
function create_taxonomy_events(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'events_cat', [ 'events' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              =>  __('Date', 'inhubber'),
			'singular_name'     =>  __('Date', 'inhubber'),
			'search_items'      =>  __('Search date', 'inhubber'),
			'all_items'         =>  __('All date', 'inhubber'),
			'view_item '        =>  __('View date', 'inhubber'),
			'parent_item'       =>  __('Parent date', 'inhubber'),
			'parent_item_colon' =>  __('Parent date:', 'inhubber'),
			'edit_item'         =>  __('Edit date', 'inhubber'),
			'update_item'       =>  __('Update', 'inhubber'),
			'add_new_item'      =>  __('Add New date', 'inhubber'),
			'new_item_name'     =>  __('New date', 'inhubber'),
			'menu_name'         =>  __('Date', 'inhubber'),
			'back_to_items'     =>  __('← Back', 'inhubber'),
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		//'show_in_rest'          => true, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

