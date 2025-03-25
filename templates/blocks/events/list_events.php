<?php
/**
 * Block template file: templates/blocks/events/list_events.php
 *
 * List Events Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'list-events-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-list-events';
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
        <div class="section-header full-width">
            <h2 class="section-header__title">
                <?php the_field( 'title' ); ?>
            </h2>
        </div>


    <?php if ( have_rows( 'list_events' ) ) : ?>
        <div class="events-content__wrapper">
        <?php while ( have_rows( 'list_events' ) ) : the_row(); ?>
            <?php $event = get_sub_field( 'event' ); ?>
            <?php if ( $event ) : ?>
                <?php $post = $event; ?>
                <div class="events-content__item">
                    <a href="<?php echo carbon_get_post_meta($post->ID, 'crb_event_link') ?>"
                       target="_blank" class="events-content__item-wrapp">
                        <div class="events-content__item-box">
                            <?php $newDate = explode("-", carbon_get_post_meta($post->ID, 'crb_event_start_date')); ?>

                            <div class="events-content__item-date">
                                <div class="events-content__item-month">
                                    <?php echo $newDate[1]; ?>
                                </div>
                                <div class="events-content__item-number">
                                    <?php echo $newDate[2]; ?>
                                </div>
                            </div>
                            <div class="btn-fill"
                                 href="<?php echo carbon_get_post_meta($post->ID, 'crb_event_register') ?>">
                                <?php pll_e('Register'); ?>
                            </div>
                        </div>
                        <div class="events-content__item-info">
                            <div class="events-content__item-title">
                                <?php echo $post->post_title; ?>
                            </div>
                            <div class="events-content__item-text">
                                <?php echo carbon_get_post_meta($post->ID, 'crb_event_desk') ?>
                            </div>
                        </div>
                        <div class="events-content__item-right">
                            <?php if ($photo = carbon_get_post_meta($post->ID, 'crb_event_slider')): ?>
                                <div class="events-content__item-avatars">
                                    <?php foreach ($photo as $item): ?>
                                        <?php if ( !empty($item['photo'])) : ?>
                                            <div class="events-content__item-avatar">
                                                <?php echo wp_get_attachment_image($item['photo'], 'full',); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="btn-fill"><?php pll_e('Register'); ?></div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        </div>
    <?php else : ?>
        <?php // No rows found ?>
    <?php endif; ?>
    </div>
</section>