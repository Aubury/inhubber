<?php
/**
 * Block template file: templates/blocks/solutions/solutions-information.php
 *
 * Solutions Information Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'solutions-information-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-solutions-information';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
	<?php if ( have_rows( 'solutions_information' ) ) : ?>
<section id="<?php echo esc_attr( $id ); ?>" class="about-us-values solutions-description <?php echo esc_attr( $classes ); ?>">
            <div class="container">
               <?php $k = 1; ?>
            <?php while ( have_rows( 'solutions_information' ) ) : the_row(); ?>
            
               <div class="solutions-description__wrapper <?php if($k % 2 == 0): ?> _revers <?php endif; ?>">
                    <div class="solutions-description__descr">
                        <h2>
                        <?php the_sub_field( 'title' ); ?>
                        </h2>
                        <div class="solutions-description__text">
                        <?php the_sub_field( 'text' ); ?>   
                        </div>
                    </div>
                    <?php $image = get_sub_field( 'image' ); ?>
                    <div class="solutions-description__img">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                    </div>
                </div>
                  
               
            <?php $k++; ?>
            <?php endwhile; ?>

            </div>
        </section>

        <?php endif; ?>