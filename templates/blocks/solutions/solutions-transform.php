<?php
/**
 * Block template file: templates/blocks/solutions/solutions-transform.php
 *
 * Solutions Transform Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'solutions-transform-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-solutions-transform';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr($id); ?>"
         class="about-us-values solutions-transform <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="solutions-transform__wrapper">
            <h2>
                <?php the_field('title'); ?>
            </h2>
            <div class="solutions-transform__text">
                <?php the_field('text'); ?>
            </div>
            <?php $link = get_field('link'); ?>
            <?php if (isset($link['title']) && !empty($link['title'])) : ?>
                <a href=""
                   onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                   class="btn-fill">
                    <?php echo esc_html($link['title']); ?>
                </a>
            <?php endif; ?>

        </div>
    </div>
</section>