<?php
/**
 * Block template file: templates/blocks/first-page-block/first-block-align-center.php
 *
 * Customer Page First Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customer-page-first-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customer-page-first-block';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
    <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
    }
</style>

<section id="<?php echo esc_attr($id); ?>" class="offer overwiew-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="offer__header">
                <?php if (get_field('over_title')) : ?>
                    <div class="offer_over_title color_<?php the_field( 'text_color_over_title' ); ?>">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h1><?php the_field('title'); ?></h1>
                <?php endif; ?>

                <?php if (get_field('text')) : ?>
                    <div class="offer__text">
                        <?php the_field('text'); ?>
                    </div>
                <?php endif; ?>

                <?php $link = get_field('link'); ?>
                <?php if ($link['title']) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            </div>

            <?php $image = get_field( 'image' ); ?>
            <?php if ( $image ) : ?>
                <div class="offer__images wow animate__animated animate__fadeInUp">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
            <?php endif; ?>

            <?php if ( have_rows( 'block_images' ) ) : ?>
                <?php while ( have_rows( 'block_images' ) ) : the_row(); ?>

                <div class="offer__images wow animate__animated animate__fadeInUp">
                    <?php $back_image = get_sub_field( 'back_image' ); ?>
                    <?php get_sub_field( 'shadow_for_back_image' ) == 1 ? $shadow = 'img-box-shadow' : $shadow = ''; ?>
                    <?php if ( $back_image ) : ?>
                        <div class="offer__images-big <?php echo $shadow; ?>">
                            <img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="offer__images" />
                        </div>
                    <?php endif; ?>

                    <?php if ( have_rows( 'small_image' ) ) : ?>
                        <?php $index = 1; ?>
                        <?php while ( have_rows( 'small_image' ) ) : the_row(); ?>
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <div class="image-info-block offer__images-small offer__images-small-<?php echo esc_attr($index); ?>">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="offer__images" />
                                </div>
                            <?php endif; ?>

                            <?php $index++; ?>

                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>