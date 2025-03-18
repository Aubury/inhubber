<?php

add_action( 'wp_enqueue_scripts', 'ajax_loader_library' );


function ajax_loader_library() {
 
	global $wp_query; 
 

 
	
	wp_register_script( 'library-load', get_stylesheet_directory_uri() . '/assets/js/library-load.js', array('jquery') );
 
	
	wp_localize_script( 'library-load', 'library_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'btn_text' => pll__('Load more'),
		'btn_loader' => pll__('Loading')
	) );
 
 	wp_enqueue_script( 'library-load' );
}



function library_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['post_type'] = 'library';
 
	// it is always better to use WP_Query but not here
		$library = new WP_Query($args);
	//
	//query_posts( $args );

 
	if( $library->have_posts() ) :
 
		// run the loop
		while( $library->have_posts() ): $library->the_post(); 
 
		get_template_part('templates/post-block/library'); 

		endwhile;

 
	endif;
	wp_reset_query();
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_libraryloadmore', 'library_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_libraryloadmore', 'library_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}