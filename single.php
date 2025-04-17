<?php get_header() ?>
	
<?php $cat = get_the_terms(get_the_ID(),'category',);  ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <section class="single-offer">
            <div class="container">
                <div class="single-offer__wrapper">
                	
                	<?php if($cat): ?>
                    <div class="single-offer__overtext">
                    	<?php 
                    		echo  $cat[0]->name;
                    	 ?>
                    </div>
                <?php endif; ?>
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <div class="single-offer__text">
                        <?php the_time('d F Y'); ?>
                    </div>
                    <div class="single-offer__icons">
                        <div class="single-offer__icons-text">
                            <?php pll_e('Share'); ?>:
                        </div>
                        <div class="single-offer__icon">
                        	<?php echo do_shortcode('[Sassy_Social_Share]') ?>
                  
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="single-content">
            <div class="container">
            	<?php echo kama_thumb_img('w=1080 &h=408 &crop=false  &alt='.get_the_title( ).''); ?>
            	<?php the_content(); ?>

            </div>
        </section>
        <?php endwhile; ?>
        <?php endif; ?>

        <?php $blog = new WP_Query([

        	'post_type' => 'post',
        	'posts_per_page' => 2,
        	'cat' => $cat[0]->term_id,
        	'post__not_in' => [get_the_ID()]

        ]); ?> 

        <?php  if ( $blog->have_posts() ) :?> 
        	        <section class="single-articles">
            <div class="container">
                <h2><?php pll_e('Related articles'); ?></h2>
                <div class="single-articles__wrapper">
                    <div class="blog-content__items">
        <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
        	<?php $cat_blog = get_the_terms(get_the_ID(),'category',);  ?>
             <div class="blog-content__item">
        <a href="<?php the_permalink() ?>" class="blog-content__wrapp">
                                <div class="blog-content__image">
                                    <?php echo kama_thumb_img('w=592 &h=240 &crop=true  &alt='.get_the_title( ).''); ?>
                                </div>
                                <div class="blog-content__info">
                                    <div class="blog-content__date">
                                        <?php echo $cat_blog[0]->name ?>・<?php the_time('d F Y'); ?>
                                    </div>
                                    <div class="blog-content__title">
                                        <?php the_title(); ?>
                                    </div>
                                </div>
                            </a>
                            </div>
        <?php endwhile; ?>
         </div>
                </div>
            </div>
        </section>
        <?php endif; ?> 
        <?php wp_reset_query(); ?>



        <?php get_template_part( 'templates/footer-everything') ?>
<?php get_footer() ?>