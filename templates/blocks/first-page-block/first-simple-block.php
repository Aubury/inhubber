<?php
/**
 * Block template file: templates/blocks/first-page-block/first-simple-block.php
 *
 * First Simple Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'first-simple-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-first-simple-block';
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

<section id="<?php echo esc_attr( $id ); ?>" class="offer overwiew-offer white_bg block-first-block-with-title-page <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="offer__header">
                <?php if (get_field('over_title')) : ?>
                    <h4 class="section-header__overtitle wow animate__animated animate__fadeInUp">
                        <?php the_field( 'over_title' ); ?>
                    </h4>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                        <?php the_field( 'title' ); ?>
                    </h2>
                <?php endif; ?>

                <?php if (get_field('under_title')) : ?>
                    <div class="section-header__undertitle">
                        <?php the_field( 'under_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php $link = get_field('link'); ?>
                <?php if ($link['title']) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>