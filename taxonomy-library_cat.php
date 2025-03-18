<?php get_header() ?>
<?php $taxonomy= get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>



        <section class="single-offer">
            <div class="container">
                <div class="single-offer__wrapper">
                    <h1>
                        <?php single_term_title(); ?>
                    </h1>
                    <div class="single-offer__text">
                    	<?php echo $taxonomy->description; ?>
                        
                    </div>
                </div>
            </div>
        </section>
        <?php $library = new WP_Query([

                    'post_type' => 'library',
                    'posts_per_archive_page' => 3,
                    'paged' => get_query_var('paged'),
                    'tax_query' => [[

                        'taxonomy' => 'library_cat',
                        'field' => 'term_id',
                        'terms' => $taxonomy->term_id

                    ]]
              


        ]);  ?>
        <?php if ( $library->have_posts() ) : ?>
        <section class="library-content">
            <div class="container">
                <div class="library-content__items" id="library-content__items" >
        <?php while ( $library->have_posts() ) : $library->the_post(); ?>
           <?php get_template_part('templates/post-block/library'); ?>
        <?php endwhile; ?>

        
                      
         </div>

                <div class="blog-content__btn">
                    <a  href="#" id="library_loadmore"  class="btn"><?php pll_e('Load more');  ?></a>
                </div>
      
            </div>



        </section>
        <?php endif; ?> 
        <?php wp_reset_query(); ?>  
        

        <?php get_template_part( 'templates/footer-everything') ?>     
<?php get_footer() ?>