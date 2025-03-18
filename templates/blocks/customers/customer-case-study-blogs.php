<?php
/**
 * Block template file: templates/blocks/customers/customer-case-study-blogs.php
 *
 * Compare Header Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id_home = pll_get_post(get_option('page_on_front'));
// Create id attribute allowing for custom "anchor" value.
$id = 'customer-case-study-blogs-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customer-case-study-blogs';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="features overwiew-features <?php echo esc_attr($classes); ?>">
    <div class="container">
            <div class="section-header">
                <?php while ( have_rows( 'header' ) ) : the_row(); ?>
                    <?php if (get_sub_field('over_title')): ?>
                        <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                            <?php the_sub_field('over_title'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (get_sub_field('title')): ?>
                        <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                            <?php the_sub_field('title'); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (get_sub_field('under_title')): ?>
                        <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                            <?php the_sub_field('under_title'); ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>

            <?php if ( have_rows( 'blogs' ) ) : ?>
                <div class="blog-content__content pt-64">
                    <div class="blog-content__items">
                        <?php if ( have_rows( 'blogs' ) ) : ?>
                            <?php while ( have_rows( 'blogs' ) ) : the_row(); ?>
                                <?php $single_blog = get_sub_field( 'single_blog' ); ?>
                                <?php if ( $single_blog ) : ?>
                                    <?php $post = $single_blog; ?>
                                    <?php $cat_blog = get_the_terms($post->ID, 'category',); ?>

                                    <div class="blog-content__item">

                                    <a href="<?php echo $post->guid; ?>"  class="blog-content__wrapp">
                                        <div class="blog-content__image">
                                            <?php echo kama_thumb_img('w=592 &h=240 &crop=true &post_id=' . $post->ID . ' &alt=' . get_the_title( $post->ID ) . ''); ?>
                                        </div>
                                        <div class="blog-content__info">
                                            <div class="blog-content__date">
                                                <?php echo $cat_blog[0]->name ?>・<?php echo get_the_date('d F Y', $post->ID); ?>
                                            </div>
                                            <div class="blog-content__title">
                                                <?php echo get_the_title( $post->ID ); ?>
                                            </div>
                                        </div>

                                    <?php wp_reset_postdata(); ?>
                                    </a>
                                 </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                    </div>
                </div>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>


    </div>
</section>
