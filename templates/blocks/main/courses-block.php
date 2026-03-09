<?php
/**
 * Block template file: templates/blocks/main/courses-block.php
 *
 * Courses Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'courses';
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-courses';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>


<section id="<?php echo esc_attr( $id ); ?>" class="features courses-block <?php echo esc_attr( $classes ); ?>">
    <div class="container">
    <div class="section-header">
        <h2>
            <?php the_field( 'title' ); ?>
        </h2>
        <div class="section-header__undertitle">
            <?php the_field( 'under_title_text' ); ?>
        </div>
    </div>

    <?php if ( have_rows( 'information_block' ) ) : ?>

        <?php while ( have_rows( 'information_block' ) ) : the_row(); ?>
            <div class="info-block">

                <div class="info-frame">
                    <?php $icon = get_sub_field( 'icon' ); ?>
                    <?php if ( $icon ) : ?>
                        <div class="icon">
                            <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                        </div>
                    <?php endif; ?>

                    <div class="features__title">
                        <?php the_sub_field( 'title' ); ?>
                    </div>

                    <?php if ( get_sub_field('under_title_text') ) : ?>
                        <div class="features__text" style="margin-top: 0;">
                            <?php the_sub_field( 'under_title_text' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                    <?php $link_button = get_sub_field( 'link_button' ); ?>
                    <?php if ( $link_button ) : ?>
                        <a href="<?php echo esc_url( $link_button['url'] ); ?>"
                           class="button_border"
                           target="<?php echo esc_attr( $link_button['target'] ); ?>">
                            <?php echo esc_html( $link_button['title'] ); ?>
                        </a>
                    <?php endif; ?>

            </div>

        <?php endwhile; ?>

     <?php endif; ?>

    </div>
</section>