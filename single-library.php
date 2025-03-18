<?php get_header() ?>
<?php $cat = get_the_terms(get_the_ID(), 'library_cat'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <section class="single-offer">
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
        <section class="library-single-content">
            <div class="container">
                
                <div class="library-single-content__wrapper">
                    <?php the_content(); ?>

                    
                </div>
            </div>
        </section>
<?php endwhile; ?>

<?php else: ?>

<?php endif; ?> 


<?php get_template_part( 'templates/footer-everything') ?>

<?php get_footer() ?>