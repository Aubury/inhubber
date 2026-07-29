<?php
/**
 * Block template file: templates/blocks/main-page/features.php
 *
 * Main Page   Features Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page---features-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-features';
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
        <div class="flex-column-align-center">
            <div class="header-align-center">
                <?php if ( get_field('over_title')) :?>
                    <div class="header-over-title">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( get_field('title')) : ?>
                    <h2 class="header-block-title">
                        <?php the_field( 'title' ); ?>
                    </h2>
                <?php endif; ?>
            </div>

            <?php if ( have_rows( 'features_blocks' ) ) :
                $index = 1;
                ?>
                <div class="features-blocks-list">
                    <?php while ( have_rows( 'features_blocks' ) ) : the_row(); ?>
                         <?php $index % 2 === 0 ? $class = 'display-right': $class = '';  ?>

                            <div class="flex-row-two-column border-radius <?php echo $index; ?>">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <div class="feature-image-block  <?php echo $class; ?>">
                                        <div class="feature-image-wrap"
                                             style="background-image: url('<?php echo esc_url( $image['url'] ); ?>')" >
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="feature-information-block <?php echo $class; ?>">
                                    <?php if ( get_sub_field('over_title')) : ?>
                                        <div class="feature-over_title"
                                             style="background: <?php the_sub_field( 'background_of_over_title_text') ?>;">
                                            <?php the_sub_field( 'over_title' ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="feature-body-block">
                                        <?php if (get_sub_field('title')) :?>
                                            <div class="feature-title">
                                                <?php the_sub_field( 'title' ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('text')) :?>
                                            <div class="feature-text">
                                                <?php the_sub_field( 'text' ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if ( $link ) : ?>
                                        <a href="<?php echo esc_url( $link['url'] ); ?>"
                                           class="feature-link"
                                           target="<?php echo esc_attr( $link['target'] ); ?>">
                                            <?php echo esc_html( $link['title'] ); ?> →
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php $index++; ?>
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
</section>