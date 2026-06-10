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
<?php $language = function_exists('pll_current_language') ? pll_current_language() : 'en'; ?>
<style type="text/css">
    <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
    }
</style>

<section id="<?php echo esc_attr( $id ); ?>" class="offer overwiew-offer white_bg block-first-block-with-title-page <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="section-header">
                <?php if (get_field('over_title')) : ?>
                    <h4 class="section-header__overtitle wow animate__animated animate__fadeInUp">
                        <?php the_field( 'over_title' ); ?>
                    </h4>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h1 class="section-header__title wow animate__animated animate__fadeInUp">
                        <?php the_field( 'title' ); ?>
                    </h1>
                <?php endif; ?>

                <?php if (get_field('under_title')) : ?>
                    <div class="section-header__undertitle">
                        <?php the_field( 'under_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( get_field( 'display_form_for_pricing' ) == 1 ) : ?>
                    <div class="form-contact-us full-width">
                        <?php if ( $language == 'en' ) : ?>
                            <div class="hs-form-frame" data-region="na1" data-form-id="b6805bb4-71df-4e56-8f08-03888e0a3824" data-portal-id="6737149"></div>
                        <?php  elseif ( $language == 'de' ) : ?>
                            <div class="hs-form-frame" data-region="na1" data-form-id="a0f9b160-97b9-4a9b-b1bc-3d40c7040b86" data-portal-id="6737149"></div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <?php $link = get_field('link'); ?>
                    <?php if ( $link ) : ?>
                        <?php
                            $url = '';
                            $onclick = '';

                            if ( $link['url'] !== '#' ) :
                                $url = $link['url'];
                            else:
                                $onclick = "Calendly.initPopupWidget({url:'" .  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()) . "' });return false;";
                            endif;
                        ?>

                        <a href="<?php echo esc_url( $url ); ?>"
                           onclick="<?php echo esc_attr( $onclick ); ?>"
                           class="btn-fill">
                            <?php echo esc_html( $link['title'] ); ?>
                        </a>
                    
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script src="https://js.hsforms.net/forms/embed/6737149.js" defer></script>