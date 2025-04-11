<?php

get_header();
$cat = get_the_terms(get_the_ID(), 'category');

if ( have_posts()) :
   while (have_posts()) : the_post(); ?>
      <section class="single-offer case-blog">
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

                  <div class="single-offer__icons">
                      <div class="single-offer__icons-text">
                          <?php pll_e('Share'); ?>:
                      </div>
                      <div class="single-offer__icon">
                          <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                      </div>
                  </div>

              </div> <!-- end .single-offer__wrapper -->
          </div> <!-- end .container -->
      </section> <!-- end .single-offer -->
     <section class="case-blog-mane-block">
         <div class="container">
             <div class="single-content">
                 <?php the_content(); ?>
             </div>
        </div> <!-- end .container -->
    </section> <!-- end .case-blog-mane-block -->

<?php endwhile; ?>
<?php endif; ?>
<?php get_template_part( 'templates/footer-everything') ?>
<?php get_footer() ?>