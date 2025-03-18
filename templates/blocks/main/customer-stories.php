<?php
/**
 * Block template file: templates/blocks/main/customer-stories.php
 *
 * Customer Stories Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customer-stories-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customer-stories';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>


<section id="<?php echo esc_attr($id); ?>" class="stories <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="section-header">
            <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                <?php the_field('title'); ?>
            </div>
            <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                <?php the_field('subtitle'); ?>
            </h2>
            <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                <?php the_field('text'); ?>
            </div>
        </div>

        <?php if (have_rows('information')) : ?>
            <div class="stories__wrapper wow animate__animated animate__fadeInUp">
                <div class="stories__slider swiper">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('information')) : the_row(); ?>
                            <?php $avatar_user = get_sub_field('avatar_user'); ?>
                            <?php $link_review = get_sub_field('link_review'); ?>
                            <?php $company_logo = get_sub_field('company_logo'); ?>
                            <?php $image_video = get_sub_field('image_video'); ?>
                            <?php $link_video = get_sub_field('link_video'); ?>
                            <?php if (get_sub_field('type') === 'video'): ?>

                                <div class="stories__slide swiper-slide">
                                    <a href="<?php echo esc_url($link_video['url']); ?>"
                                       class="stories__slide-video videoModal">
                                        <div class="stories__slide-img">

                                            <?php if (is_array($image_video) && isset($image_video['url']) && isset($image_video['alt'])) : ?>
                                                <img src="<?php echo esc_url($image_video['url']); ?>"
                                                     alt="<?php echo esc_attr($image_video['alt']); ?>"/>
                                            <?php endif; ?>


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

                            <?php else: ?>
                                <div class="stories__slide swiper-slide">
                                    <div class="stories__slide-video">
                                        <div class="stories__slide-box">
                                            <div class="stories__slide-text">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/cov.svg"
                                                     alt="cov">
                                                <span><?php the_sub_field('review'); ?></span>
                                            </div>
                                        </div>
                                    </div>

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
                <div class="stories__nav">
                    <div class="swiper-button-prev">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M6.41568 0.241078L0.456999 6.46011C0.311563 6.61062 0.239348 6.80572 0.239348 7C0.239348 7.19429 0.311563 7.38955 0.456999 7.5399L6.41568 13.7589C6.71352 14.0712 7.20779 14.0813 7.5189 13.7823C7.83213 13.4854 7.84232 12.9889 7.5423 12.6788L2.07502 6.97068L7.54136 1.32119C7.84137 1.01203 7.83119 0.514767 7.51796 0.217647C7.20681 -0.0814267 6.71183 -0.0710128 6.41568 0.241078Z"
                                    fill="#ABA9B8"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M6.41568 0.241078L0.456999 6.46011C0.311563 6.61062 0.239348 6.80572 0.239348 7C0.239348 7.19429 0.311563 7.38955 0.456999 7.5399L6.41568 13.7589C6.71352 14.0712 7.20779 14.0813 7.5189 13.7823C7.83213 13.4854 7.84232 12.9889 7.5423 12.6788L2.07502 6.97068L7.54136 1.32119C7.84137 1.01203 7.83119 0.514767 7.51796 0.217647C7.20681 -0.0814267 6.71183 -0.0710128 6.41568 0.241078Z"
                                    fill="#ABA9B8"/>
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>