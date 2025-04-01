<?php
/**
 * Block template file: templates/blocks/first-page-block/events-first-block-of-page.php
 *
 * First Block Of Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'first-block-of-page-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-first-block-of-page';
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

<section id="<?php echo esc_attr( $id ); ?>" class="single-offer <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="single-offer__wrapper">
            <?php if (get_field('title')) : ?>
                <h1>
                    <?php the_field( 'title' ); ?>
                </h1>
            <?php endif; ?>

            <?php if (get_field('text')) : ?>
                <div class="single-offer__text">
                    <?php the_field( 'text' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>