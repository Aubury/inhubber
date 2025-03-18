<?php
/**
 * Block template file: templates/blocks/security/security-protecting-block.php
 *
 * Security Protecting Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'security-protecting-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-security-protecting-block';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<?php if ( have_rows( 'info' ) ) : ?>
<section id="<?php echo esc_attr( $id ); ?>" class="security-protection <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <h2>
                <?php the_field( 'title' ); ?>
                </h2>
                <div class="security-protection__items">
                <?php while ( have_rows( 'info' ) ) : the_row(); ?>
                    <div class="security-protection__item">
                        <div class="security-protection__wrapp">
                        <?php $image_images = get_sub_field( 'image' ); ?>
			<?php if ( $image_images ) :  ?>
                            <div class="security-protection__img">
                            <?php foreach ( $image_images as $image_image ): ?>
                                <img src="<?php echo esc_url( $image_image['url'] ); ?>" alt="<?php echo esc_attr( $image_image['alt'] ); ?>">
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="security-protection__title">
                            <?php the_sub_field( 'title' ); ?>
                            </div>
                            <div class="security-protection__text">
                            <?php the_sub_field( 'text' ); ?>     
                           </div>
                        </div>
                    </div>
                    <?php endwhile; ?>     
                </div>
            </div>
        </section>

        <?php endif; ?>