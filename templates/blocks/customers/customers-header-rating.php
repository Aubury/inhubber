<?php
/**
 * Block template file: templates/blocks/customers/customers-header-rating.php
 *
 * Compare Header Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id_home = pll_get_post(get_option('page_on_front'));
// Create id attribute allowing for custom "anchor" value.
$id = 'customers-single-header-rating-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customers-single-header-rating';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="offer customers-single-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="offer__header">
                <h1>
                    <?php the_field( 'title' ); ?>
                </h1>
                <div class="offer__text">
                    <?php the_field( 'text' ); ?>
                </div>
                <?php $link = get_field('link'); ?>
                <?php if ($link['title']) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="offer__rating">
            <?php if (carbon_get_post_meta($id_home, 'crb_one_block_rating_stars')): ?>
                <div class="offer__rating-show">
                    <div class="offer__rating-stars">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/Stars.svg"
                             alt="Stars">
                    </div>
                    <div class="offer__rating-tex">
                        <?php echo carbon_get_post_meta($id_home, 'crb_one_block_rating_stars'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($crb_one_block_gallery = carbon_get_post_meta($id_home, 'crb_one_block_gallery')): ?>
                <div class="offer__rating-logo">
                    <?php foreach ($crb_one_block_gallery as $image): ?>
                        <div class="offer__rating-item 3">
                            <?php echo wp_get_attachment_image($image, 'full',); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>