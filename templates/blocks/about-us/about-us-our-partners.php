<?php
/**
 * Block template file: templates/blocks/about-us/about-us-our-partners.php
 *
 * About Us Our Partners Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-us-our-partners-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-about-us-our-partners';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="about-us-values about-us-partners <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <h2>
                <?php the_field( 'title' ); ?>
                </h2>
                <div class="about-us-values__text">
                <?php the_field( 'subtitle' ); ?>
                </div>
                <?php if ( have_rows( 'partners' ) ) : ?>
                <div class="about-us-partners__items">
                <?php while ( have_rows( 'partners' ) ) : the_row(); ?>
                    <div class="about-us-partners__item">
                        <div class="about-us-partners__wrapp">
                        <?php $image = get_sub_field( 'image' ); ?>
                            <div class="about-us-partners__logo">
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            </div>
                            <div class="about-us-partners__text">
                            <?php the_sub_field( 'name' ); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
                <?php endif; ?>
            </div>
        </section>