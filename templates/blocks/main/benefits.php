<?php
/**
 * Block template file: templates/blocks/main/benefits.php
 *
 * Benefits Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'benefits-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-benefits';
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

<section id="<?php echo esc_attr( $id ); ?>" class="benefits <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="benefits__wrapper">
            <div class="benefits__descr">
                <div class="section-header">
                    <?php if (get_field('over_title')) : ?>
                        <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                            <?php the_field( 'over_title' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('title')) : ?>
                        <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                            <?php the_field( 'title' ); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (get_field('text')) : ?>
                        <div class="solutions-description__text">
                            <?php the_field( 'text' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php $link_button = get_field( 'link_button' ); ?>
                    <?php if ( $link_button['title'] ) : ?>
                        <a href=""
                           onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                           class="benefits__btn btn-fill wow animate__animated animate__fadeInUp">
                            <?php echo esc_html( $link_button['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ( have_rows( 'benefits_item' ) ) : ?>
                <div class="benefits__items">
                    <?php while ( have_rows( 'benefits_item' ) ) : the_row(); ?>
                        <div class="benefits__item">
                            <div class="benefits__wrapp">
                                <?php if (get_sub_field('over_numbers')) : ?>
                                    <div class="benefits__undertext">
                                        <?php the_sub_field( 'over_numbers' ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_sub_field('number')) : ?>
                                    <div class="benefits__number">
                                        <span data-number=" <?php the_sub_field( 'number' ); ?>">0</span>%
                                    </div>
                                <?php endif; ?>

                                <?php if (get_sub_field('title')) : ?>
                                    <div class="benefits__title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_sub_field('text')) : ?>
                                    <div class="benefits__overtext">
                                        <?php the_sub_field( 'text' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </div>
</section>