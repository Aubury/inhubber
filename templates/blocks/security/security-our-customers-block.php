<?php
/**
 * Block template file: templates/blocks/security/security-our-customers-block.php
 *
 * Security Our Customers Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'security-our-customers-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-security-our-customers-block';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="block-logo block-logo-security <?php echo esc_attr( $classes ); ?>">
<?php $logo_images = get_field( 'logo' ); ?>
	<?php if ( $logo_images ) :  ?>
  
            <div class="block-logo__wrapper">
                <h2>
                <?php the_field( 'title' ); ?>
                </h2>
 
                <div class="block-logo__slider swiper">
                    <div class="swiper-wrapper">
                    <?php foreach ( $logo_images as $logo_image ): ?>
                        <div class="block-logo__slide swiper-slide">
                            <img src="<?php echo esc_url( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_image['alt'] ); ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </section>