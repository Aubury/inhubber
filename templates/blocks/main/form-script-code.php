<?php
/**
 * Block template file: templates/blocks/main/form-script-code.php
 *
 * Form Script Code Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'form-script-code-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-form-script-code';
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

<section id="<?php echo esc_attr( $id ); ?>" class="about-us-values <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="simple-information-wrap">
            <div class="section-header full-width">
                <?php if (get_field('over_title')) : ?>
                    <div class="section-header__overtitle">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h2 class="section-header__title">
                        <?php the_field( 'title' ); ?>
                    </h2>
                <?php endif; ?>

                <?php if (get_field('under_title')) : ?>
                    <div class="solutions-transform__text">
                        <?php the_field( 'under_title' ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-contact-us">
                <?php if(get_field('script' )) : ?>
                    <?php the_field( 'script' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>