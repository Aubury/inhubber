<?php
/**
 * Block template file: templates/blocks/first-page-block/events-first-block-of-page.php
 *
 * First Block Of Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'first-block-of-page-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-first-block-of-page';
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

<section id="<?php echo esc_attr( $id ); ?>" class="single-offer <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="single-offer__wrapper">
            <?php if ( get_field( 'display_badge_or_over_title' ) == 1 ) : ?>
                <?php if ( have_rows( 'badge_number_one' ) ) : ?>
                    <?php while ( have_rows( 'badge_number_one' ) ) : the_row(); ?>
                        <div class="over_title_badge" style="margin-bottom: 24px;">
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php endif; ?>

                            <div class="desktop-display">
                                <?php the_sub_field( 'text' ); ?>
                            </div>

                            <div class="table-display">
                                <?php the_sub_field( 'text_for_mobile' ); ?>
                            </div>

                            <?php $company_image = get_sub_field( 'company_image' ); ?>
                            <?php if ( $company_image ) : ?>
                                <div class="company-image-badge-block">
                                    <img src="<?php echo esc_url( $company_image['url'] ); ?>" alt="<?php echo esc_attr( $company_image['alt'] ); ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else : ?>
                <?php // echo 'false'; ?>
            <?php endif; ?>
            
            <?php if (get_field('title')) : ?>
                <h1>
                    <?php the_field( 'title' ); ?>
                </h1>
            <?php endif; ?>

            <?php if (get_field('text')) : ?>
                <div class="single-offer__text">
                    <?php the_field( 'text' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>