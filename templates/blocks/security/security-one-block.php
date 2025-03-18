<?php
/**
 * Block template file: templates/blocks/security-one-block.php
 *
 * Security One Block Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'security-one-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-security-one-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="security-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="security-offer__header">
            <div class="security-offer__header-label">
                <?php the_field('title'); ?>
            </div>
            <h1><?php the_field('subtitle'); ?></h1>
            <div class="security-offer__header-text">
                <?php the_field('text'); ?>
            </div>
            <?php $link = get_field('link'); ?>
            <?php if ($link['title']) : ?>
                <a href=""
                   onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                   class="btn-fill"><?php echo esc_html($link['title']); ?></a>
            <?php endif; ?>
        </div>
        <div class="security-offer__img">
            <?php $image_block = get_field('image_block'); ?>
            <?php if ($image_block) : ?>
                <img src="<?php echo esc_url($image_block['url']); ?>"
                     alt="<?php echo esc_attr($image_block['alt']); ?>"/>
            <?php endif; ?>
            <?php $image_block_mobi = get_field('image_block_mobi'); ?>
            <?php if ($image_block_mobi) : ?>
                <img class="_mobile" src="<?php echo esc_url($image_block_mobi['url']); ?>"
                     alt="<?php echo esc_attr($image_block_mobi['alt']); ?>">
            <?php endif; ?>
        </div>
    </div>
</section>