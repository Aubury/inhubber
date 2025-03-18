<?php

/**
 * Block template file: templates/blocks/glossary/related-terms.php
 *
 * Related Terms Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'related-terms-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-related-terms';
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

<section id="<?php echo esc_attr( $id ); ?>" class="features overwiew-features  overwiew-features-white block-overwiew-information <?php echo esc_attr( $classes ); ?>">
	<div class="container">
        <div class="section-header">
            <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                <?php the_field( 'title' ); ?>
            </div>
        </div>
        <div class="glossary-container">
            <div class="glossary-grid">
            <?php if ( have_rows( 'blogs' ) ) : ?>
                <?php while ( have_rows( 'blogs' ) ) : the_row(); ?>
                    <?php $single_post = get_sub_field( 'single_post' ); ?>
                    <?php if ( $single_post ) : ?>
                        <?php

                         $post = $single_post;
                         $short_excerpt = wp_trim_words($post->content, 20, '...');
                         setup_postdata( $post );
                         ?>
                            <div class="glossary-card">
                                <a href="<?php the_permalink(); ?>">

                                            <h3 class="blog-content__title">
                                                <?php echo the_title(); ?>
                                            </h3>

                                            <div class="blog-content__date">
                                                <?php echo $short_excerpt; ?>
                                            </div>
                                    </a>
                            </div>

                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
            </div>
        </div>
	</div>
</section>