<?php
/**
 * Block template file: templates/blocks/main/first_title_block.php
 *
 * First Block With Title Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'first-block-with-title-page-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-first-block-with-title-page';
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

<div id="<?php echo esc_attr( $id ); ?>" class="offer overwiew-offer white_bg <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="offer__header">
                <?php if (get_field('page_title')) : ?>
                    <h4 class="section-header__overtitle wow animate__animated animate__fadeInUp"><?php the_field( 'page_title' ); ?></h4>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h2 class="section-header__title wow animate__animated animate__fadeInUp"><?php the_field('title'); ?></h2>
                <?php endif; ?>

                <?php if (get_field('text')) : ?>
                    <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                        <?php the_field( 'text' ); ?>
                    </div>
                <?php endif; ?>

                <?php $link = get_field( 'link' ); ?>

                <?php if ($link['title']) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>