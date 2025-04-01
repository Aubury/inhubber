<?php

/*
Template Name: All Events
Template Post Type: page
*/

get_header();
?>

<?php  if ( have_posts() ) :

    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }

    ?>

<?php endif; ?>

<?php get_template_part('templates/footer-everything') ?>


<?php get_footer(); ?>
