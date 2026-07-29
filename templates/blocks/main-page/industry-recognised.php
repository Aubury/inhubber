<?php
/**
 * Block template file: templates/blocks/main-page/industry-recognised.php
 *
 * Main Page   Industry Recognised Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-industry-recognised-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-industry-recognised';
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

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="flex-column-align-center">
            <div class="title-wrap-block">
                <?php if (get_field( 'over_title' )) : ?>
                    <div class="over-title">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field( 'title' )) : ?>
                    <h2>
                        <?php the_field( 'title' ); ?>
                    </h2>
                <?php endif; ?>
            </div>


            <?php if ( have_rows( 'snippets' ) ) : ?>
                <div class="block-snippet">
                    <?php while ( have_rows( 'snippets' ) ) : the_row(); ?>
                        <?php the_sub_field( 'snippet' ); ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>


        <?php if ( have_rows( 'clm_software' ) ) : ?>
            <div class="clm-software-wrap">
                <div class="clm-software-slider swiper">
                    <div class="swiper-wrapper">
                        <?php while ( have_rows( 'clm_software' ) ) : the_row(); ?>
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <div class="clm-software-slide swiper-slide">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
        </div>
    </div>
</section>