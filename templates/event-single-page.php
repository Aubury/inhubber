<?php
/*
Template Name: Event single page
*/

global $post;

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}

?>


<?php
get_footer();
?>
