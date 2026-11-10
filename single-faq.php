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
        <section class="single-offer dictionary_cat">
            <div class="container">
                <div class="single-offer__wrapper">
                    <div class="single-offer__overtext">
                        <?php echo $cat[0]->name; ?>
                    </div>
                    <h1>
                        <?php the_title() ?>
                    </h1>
                </div>
            </div>
        </section>
        <section class="single-content">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php else: ?>
    <?php // No rows found ?>
<?php endif; ?>

<?php get_footer() ?>