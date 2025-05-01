<?php
/**
 * Block template file: templates/blocks/list/list-cards-with-images.php
 *
 * List Cards With Images Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'list-cards-with-images-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-list-cards-with-images';
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

<section id="<?php echo esc_attr( $id ); ?>" class="features <?php echo esc_attr( $classes ); ?>">
    <div class="container">
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

            <?php if (get_field('under_title')) : ?>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php the_field( 'under_title' ); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ( have_rows( 'card' ) ) : ?>
            <div class="features__items">
                <?php while ( have_rows( 'card' ) ) : the_row(); ?>

                    <?php $standard_width_image = get_sub_field( 'standard_width_image' ); ?>
                    <?php if ( $standard_width_image ) : ?>
                        <div class="features__item standard_width_card wow animate__animated animate__fadeInUp">
                            <div class=" features__wrapp">
                                <div class="features__image">
                                    <img src="<?php echo esc_url( $standard_width_image['url'] ); ?>" alt="image" />
                                    <img src="<?php echo esc_url( $standard_width_image['url'] ); ?>" alt="image_table" class="tablet" />
                                </div>

                                <div class="features__info">
                                    <div class="features__title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                    <div class="features__text">
                                        <?php the_sub_field( 'text' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $full_width_image = get_sub_field( 'full_width_image' ); ?>
                    <?php if ( $full_width_image ) : ?>
                        <div class="features__item full_width_card wow animate__animated animate__fadeInUp">
                            <div class=" features__wrapp">
                                <div class="features__image">
                                    <img src="<?php echo esc_url( $full_width_image['url'] ); ?>" alt="image" />
                                    <img src="<?php echo esc_url( $full_width_image['url'] ); ?>" alt="image_table" class="tablet" />
                                </div>
                                <div class="features__info">
                                    <div class="features__title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                    <div class="features__text">
                                        <?php the_sub_field( 'text' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>

    </div>
</section>