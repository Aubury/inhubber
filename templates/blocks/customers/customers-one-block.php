<?php
/**
 * Block template file: templates/blocks/customers/customers-one-block.php
 *
 * Customers One Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customers-one-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customers-one-block';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr( $id ); ?>" class="offer customers-offer <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <div class="offer__header">
                    <h1> <?php the_field( 'title' ); ?></h1>
                    <div class="offer__text">
                    <?php the_field( 'text' ); ?>
                    </div>
                </div>
            </div>
        </section>