<?php
/**
 * Block template file: templates/blocks/events/all-events.php
 *
 * Events List Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-events-list';
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

<section id="<?php echo esc_attr( $id ); ?>" class="events-content <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <?php if ( have_rows( 'list_events_of_the_month' ) ) : ?>
            <?php while ( have_rows( 'list_events_of_the_month' ) ) : the_row(); ?>
                <div class="events-content__wrapper">
                    <?php if (get_sub_field( 'month_and_year' )) : ?>
                        <div class="events-content__date">
                            <?php the_sub_field( 'month_and_year' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( have_rows( 'event' ) ) : ?>
                    <div class="events-content__items">
                        <?php while ( have_rows( 'event' ) ) : the_row(); ?>
                        <div class="events-content__item">
                            <a href="<?php the_sub_field( 'link' ); ?>"
                               target="_blank" class="events-content__item-wrapp">
                                <div class="events-content__item-box">
                                    <?php
                                        $data = get_sub_field( 'event_start_date' );
                                        $newDate = explode("/", $data);
                                    ?>
                                    <div class="events-content__item-date">
                                        <div class="events-content__item-month">
                                            <?php echo $newDate[1]; ?>
                                        </div>
                                        <div class="events-content__item-number">
                                            <?php echo $newDate[0]; ?>
                                        </div>
                                    </div>
                                    <div class="btn-fill"
                                         href="<?php echo carbon_get_post_meta(get_the_ID(), 'crb_event_register') ?>">
                                        <?php pll_e('Register'); ?>
                                    </div>
                                </div>

                                <div class="events-content__item-info">
                                    <div class="events-content__item-title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                    <div class="events-content__item-text">
                                        <?php the_sub_field( 'description' ); ?>
                                    </div>
                                </div>

                                <div class="events-content__item-right">
                                    <?php if ( have_rows( 'speakers' ) ) : ?>
                                        <div class="events-content__item-avatars">
                                            <?php while ( have_rows( 'speakers' ) ) : the_row(); ?>
                                                <?php $image = get_sub_field( 'image' ); ?>
                                                <?php if ( $image ) : ?>
                                                    <div class="events-content__item-avatar">
                                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="speaker" />
                                                    </div>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php else : ?>
                                        <?php // No rows found ?>
                                    <?php endif; ?>

                                    <div class="btn-fill"><?php pll_e('Register'); ?></div>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
    </div>
</section>
