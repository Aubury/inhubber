<?php
/*
Template Name: Single Dictionary page
*/
?>
<?php get_header() ?>
<?php $cat = get_the_terms(get_the_ID(), 'category');

?>
<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <section class="single-content">
             <?php the_content(); ?>
        </section>
    <?php endwhile; ?>
<?php else: ?>
    <?php // No rows found ?>
<?php endif; ?>

<?php get_footer() ?>