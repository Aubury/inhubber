<?php
/**
 * Block template file: templates/blocks/about-us/about-us-one-core.php
 *
 * About Us One Core Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-us-one-core-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-about-us-one-core';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr( $id ); ?>" class="about-us-values <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <h2>
                <?php the_field( 'title' ); ?>
                </h2>
                <div class="about-us-values__text">
                <?php the_field( 'subtitle' ); ?>
                </div>
                <?php if ( have_rows( 'information' ) ) : ?>
                <div class="about-us-values__body">
                <?php while ( have_rows( 'information' ) ) : the_row(); ?>
                    <div class="about-us-values__body-item">
                    <?php the_sub_field( 'text' ); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?> 
            </div>
        </section>