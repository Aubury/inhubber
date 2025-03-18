<?php
/**
 * Block template file: templates/blocks/solutions/solutions-one-block.php
 *
 * Solutions One Block Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'solutions-one-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-solutions-one-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>
<?php $link = get_field('link'); ?>
<?php $main_image = get_field('main_image'); ?>
<?php $image_1 = get_field('image_1'); ?>
<?php $image_2 = get_field('image_2'); ?>
<section id="<?php echo esc_attr($id); ?>" class="offer solutions-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="solutions-offer__wrapper">
            <div class="solutions-offer__desc">
                <div class="solutions-offer__overtitle">
                    <?php the_field('title'); ?>
                </div>
                <h1>
                    <?php the_field('subtitle'); ?>
                </h1>
                <div class="solutions-offer__text">
                    <?php the_field('text'); ?>
                </div>
                <?php if ($link) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill">
						<?php echo esc_html($link['title']); ?>
					</a>
                <?php endif; ?>

            </div>
            <div class="solutions-offer__img <?php the_field('animation'); ?>">
                <img src="<?php echo esc_url($main_image['url']); ?>"
                     alt="<?php echo esc_attr($main_image['alt']); ?>"/>
                <?php $additional_images_images = get_field('additional_images'); ?>
                <?php if ($additional_images_images) : ?>
                    <?php $i = 3; ?>
                    <?php foreach ($additional_images_images as $additional_images_image): ?>
                        <img class="solutions-offer__img-<?php echo $i; ?>"
                             src="<?php echo esc_url($additional_images_image['url']); ?>"
                             alt="<?php echo esc_attr($additional_images_image['alt']); ?>"/>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>