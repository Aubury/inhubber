<?php
// $id_blog = get_option('page_for_posts');

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}

get_template_part('templates/footer-everything');

get_footer();
