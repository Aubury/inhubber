<?php
/**
 * Block template file: templates/blocks/security/security-everything.php
 *
 * Security Everything Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'security-everything-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-security-everything';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php if(get_field( 'show_block' ) == 'yes'): ?>

<?php if(carbon_get_theme_option('crb_options_footer_info_block'. carbon_lang_prefix())): ?>
         <section id="<?php echo esc_attr( $id ); ?>" class="contracts security-contracts <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <div class="contracts__wrapper">
                    <div class="contracts__info wow animate__animated animate__fadeInUp">
                        <h2><?php echo carbon_get_theme_option('crb_options_footer_info_block'. carbon_lang_prefix()) ?></h2>
                        <a href=""
                           onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                           class="contracts__btn btn-fill">
                            <?php pll_e('Request a demo'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php endif; ?>
