<?php
/**
 * Block template file: templates/blocks/main-page/solutions.php
 *
 * Main Page   Solutions Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-solutions-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-solutions';
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
                <?php if (get_field('over_title')) : ?>
                    <div class="header-over-title">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h2>
                        <?php the_field( 'title' ); ?>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="solutions-body">
                <?php if ( have_rows( 'bage' ) ) : ?>
                    <div class="flex-badge-wrap">
                        <div class="flex-row-badge">
                            <?php $index = 1; ?>
                            <?php while ( have_rows( 'bage' ) ) : the_row(); ?>
                               <?php
                                    $index === 1 ? $first_class = '_active' : $first_class = '';
                                ?>
                                <div class="card-badge <?php echo esc_attr( $first_class ); ?>">
                                    <?php $image = get_sub_field( 'image' ); ?>
                                    <?php if ( $image ) : ?>
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                    <?php endif; ?>

                                    <?php if (get_sub_field('text')) : ?>
                                        <p><?php the_sub_field( 'text' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php $index++; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>

                <?php if ( have_rows( 'information_block_wrap' ) ) : ?>
                    <?php $_index = 1; ?>
                    <?php while ( have_rows( 'information_block_wrap' ) ) : the_row(); ?>
                        <?php $_index === 1 ? $_first_class = '_active' : $_first_class = ''; ?>
                        <div class="information_block-wrap <?php echo esc_attr( $_first_class ); ?>">
                            <div class="column">
                                <?php if ( have_rows( 'information_section' ) ) : ?>
                                    <?php while ( have_rows( 'information_section' ) ) : the_row(); ?>
                                        <div class="solutions-information_block">
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

                                            <?php if ( have_rows( 'list_item' ) ) : ?>
                                                <div class="list-items-wrap">
                                                    <?php while ( have_rows( 'list_item' ) ) : the_row(); ?>
                                                        <div class="list-item">
                                                       <span>
                                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                              <path d="M1 8C1 4.13359 4.13359 1 8 1C11.8664 1 15 4.13359 15 8C15 11.8664 11.8664 15 8 15C4.13359 15 1 11.8664 1 8ZM11.1664 6.79141C11.4645 6.49336 11.4645 6.00664 11.1664 5.70859C10.8684 5.41055 10.3816 5.41055 10.0836 5.70859L7.125 8.66719L5.91641 7.45859C5.61836 7.16055 5.13164 7.16055 4.83359 7.45859C4.53555 7.75664 4.53555 8.24336 4.83359 8.54141L6.58359 10.2914C6.88164 10.5895 7.36836 10.5895 7.66641 10.2914L11.1664 6.79141Z" fill="#7363E0"/>
                                                           </svg>
                                                       </span>
                                                            <?php the_sub_field( 'text' ); ?>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            <?php else : ?>
                                                <?php // No rows found ?>
                                            <?php endif; ?>

                                            <?php $link = get_sub_field( 'link' ); ?>
                                            <?php if ( $link ) : ?>
                                                <a href="<?php echo esc_url( $link['url'] ); ?>"
                                                   class="feature-link"
                                                   target="<?php echo esc_attr( $link['target'] ); ?>">
                                                    <?php echo esc_html( $link['title'] ); ?> →
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <?php // No rows found ?>
                                <?php endif; ?>
                            </div>
                            <?php $image = get_sub_field( 'image' ); ?>
                            <div class="column image-block">
                                <div class="feature-image-wrap"
                                     style="background-image: url('<?php echo esc_url( $image['url'] ); ?>')" >
                                </div>
                            </div>
                        </div>
                        <?php $_index++; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
                <?php $link_to_page = get_field( 'link_to_page' ); ?>

            </div>

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
