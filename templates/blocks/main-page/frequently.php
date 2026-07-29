<?php
/**
 * Block template file: templates/blocks/main-page/frequently.php
 *
 * Main Page   Faq Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-faq' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-faq';
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

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="main-page-faq-body">
            <?php if (get_field('title')) : ?>
                <h2>
                    <?php the_field( 'title' ); ?>
                </h2>
            <?php endif; ?>

            <?php if ( have_rows( 'frequently' ) ) : ?>
                <div class="faq-list-block">
                    <?php while ( have_rows( 'frequently' ) ) : the_row(); ?>
                        <div class="faq-item">
                            <div class="faq-header">
                                <?php if (get_sub_field('question')) : ?>
                                    <div class="faq-title">
                                        <?php the_sub_field( 'question' ); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="faq__icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M0 7C0 3.13359 3.13359 0 7 0C10.8664 0 14 3.13359 14 7C14 10.8664 10.8664 14 7 14C3.13359 14 0 10.8664 0 7ZM7 10.0625C7.36367 10.0625 7.65625 9.76992 7.65625 9.40625V7.65625H9.40625C9.76992 7.65625 10.0625 7.36367 10.0625 7C10.0625 6.63633 9.76992 6.34375 9.40625 6.34375H7.65625V4.59375C7.65625 4.23008 7.36367 3.9375 7 3.9375C6.63633 3.9375 6.34375 4.23008 6.34375 4.59375V6.34375H4.59375C4.23008 6.34375 3.9375 6.63633 3.9375 7C3.9375 7.36367 4.23008 7.65625 4.59375 7.65625H6.34375V9.40625C6.34375 9.76992 6.63633 10.0625 7 10.0625Z"
                                                fill="#ABA9B8"/>
                                    </svg>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M0 7C0 3.13359 3.13359 0 7 0C10.8664 0 14 3.13359 14 7C14 10.8664 10.8664 14 7 14C3.13359 14 0 10.8664 0 7ZM4.59375 6.34375C4.23008 6.34375 3.9375 6.63633 3.9375 7C3.9375 7.36367 4.23008 7.65625 4.59375 7.65625H9.40625C9.76992 7.65625 10.0625 7.36367 10.0625 7C10.0625 6.63633 9.76992 6.34375 9.40625 6.34375H4.59375Z"
                                                fill="#ABA9B8"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="faq-body">
                                <?php the_sub_field( 'answer' ); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </div>
</section>