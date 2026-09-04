<?php get_header() ?>
	
<?php $cat = get_the_terms(get_the_ID(),'category',);

$authors = carbon_get_post_meta(get_the_ID(), 'crb_author_blog');

$thumb_id = get_post_thumbnail_id(); // получаем ID текущего изображения
$thumb_url = kama_thumb_src([
    'src' => wp_get_attachment_url($thumb_id),
    'w'   => 1080,
    'h'   => 408,
    'crop' => true,
    'alt' => get_the_title(),
]);
?>



    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <section class="single-offer 2">
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
                    </div>
                </div>
            </section>
            <section class="single-content">
                <div class="container">
                    <?php
                        $thumb_id = get_post_thumbnail_id();
                        $image    = wp_get_attachment_image_src($thumb_id, 'full');
                    ?>
                    <img src="<?php echo esc_url($thumb_url); ?>"
                         width="<?php echo esc_attr($image[1]); ?>"
                         height="<?php echo esc_attr($image[2]); ?>"
                         alt="<?php echo esc_attr(get_the_title()); ?>"
                         loading="lazy"
                         decoding="async"
                    >
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