<?php
/**
 * Block template file: templates/blocks/security/security-our-advantages-block.php
 *
 * Security Our Advantages Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'security-our-advantages-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-security-our-advantages-block';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<?php if ( have_rows( 'our_advantages' ) ) : ?>
<section id="<?php echo esc_attr( $id ); ?>" class="security-adventages <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <div class="security-adventages__items">
                <?php while ( have_rows( 'our_advantages' ) ) : the_row(); ?>
                <?php $image = get_sub_field( 'image' ); ?>
                    <div class="security-adventages__item">
                        <div class="security-adventages__img">
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        </div>
                        <div class="security-adventages__title">
                        <?php the_sub_field( 'title' ); ?>
                        </div>
                        <div class="security-adventages__text">
                        <?php the_sub_field( 'text' ); ?>      
                     </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>