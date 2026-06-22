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
                      <?php if (!empty($authors)) : ?>
                          <?php foreach ($authors as $author) : ?>

                              <div class="blog-author-wrap">

                                  <?php if (!empty($author['icon'])) : ?>
                                      <div class="blog-author_icon">
                                          <?php echo wp_get_attachment_image($author['icon'], 'full'); ?>
                                      </div>
                                  <?php endif; ?>

                                  <div class="blog-author_info_wrap">
                                      <div class="blog-author_info">

                                          <?php if (!empty($author['author_name'])) : ?>
                                              <div class="blog_author_name">
                                                  <h4><?php echo esc_html($author['author_name']); ?></h4>
                                                  <p><?php echo esc_html($author['author_position']); ?></p>
                                              </div>
                                          <?php endif; ?>

                                          <?php if (!empty($author['url'])) : ?>
                                              <?php foreach ($author['url'] as $social) : ?>

                                                  <a href="<?php echo esc_url($social['link']); ?>" class="blog-author_social_url" target="_blank" rel="nofollow noopener">

                                                      <?php if (!empty($social['icon'])) : ?>
                                                          <?php echo wp_get_attachment_image($social['icon'], 'full'); ?>
                                                      <?php endif; ?>

                                                      <?php if (!empty($social['text'])) : ?>
                                                          <span><?php echo esc_html($social['text']); ?></span>
                                                      <?php endif; ?>

                                                  </a>

                                              <?php endforeach; ?>
                                          <?php endif; ?>

                                      </div>
                                  </div>
                              </div>

                          <?php endforeach; ?>
                      <?php endif; ?>

                      <div class="single-offer__icons-text_wrap">
                          <div class="single-offer__icons-text">
                              <?php pll_e('Share'); ?>:
                          </div>
                          <div class="single-offer__icon">
                              <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                          </div>
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