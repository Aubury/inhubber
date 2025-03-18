<?php
function glossary_enqueue_scripts() {
    wp_enqueue_script(
        'glossary-search',
        get_stylesheet_directory_uri() . '/assets/js/glossary-load.js',
        array('jquery'),
        null,
        true
    );
    wp_localize_script(
        'glossary-search',
        'glossary_ajax',
        array(
            'ajaxurl' => admin_url('admin-ajax.php')
        )
    );
}
add_action('wp_enqueue_scripts', 'glossary_enqueue_scripts');


function glossary_ajax_search() {
    global $wpdb;
//    if (!isset($_POST['search'])) {
//        wp_send_json_error();
//    }

    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    // Запрос записей из категории "Glossary"
    $results = $wpdb->get_results($wpdb->prepare("
        SELECT p.ID, p.post_title, p.post_excerpt
        FROM $wpdb->posts p
        INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
        INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
        WHERE p.post_status = 'publish'
        AND p.post_type = 'post'
        AND t.slug = %s
        AND p.post_title LIKE %s
        ORDER BY p.post_title ASC
    ", 'glossary', '%' . $search . '%'));

    if ($results) {
        echo ' <div class="glossary-grid">';
        foreach ($results as $post) {
            $post_url = get_permalink($post->ID);
            $short_excerpt = wp_trim_words($post->post_excerpt, 10, '...');
            echo '<div class="glossary-card">
                     <a href=' . $post_url . '>
                        <h3 class="blog-content__title">
                           ' . esc_html($post->post_title) . '
                        </h3>
                         <div class="blog-content__date">
                             ' . $short_excerpt . '
                         </div>
                     </a>
                  </div>';
        }
        echo '</div>';
    } else {
        echo '<p>Ничего не найдено</p>';
    }

    wp_die();

//    $args = array(
//        'post_type'      => 'post',
//        'category_name'  => 'glossary',
//        'posts_per_page' => -1,
//        'orderby'        => 'title',
//        'order'          => 'ASC',
//        's'              => $search,
//        'post_status'    => 'publish',
//    );
//
//    $query = new WP_Query($args);
//
//    $results = [];
//
//    if ($query->have_posts()) {
//        while ($query->have_posts()) {
//            $query->the_post();
//            $results[] = [
//                'title'   => get_the_title(),
//                'link'    => get_permalink(),
//                'content' => get_the_excerpt(),
//            ];
//        }
//    }
//    wp_reset_postdata();
//
//    wp_send_json_success($results);

}

add_action('wp_ajax_glossary_search', 'glossary_ajax_search');
add_action('wp_ajax_nopriv_glossary_search', 'glossary_ajax_search');
