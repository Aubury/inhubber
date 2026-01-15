<?php
/**
 * Block template file: templates/blocks/main/page-information-block.php
 *
 * Image Page Information Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-page-information-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-image-page-information-block';
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

<section id="<?php echo esc_attr( $id ); ?>" class="single-content <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <?php $image = get_field( 'image' ); ?>
        <?php if ( $image ) : ?>
            <img style="min-width: 100%;" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <?php endif; ?>
        <?php the_field( 'information_block' ); ?>
    </div>
</section>