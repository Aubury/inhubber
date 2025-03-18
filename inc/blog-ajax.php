<?php

add_action('wp_enqueue_scripts', 'ajax_loader_blog');


function ajax_loader_blog()
{
    global $wp_query;

    wp_register_script('blog-load', get_stylesheet_directory_uri() . '/assets/js/blog-load.js', array('jquery'));

    wp_localize_script(
        'blog-load',
        'blog_loadmore_params',
        array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages,
        'btn_text' => pll__('Load more'),
        'btn_loader' => pll__('Loading')
    ));

    wp_enqueue_script('blog-load');
}


function blog_loadmore_ajax_handler()
{

    // prepare our arguments for the query
    // $args = json_decode(stripslashes($_POST['query']), true);
    // $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    // $args['post_status'] = 'publish';
    // $args['post_type'] = 'post';

    // echo '<pre>';
    $post_query = json_decode(stripslashes($_POST['query']), true); // category_name
    $category_name = $post_query['category_name'];
    // var_dump($category_name);
    // echo '</pre>';

    // var_dump($category_name);

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        'paged' => $_POST['page'] + 1,
    );

    if ( isset($category_name) && !empty($category_name) ) {
        $args['category_name'] = $category_name;
        // array_push($args, array('category_name' => $category_name));
    }

    // echo '<pre>';
    // var_dump(json_decode(stripslashes($_POST['query']), true));
    // echo '</pre>';

    // it is always better to use WP_Query but not here
    $blog = new WP_Query($args);
    //
    //query_posts( $args );

    // echo '<pre>';
    // var_dump($blog);

    // var_dump(get_template_part('templates/post-block/blog'));
    // echo '</pre>';

    if ($blog->have_posts()) :

        // var_dump('have posts');

        // run the loop
        while ($blog->have_posts()): $blog->the_post();
            // the_title();
            // echo '</br>';
            get_template_part('templates/post-block/blog');
        endwhile;


    endif;
    wp_reset_query();
    die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_blogloadmore', 'blog_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_blogloadmore', 'blog_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}