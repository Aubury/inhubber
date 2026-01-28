<?php
/**
 * Block template file: templates/blocks/about-us/about-us-people.php
 *
 * About Us People Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-us-people-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-about-us-people';
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

<section id="<?php echo esc_attr( $id ); ?>" class="software <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="section-header">
            <?php if (get_field('over_title')) : ?>
                <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php the_field( 'over_title' ); ?>
                </div>
            <?php endif; ?>

            <?php if (get_field('title')): ?>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php the_field( 'title' ); ?>
                </h2>
            <?php endif; ?>

            <?php if (get_field('text' )) : ?>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php the_field( 'text' ); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( have_rows( 'information' ) ) : ?>
            <div class="about-us-features__items">
                <?php while ( have_rows( 'information' ) ) : the_row(); ?>
                    <?php
                        $image = get_sub_field( 'image' );
                        $link = get_sub_field('link');
                    ?>
                        <div class="overwiew-features__item">
                            <?php if ( $image ) : ?>
                                <?php if ( $link ) : ?>
                                    <a style="display: block;" href="<?php echo esc_url( $link['url'] ); ?>"
                                       target="<?php echo esc_attr( $link['target'] ); ?>"
                                       class="overwiew-features__image">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                    </a>
                                <?php else : ?>
                                    <a style="display: block;" href="#"
                                       class="overwiew-features__image">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ( $link ) : ?>
                                <a style="display: block;"
                                   href="<?php echo esc_url( $link['url'] ); ?>"
                                   target="<?php echo esc_attr( $link['target'] ); ?>"
                                   class="overwiew-features__title">
                                    <?php the_sub_field( 'name' ); ?>
                                </a>
                            <?php else: ?>
                                <a style="display: block;"
                                   href="#"
                                   class="overwiew-features__title">
                                    <?php the_sub_field( 'name' ); ?>
                                </a>
                            <?php endif; ?>

                            <div class="overwiew-features__subtitle">
                                <?php the_sub_field( 'specialization' ); ?>
                            </div>
                            <div class="overwiew-features__text">
                                <?php the_sub_field( 'text' ); ?>
                                <?php if ( $link  &&  1 == 2) : ?> <!-- commented it -->
                                    <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
                                        <?php echo esc_html( $link['title'] ); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
    </div>
</section>
