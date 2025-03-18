<?php
/**
 * Block template file: templates/blocks/customers/customers-video-review.php
 *
 * Customers Video Review Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customers-video-review-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customers-video-review';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="features customers-stories <?php echo esc_attr($classes); ?>">

    <?php if (have_rows('information')) : ?>
        <div class="container">
            <div class="customers-stories__wrapper">
                <?php while (have_rows('information')) : the_row(); ?>
                    <?php $avatar_user = get_sub_field('avatar_user'); ?>
                    <?php if (get_sub_field('type') === 'video'): ?>
                        <?php $company_logo = get_sub_field('company_logo'); ?>
                        <?php $image_video = get_sub_field('image_video'); ?>
                        <?php $link_video = get_sub_field('link_video'); ?>
                        <div class="stories__slide swiper-slide customers-stories__slide-foto">
                            <a href="<?php echo esc_url($link_video['url']); ?>"
                               target="<?php echo esc_attr($link_video['target']); ?>" class="stories__slide-video">
                                <div class="stories__slide-img">

                                    <img src="<?php echo esc_url($image_video['url']); ?>"
                                         alt="<?php echo esc_attr($image_video['alt']); ?>"/>

                                </div>
                                <div class="stories__slide-play">
                                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M25 40.382V23.618C25 22.8747 25.7823 22.3912 26.4472 22.7236L43.2111 31.1056C43.9482 31.4741 43.9482 32.5259 43.2111 32.8944L26.4472 41.2764C25.7823 41.6088 25 41.1253 25 40.382Z"
                                                fill="white"/>
                                        <rect x="1" y="1" width="62" height="62" rx="31" stroke="white"
                                              stroke-width="2"/>
                                    </svg>
                                </div>
                            </a>
                            <?php if (isset($link_video['url']) && !empty($link_video['url'])) : ?>
                                <a href="<?php echo esc_url($link_video['url']); ?>" class="stories__slide-btn"
                                   target="<?php echo esc_attr($link_video['target']); ?>"><?php echo esc_html($link_video['title']); ?></a>
                            <?php endif; ?>
                            <div class="stories__slide-footer">
                                <div class="stories__slide-info">
                                    <div class="stories__slide-avatar">
                                        <img src="<?php echo esc_url($avatar_user['url']); ?>"
                                             alt="<?php echo esc_attr($avatar_user['alt']); ?>"/>
                                    </div>
                                    <div class="stories__slide-desc">
                                        <div class="stories__slide-name">
                                            <?php the_sub_field('name_user'); ?>
                                        </div>
                                        <div class="stories__slide-work">
                                            <?php the_sub_field('work_user'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="stories__slide-logo">
                                    <img src="<?php echo esc_url($company_logo['url']); ?>"
                                         alt="<?php echo esc_attr($company_logo['alt']); ?>"/>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="stories__slide swiper-slide customers-stories__slide-text">
                            <div class="stories__slide-video">
                                <div class="stories__slide-box">
                                    <div class="stories__slide-text">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/cov.svg"
                                             alt="cov">
                                        <span><?php the_sub_field('review'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php $link_review = get_sub_field('link_review'); ?>
                            <?php if (isset($link_review['url']) && !empty($link_review['url'])) : ?>
                                <a href="<?php echo esc_url($link_review['url']); ?>" class="stories__slide-btn"
                                   target="<?php echo esc_attr($link_review['target']); ?>"><?php echo esc_html($link_review['title']); ?></a>
                            <?php endif; ?>
                            <div class="stories__slide-footer">
                                <div class="stories__slide-info">
                                    <div class="stories__slide-avatar">
                                        <img src="<?php echo esc_url($avatar_user['url']); ?>"
                                             alt="<?php echo esc_attr($avatar_user['alt']); ?>"/>
                                    </div>
                                    <div class="stories__slide-desc">
                                        <div class="stories__slide-name">
                                            <?php the_sub_field('name_user'); ?>
                                        </div>
                                        <div class="stories__slide-work">
                                            <?php the_sub_field('work_user'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="stories__slide-logo">
                                    <img src="<?php echo esc_url($company_logo['url']); ?>"
                                         alt="<?php echo esc_attr($company_logo['alt']); ?>"/>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>