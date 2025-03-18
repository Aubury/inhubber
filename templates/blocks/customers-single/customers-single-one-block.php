<?php
/**
 * Block template file: templates/blocks/customers-single/customers-single-one-block.php
 *
 * Customers Single One Block Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customers-single-one-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customers-single-one-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="offer customers-single-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="offer__header">
            <div class="customers-offer__overtitle">
                <?php the_field('title'); ?>
            </div>
            <h1> <?php the_field('subtitle'); ?></h1>
        </div>
        <div class="customers-single-offer__link">
            <div class="customers-single-offer__link-title">
                <?php pll_e('Share') ?>:
            </div>
            <div class="top-footer__sociale">
                <?php echo do_shortcode('[Sassy_Social_Share]') ?>
            </div>
        </div>
    </div>
</section>