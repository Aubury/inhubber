<?php
/**
 * Block template file: templates/blocks/main/simple-information-block.php
 *
 * Simple Information Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'simple-information-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-simple-information-block';
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

<?php get_field( 'background_color' ) == 'White' ? $class = 'solutions-transform software' : $class = ''; ?>

<section id="<?php echo esc_attr( $id ); ?>" class="about-us-values <?php echo esc_attr( $class );?> <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="simple-information-wrap">
            <div class="section-header full-width">
                <?php if (get_field('over_title')) : ?>
                    <div class="section-header__overtitle">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h2><?php the_field( 'title' ); ?></h2>
                <?php endif; ?>

                <?php if (get_field('under_title')) : ?>
                    <div class="solutions-transform__text">
                        <?php the_field( 'under_title' ); ?>
                    </div>
                <?php endif; ?>
            </div>


            <?php if ( have_rows( 'information_block' ) ) : ?>
                <?php while ( have_rows( 'information_block' ) ) : the_row(); ?>
                    <div class="information_block">
                        <div class="information-block-title">
                            <?php the_sub_field( 'title' ); ?>
                        </div>
                        <div class="information-block-text">
                            <?php the_sub_field( 'text' ); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>

            <?php  $button = get_field( 'button' ); ?>

            <?php if ( get_field( 'select_calendly_or_form' ) == 'Form popup') : ?>


                    <?php if ( $button ) : ?>
                        <a href=""
                           class="btn-fill"
                           onclick="form_popup(); return false; ">
                            <?php echo esc_html( $button['title'] ); ?>
                        </a>
                    <?php endif; ?>


            <?php else : ?>


                <?php if ( $button ) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill"><?php echo esc_html($button['title']); ?></a>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
</section>

<?php $language = function_exists('pll_current_language') ? pll_current_language() : 'en'; ?>

<script src="https://js.hsforms.net/forms/embed/6737149.js" defer></script>


<script>
    function form_popup() {
        let modal = document.querySelector('.modal');
        let close = document.querySelector('.modal-popup-close');
        modal.style.display = 'block';
        close.addEventListener("click", (e) => {
            modal.style.display = 'none';
        });
    }
</script>


<div class="modal">
    <div class="modal-content">
        <?php if ( $language == 'en' ) : ?>
            <div class="hs-form-frame" data-region="na1" data-form-id="ede7cbe3-42ff-4168-9d36-02e7655183c8" data-portal-id="6737149"></div>
        <?php  elseif ( $language == 'de' ) : ?>
            <div class="hs-form-frame" data-region="na1" data-form-id="e63f7ade-8830-4d36-ac59-f8fca5b83a33" data-portal-id="6737149"></div>
        <?php endif; ?>
        <div class="modal-popup-close"></div>
    </div>
</div>
