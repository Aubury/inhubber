<?php
/**
 * Block template file: templates/blocks/main/software.php
 *
 * Software Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'software-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-software';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>      
       
       
       <section id="<?php echo esc_attr( $id ); ?>" class="software <?php echo esc_attr( $classes ); ?>">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php the_field( 'title' ); ?>
                    </h2>
                    <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php the_field( 'text' ); ?>
                    </div>
                </div>
                <?php $logo_images = get_field( 'logo' ); ?>
	<?php if ( $logo_images ) :  ?>
                <div class="software__items wow animate__animated animate__fadeInUp">
                <?php foreach ( $logo_images as $logo_image ): ?>
                    <div class="software__item">
                        <div class="software__wrapp">
                            <div class="software__img">
                                <img src="<?php echo esc_url( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_image['alt'] ); ?>">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <?php endif; ?>
            </div>
        </section>