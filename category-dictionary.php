<?php
/*
Template Name: category-dictionary page
*/
global $post;
$categories = get_the_category( $post->ID );
$category = get_queried_object();
$current_cat_id = $category->term_id;
$cat_blog = get_the_terms(get_the_ID(), 'category',);

get_header();
?>

    <section class="blog-offer">
        <div class="container">
            <div class="blog-offer__wrapper">
                <h1>
                    <?php echo $category->name; ?>
                </h1>
                <?php if ($category->description) : ?>
                    <div class="blog-offer__text">
                        <?php echo $category->description; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
   <section class="blog-content">
       <div class="container">
           <div class="blog-content__content">
               <div class="blog-content__items">
                   <?php while( have_posts() ) : the_post(); ?>

                           <?php get_template_part('templates/post-block/blog'); ?>

                   <?php endwhile; ?>
               </div>
               <?php
               global $wp_query; // you can remove this line if everything works for you

               if ($wp_query->max_num_pages > 1): ?>
                   <div class="blog-content__btn">
                       <a href="#" id="blog_loadmore" class="btn">
                           <?php pll_e('Load more'); ?>
                       </a>
                   </div>
               <?php endif; ?>
           </div>
       </div>
   </section>
<?php
get_template_part('templates/footer-everything');
get_footer();
