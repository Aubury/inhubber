<?php $id_home = pll_get_post(get_option('page_on_front')); ?>

<?php get_header() ?>

<?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    endif;
?>

<?php get_footer(); ?>