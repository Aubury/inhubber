<?php
/**
 * Block template file: templates/blocks/main-page/contracts-rating-badges.php
 *
 * Main Page   Contracts With Rating Badges Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-contracts-with-rating-badges-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-contracts-with-rating-badges';
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
        <div class="contracts-with-rating-badges-wrap">
            <div class="main-title-block-container">
                <div class="main-title-block-header">
                    <?php if (get_field('title')) : ?>
                        <h2 class="base-header-title">
                            <?php the_field( 'title' ); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (get_field('under_title_text')) : ?>
                        <p>
                            <?php the_field( 'under_title_text' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php $link_button = get_field('link_button'); ?>
                <?php if ( $link_button ) : ?>
                    <?php
                    $url = '';
                    $onclick = '';

                    if ( $link_button['url'] !== '#' ) :
                        $url = $link_button['url'];
                    else:
                        $onclick = "Calendly.initPopupWidget({url:'" .  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()) . "' });return false;";
                    endif;
                    ?>

                    <a href="<?php echo esc_url( $url ); ?>"
                       onclick="<?php echo esc_attr( $onclick ); ?>"
                       class="btn-fill">
                        <?php echo esc_html( $link_button['title'] ); ?>
                    </a>

                <?php endif; ?>
            </div>

            <?php if ( have_rows( 'rating_&_compliance_badges' ) ) : ?>
                <div class="rating-compliance_badges">
                    <?php while ( have_rows( 'rating_&_compliance_badges' ) ) : the_row(); ?>

                        <?php if ( have_rows( 'rating' ) ) : ?>
                            <div class="rating-row">
                                <?php while ( have_rows( 'rating' ) ) : the_row(); ?>
                                    <?php $image = get_sub_field( 'image' ); ?>
                                    <?php if ( $image ) : ?>
                                        <img src="<?php echo esc_url( $image['url'] ); ?>"
                                             alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if ( have_rows( 'compliance' ) ) : ?>
                            <div class="compliance-row">
                                <?php while ( have_rows( 'compliance' ) ) : the_row(); ?>
                                    <div class="singe-badge">
                                        <?php $image = get_sub_field( 'image' ); ?>
                                        <?php if ( $image ) : ?>
                                            <img src="<?php echo esc_url( $image['url'] ); ?>"
                                                 alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                        <?php endif; ?>

                                        <?php if (get_sub_field('text')) : ?>
                                            <div class="singe-badge-text">
                                                <?php the_sub_field( 'text' ); ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>