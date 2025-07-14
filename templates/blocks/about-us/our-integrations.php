<?php
/**
 * Block template file: templates/blocks/about-us/our-integrations.php
 *
 * Our Integrations Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-integrations-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-our-integrations';
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
    <div class="container standard-block-gap">
        <div class="section-header">
            <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                <?php the_field( 'title' ); ?>
            </h2>
        </div>
       <div class="our-integration-wrap">
           <?php if ( have_rows( 'icon_of_integrations' ) ) : ?>
               <?php while ( have_rows( 'icon_of_integrations' ) ) : the_row(); ?>
                   <?php $icon = get_sub_field( 'icon' ); ?>
                   <?php if ( $icon ) : ?>
                      <div class="icon-frame">
                          <img  src="<?php echo esc_url( $icon['url'] ); ?>" alt="icon" />
                      </div>
                   <?php endif; ?>
               <?php endwhile; ?>
           <?php else : ?>
               <?php // No rows found ?>
           <?php endif; ?>
       </div>
        <div>
            <?php $link = get_field( 'link' ); ?>
            <?php if ( $link ) : ?>
                <a href="<?php echo esc_url( $link['url'] ); ?>" class="btn-fill white">
                    <?php echo esc_html( $link['title'] ); ?> →
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>