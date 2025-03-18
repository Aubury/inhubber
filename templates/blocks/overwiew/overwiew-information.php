<?php
/**
 * Block template file: templates/blocks/overwiew/overwiew-information.php
 *
 * Overwiew Information Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'overwiew-information-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-overwiew-information';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php 

$color = '';

if(get_field( 'color' ) == 'white') {
    $color = 'overwiew-features-white';
}

else {
    $color = 'overwiew-features-grey';
}



?>

<section id="<?php echo esc_attr( $id ); ?>" class="features overwiew-features  <?php echo $color; ?> <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <div class="section-header">
                    <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php the_field( 'title' ); ?>
                    </div>
                    <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php the_field( 'subtitle' ); ?>
                    </h2>

                    <?php if (get_field('text' )) : ?>
                        <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                            <?php the_field( 'text' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php $image = get_field( 'image' ); ?>
                <?php $image_mobi = get_field( 'image_mobi' ); ?>
                <?php if ($image) : ?>
                      <div class="overwiew-features__img">
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        <?php if ( $image_mobi ) : ?>
                        <img class="_mobile" src="<?php echo esc_url( $image_mobi['url'] ); ?>" alt="<?php echo esc_attr( $image_mobi['alt'] ); ?>">
                        <?php endif; ?>
                      </div>
                <?php endif; ?>

              <?php if ( have_rows( 'information' ) ) : ?>
              <div class="overwiew-features__items">
              <?php while ( have_rows( 'information' ) ) : the_row(); ?>
                  <?php $image = get_sub_field( 'image' ); ?>
                    <div class="overwiew-features__item">
                        <?php if($image): ?>
                        <div class="overwiew-features__icon">
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        </div>
                        <?php endif; ?>
                        <div class="overwiew-features__title">
                            <?php the_sub_field( 'title' ); ?>
                        </div>
                        <div class="overwiew-features__text">
                            <?php the_sub_field( 'text' ); ?>
                        </div>
                        <?php $link = get_sub_field( 'link' ); ?>
                        <?php if ( $link ) : ?>
                            <div class="flex-row">
                                <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn-fill white" target="<?php echo esc_attr( $link['target'] ); ?>">
                                    <?php echo esc_html( $link['title'] ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
              </div>
              <?php endif; ?>
            </div>
        </section>