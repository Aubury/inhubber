<?php
/**
 * Block template file: templates/blocks/events/single-trusted-by-over.php
 *
 * Single Block Trusted By Over Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'single-block-trusted-by-over-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-single-block-trusted-by-over';
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

<?php $logo_user_images = get_field( 'logo_user' ); ?>
<?php if ( $logo_user_images ) :  ?>
    <section id="<?php echo esc_attr( $id ); ?>" class="single-block block-logo <?php echo esc_attr( $classes ); ?>">
        <div class="">
            <div class="block-logo__wrapper">
                <?php if(get_field( 'title' )): ?>
                    <h2>
                        <?php the_field( 'title' ); ?>
                    </h2>
                <?php  endif;?>
                <div class="block-logo__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ( $logo_user_images as $logo_user_image ): ?>
                            <div class="block-logo__slide swiper-slide">
                                <img src="<?php echo esc_url( $logo_user_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_user_image['alt'] ); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>