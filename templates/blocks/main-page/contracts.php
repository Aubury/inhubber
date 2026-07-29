<?php
/**
 * Block template file: templates/blocks/main-page/contracts.php
 *
 * Main Page   Contracts Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-contracts-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-contracts';
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

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="contracts_wrapper">

                <div class="contracts-info-block">
                    <?php if (get_field('title')) : ?>
                        <h3><?php the_field( 'title' ); ?></h3>
                    <?php endif; ?>
                    <?php if (get_field('text')) : ?>
                        <p><?php the_field( 'text' ); ?></p>
                    <?php endif; ?>
                </div>

                <?php $link_button = get_field('button_link'); ?>
                <?php if ( $link_button ) : ?>
                    <?php
                    $url = '';
                    $onclick = '';

                    if ( $link_button['url'] !== '#' ) :
                        $url = $link_button['url'];
                    else:
                        $onclick = "Calendly.initPopupWidget({url:'" .  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()) . "' });return false;";
                    endif;
                    ?>

                    <a href="<?php echo esc_url( $url ); ?>"
                       onclick="<?php echo esc_attr( $onclick ); ?>"
                       class="btn-fill">
                        <?php echo esc_html( $link_button['title'] ); ?>
                    </a>

                <?php endif; ?>

        </div>
    </div>
</section>