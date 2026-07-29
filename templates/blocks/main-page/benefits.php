<?php
/**
 * Block template file: templates/blocks/main-page/benefits.php
 *
 * Main Page   Benefits Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page---benefits-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page---benefits';
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

<?php $bg_color = '';
 if (get_field('select_background') === 'Gray') :
    $bg_color = 'bg-gray';
endif; ?>

<section id="<?php echo esc_attr( $id ); ?>" class="new-benefits benefits <?php echo esc_attr( $classes ) . ' ' . esc_attr( $bg_color ); ?>">
    <div class="container">
        <div class="new-benefits-container">
            <div class="header-align-left">
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

            <?php if ( have_rows( 'card' ) ) : ?>
                <div class="benefits-cards-container">
                    <?php while ( have_rows( 'card' ) ) : the_row(); ?>
                        <div class="benefits-card">
                            <div class="benefits-card-header">
                                <?php if (get_sub_field('title')) : ?>
                                    <div class="benefits-card-title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_sub_field('number')) : ?>
                                    <div class="benefits__number">
                                        <span data-number=" <?php the_sub_field( 'number' ); ?>">0</span>%
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ( get_sub_field('text') ) : ?>
                                <div class="benefits-card-text">
                                    <?php the_sub_field( 'text' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <div class="benefits-card-button">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />

                                    <?php if ( get_sub_field( 'link' ) ) : ?>
                                        <span class="benefits-card-link">
                                      <a href="<?php the_sub_field( 'link' ); ?>">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                              <path d="M13 3.75V11.25C13 11.6641 12.6641 12 12.25 12C11.836 12 11.5 11.6641 11.5 11.25V5.55937L4.28129 12.7781C4.13379 12.9281 3.94191 13 3.75004 13C3.55816 13 3.36629 12.9268 3.21973 12.7803C2.92676 12.4873 2.92676 12.0128 3.21973 11.7197L10.4407 4.5H4.75004C4.33598 4.5 4.00004 4.16562 4.00004 3.75C4.00004 3.33437 4.33598 3 4.75004 3H12.25C12.6657 3 13 3.3375 13 3.75Z" fill="#ABA9B8"/>
                                          </svg>
                                      </a>
                                  </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
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
</section>
