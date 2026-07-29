<?php
/**
 * Block template file: templates/blocks/main-page/security_compliance.php
 *
 * Main Page   Security  Compliance Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-security--compliance-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-security-compliance';
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
        <div class="flex-row width-100">
            <div class="column">
                <div class="title-wrap-block">
                   <?php if (get_field('over_title')) : ?>
                       <div class="over-title">
                            <?php the_field( 'over_title' ); ?>
                       </div>
                    <?php endif; ?>

                    <?php if ( get_field('title')) : ?>
                         <h2>
                             <?php the_field( 'title' ); ?>
                         </h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="column">
                <?php if ( have_rows( 'card' ) ) : ?>
                    <div class="cards-wrap">
                        <?php while ( have_rows( 'card' ) ) : the_row(); ?>
                            <div class="security-card">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                                <div class="information_block">
                                    <?php if (get_sub_field('title')) : ?>
                                        <h4>
                                            <?php the_sub_field( 'title' ); ?>
                                        </h4>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('text')) : ?>
                                        <p>
                                            <?php the_sub_field( 'text' ); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
                <?php $link_to_page = get_field( 'link_to_page' ); ?>
                <?php if ( $link_to_page ) : ?>
                    <a href="<?php echo esc_url( $link_to_page['url'] ); ?>"
                       class="link-button-transparent"
                       target="<?php echo esc_attr( $link_to_page['target'] ); ?>">
                        <?php echo esc_html( $link_to_page['title'] ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>