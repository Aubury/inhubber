<?php $id_home = pll_get_post(get_option('page_on_front')); ?>

<?php get_header() ?>


    <section class="offer">
        <div class="container">
            <div class="offer__wrapper">
                <div class="offer__header">
                    <h1><?php echo carbon_get_post_meta($id_home, 'crb_one_block_title'); ?></h1>
                    <div class="offer__text">
                        <?php echo carbon_get_post_meta($id_home, 'crb_one_block_text'); ?>
                    </div>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill">
                        <?php pll_e('Request a demo'); ?>
                    </a>
                </div>

                <?php if ($crb_trusted_gallery = carbon_get_post_meta($id_home, 'crb_trusted_gallery')): ?>
                    <div class="offer__trusted wow animate__animated animate__fadeInUp">
                        <div class=" offer__trusted-title">
                            <?php echo carbon_get_post_meta($id_home, 'crb_trusted_title'); ?>
                        </div>

                        <div class="offer__trusted-images block-logo__slider swiper hero__swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($crb_trusted_gallery as $image): ?>
                                    <div class="offer__trusted-image block-logo__slide swiper-slide">

                                        <img src="<?php echo kama_thumb_src('w=176 &h=64 &crop=false', $image); ?>"
                                             alt="img">

                                    </div>
                                <?php endforeach; ?>
                            </div>


                        </div>
                    </div>
                <?php endif; ?>
                <div class="offer__images wow animate__animated animate__fadeInUp">
                    <div class=" offer__images-big">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/offer__images-big.png"
                             alt="offer__images">
                    </div>
                    <div class="offer__images-small offer__images-small-1">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/offer__images-small-1.svg"
                             alt="offer__images">
                    </div>
                    <div class="offer__images-small offer__images-small-2">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/offer__images-small-2.svg"
                             alt="offer__images">
                    </div>
                    <div class="offer__images-small offer__images-small-3">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/offer__images-small-3.svg"
                             alt="offer__images">
                    </div>
                    <div class="offer__images-small offer__images-small-4">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/offer__images-small-4.svg"
                             alt="offer__images">
                    </div>
                </div>
                <div class="offer__rating">
                    <?php if (carbon_get_post_meta($id_home, 'crb_one_block_rating_stars')): ?>
                        <div class="offer__rating-show">
                            <div class="offer__rating-stars">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/Stars.svg"
                                     alt="Stars">
                            </div>
                            <div class="offer__rating-tex">
                                <?php echo carbon_get_post_meta($id_home, 'crb_one_block_rating_stars'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($crb_one_block_gallery = carbon_get_post_meta($id_home, 'crb_one_block_gallery')): ?>
                    <div class="offer__rating-logo">
                        <?php foreach ($crb_one_block_gallery as $image): ?>
                            <div class="offer__rating-item">
                                <?php echo wp_get_attachment_image($image, 'full',); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="container">
            <div class="section-header">
                <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_features_title'); ?>
                </div>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_features_subtitle'); ?>
                </h2>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_features_text'); ?>
                </div>
            </div>
            <?php if ($crb_trusted_features_info = carbon_get_post_meta($id_home, 'crb_trusted_features_info')): ?>
                <div class="features__items">
                    <?php foreach ($crb_trusted_features_info as $item): ?>

                        <div class="features__item _<?php echo $item['size'] ?> wow animate__animated animate__fadeInUp">
                            <div class=" features__wrapp">
                                <div class="features__image">
                                    <?php echo wp_get_attachment_image($item['image'], 'full',); ?>
                                    <?php echo wp_get_attachment_image($item['image_table'], 'full', false, ['class' => 'tablet', 'alt' => 'image_table']); ?>
                                </div>
                                <div class="features__info">
                                    <div class="features__title">
                                        <?php echo $item['title'] ?>
                                    </div>
                                    <div class="features__text">
                                        <?php echo $item['text'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php if ($crb_trusted_solutions_info = carbon_get_post_meta($id_home, 'crb_trusted_solutions_info')): ?>

    <section class="solutions">
        <div class="container">
            <div class="section-header">
                <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_solutions_title'); ?>
                </div>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_solutions_subtitle'); ?>
                </h2>
            </div>
            <div class="solutions__wrapper">
                <div class="solutions__tabs wow animate__animated animate__fadeInUp">
                    <?php foreach ($crb_trusted_solutions_info as $item): ?>
                        <div class="solutions__tab">
                            <div class="solutions__tab-icon">
                                <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => '_normal', 'alt' => $item['name']]); ?>
                                <?php echo wp_get_attachment_image($item['icon_active'], 'full', false, ['class' => '_hover', 'alt' => $item['name']]); ?>
                            </div>
                            <div class="solutions__tab-text">
                                <?php echo $item['name'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="solutions__contents wow animate__animated animate__fadeInUp">
                    <?php foreach ($crb_trusted_solutions_info as $item): ?>
                        <div class="solutions__content">
                            <div class="solutions__content-image">
                                <?php echo wp_get_attachment_image($item['image'], 'full'); ?>
                            </div>
                            <div class="solutions__content-info">
                                <div class="solutions__content-title">
                                    <?php echo $item['title'] ?>
                                </div>
                                <?php echo wpautop($item['text']) ?>
                                <a href="<?php echo $item['url'] ?>"
                                   class="solutions__content-btn"><?php pll_e('Learn more'); ?>
                                    →</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <section class="benefits">
        <div class="container">
            <div class="benefits__wrapper">
                <div class="benefits__descr">
                    <div class="section-header">
                        <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                            <?php echo carbon_get_post_meta($id_home, 'crb_trusted_benefits_title'); ?>
                        </div>
                        <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                            <?php echo carbon_get_post_meta($id_home, 'crb_trusted_benefits_subtitle'); ?>
                        </h2>
                        <a href=""
                           onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                           class="benefits__btn btn-fill wow animate__animated animate__fadeInUp">
                            <?php pll_e('Request a demo'); ?>
                        </a>
                    </div>
                </div>
                <?php if ($crb_trusted_benefits_info = carbon_get_post_meta($id, 'crb_trusted_benefits_info')): ?>
                    <div class="benefits__items">

                        <?php foreach ($crb_trusted_benefits_info as $item): ?>
                            <div class="benefits__item">
                                <div class="benefits__wrapp">
                                    <div class="benefits__undertext">
                                        <?php echo $item['undertext']; ?>
                                    </div>
                                    <div class="benefits__number">
                                        <span data-number="<?php echo $item['number']; ?>">0</span>%
                                    </div>
                                    <div class="benefits__title">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <div class="benefits__text">
                                        <?php echo $item['text']; ?>
                                    </div>
                                    <?php if ($item['overtext']): ?>
                                        <div class="benefits__overtext">
                                            <?php echo $item['overtext']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php if ($crb_trusted_stories_info = carbon_get_post_meta($id_home, 'crb_trusted_stories_info')): ?>
    <section class="stories">
        <div class="container">
            <div class="section-header">
                <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_stories_title'); ?>
                </div>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_stories_subtitle'); ?>
                </h2>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_trusted_stories_text'); ?>
                </div>
            </div>
            <div class="stories__wrapper wow animate__animated animate__fadeInUp">
                <div class="stories__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($crb_trusted_stories_info as $item): ?>
                            <div class="stories__slide swiper-slide">
                                <?php if ($item['link_video'] && $item['image']): ?>
                                    <a href="<?php echo $item['link_video'] ?>" class="stories__slide-video videoModal">
                                        <div class="stories__slide-img">
                                            <?php echo wp_get_attachment_image($item['image'], 'full',); ?>

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
                                <?php else: ?>
                                    <div class="stories__slide-video">
                                        <div class="stories__slide-box">
                                            <div class="stories__slide-text">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/cov.svg"
                                                     alt="cov">
                                                <span><?php echo $item['text']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php
                                if (isset($item['url']) && !empty($item['url'])) {
                                    ?>
                                    <a href="<?php echo esc_url($item['url']); ?>" class="stories__slide-btn">
                                        <?php pll_e('View story'); ?> →
                                    </a>
                                    <?php
                                }
                                ?>
                                <div class="stories__slide-footer">
                                    <div class="stories__slide-info">
                                        <div class="stories__slide-avatar">
                                            <?php echo wp_get_attachment_image($item['photo_authot'], 'full',); ?>
                                        </div>
                                        <div class="stories__slide-desc">
                                            <div class="stories__slide-name">
                                                <?php echo $item['author'] ?>
                                            </div>
                                            <div class="stories__slide-work">
                                                <?php echo $item['company'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stories__slide-logo">
                                        <?php echo wp_get_attachment_image($item['logo_company'], 'full',); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
        </div>
    </section>

<?php endif; ?>

<?php if ($crb_software_gallery = carbon_get_post_meta($id_home, 'crb_software_gallery')): ?>
    <section class="software">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_software_title') ?>
                </h2>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_software_text') ?>
                </div>
            </div>
            <div class="software__items wow animate__animated animate__fadeInUp">
                <?php foreach ($crb_software_gallery as $image): ?>
                    <div class="software__item">
                        <div class="software__wrapp">
                            <div class="software__img">
                                <?php echo wp_get_attachment_image($image, 'full',); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

    <section class="resourse">
        <div class="container">
            <div class="resourse__wrapper">
                <div class="section-header">
                    <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                        <?php echo carbon_get_post_meta($id_home, 'crb_resources_title'); ?>
                    </div>
                    <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                        <?php echo carbon_get_post_meta($id_home, 'crb_resources_subtitle'); ?>
                    </h2>
                    <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                        <?php echo carbon_get_post_meta($id_home, 'crb_resources_text'); ?>
                    </div>
                </div>
                <div class="resourse__items">
                    <?php $onePost = new WP_Query([

                        'post_type' => 'post',
                        'posts_per_page' => 1

                    ]); ?>
                    <?php if ($onePost->have_posts()) : ?>
                        <div class="resourse__item wow animate__animated animate__fadeInUp">
                            <?php $id_blog = get_option('page_for_posts'); ?>
                            <?php while ($onePost->have_posts()) : $onePost->the_post(); ?>
                                <a href="<?php echo get_page_link(pll_get_post($id_blog)); ?>" class="resourse__wrapp">
                                    <div class="resourse__header">
                                        <div class="resourse__header-img">
                                            <picture>
                                                <?php echo kama_thumb_img('w=284 &h=140 &crop=false  &alt=' . get_the_title() . ''); ?>
                                            </picture>
                                        </div>
                                        <div class="resourse__header-desc">
                                            <div class="resourse__header-text">
                                                <?php echo kama_excerpt(['maxchar' => 36, 'text' => get_the_title(get_the_ID())]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="resourse__info">
                                        <div class="resourse__title">
                                            <?php pll_e('Blog'); ?> →
                                        </div>
                                        <?php

                                        $terms = get_terms([
                                            'taxonomy' => 'category',
                                            'hide_empty' => false,
                                            'orderby' => 'count',
                                            'order' => 'DESC',
                                            'number' => 2,
                                        ]);

                                        ?>
                                        <?php if ($terms): ?>
                                            <div class="resourse__text">
                                                <?php foreach ($terms as $k => $cat) {
                                                    if ($k == 0) {
                                                        echo $cat->name . ', ';
                                                    } else {
                                                        echo $cat->name;
                                                    }


                                                } ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="resourse__item wow animate__animated animate__fadeInUp">
                        <a href="<?php echo get_post_type_archive_link('events'); ?>" class="resourse__wrapp">
                            <div class="resourse__header">
                                <div class="resourse__header-img">
                                    <picture>
                                        <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/resourse__img-2.webp"
                                                type="image/webp">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/resourse__img-2.png"
                                             alt="resourse__img"/>
                                    </picture>
                                </div>
                                <div class="resourse__header-desc">
                                    <div class="resourse__header-label">
                                        <?php pll_e('18 Jan, Wed at 12:00'); ?>
                                    </div>
                                    <div class="resourse__header-text">
                                        <?php pll_e('Digitaler Mietvertrag – so einfach wie...'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="resourse__info">
                                <div class="resourse__title">
                                    <?php pll_e('Events'); ?> →
                                </div>
                                <div class="resourse__text">
                                    <?php pll_e('Our upcoming events'); ?>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="resourse__item wow animate__animated animate__fadeInUp">
                        <a href="<?php echo get_post_type_archive_link('library'); ?>" class="resourse__wrapp">
                            <div class="resourse__img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/resourse__img-3.svg"
                                     alt="resourse__img"/>
                            </div>
                            <div class="resourse__info">
                                <div class="resourse__title">
                                    <?php pll_e('Library'); ?> →
                                </div>
                                <?php

                                $library_cat = get_terms([
                                    'taxonomy' => 'library_cat',
                                    'hide_empty' => false,
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'number' => 2,
                                ]);

                                ?>
                                <?php if ($library_cat): ?>
                                    <div class="resourse__text">
                                        <?php foreach ($library_cat as $k => $cat) {
                                            if ($k == 0) {
                                                echo $cat->name . ', ';
                                            } else {
                                                echo $cat->name;
                                            }


                                        } ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php if ($faqs = carbon_get_post_meta($id_home, 'crb_faq')): ?>
    <section class="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_faq_title'); ?>
                </h2>

                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_faq_text'); ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;">
                        <?php pll_e('Contact sales'); ?> →
                    </a>
                </div>

            </div>
            <div class="faq__items">
                <?php foreach ($faqs as $item): ?>
                    <div class="faq__item wow animate__animated animate__fadeInUp">
                        <div class="faq__header">
                            <div class="faq__title">
                                <?php echo $item['question'] ?>
                            </div>
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
                        <div class="faq__body">
                            <div class="faq__text">
                                <?php echo $item['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php get_template_part('templates/footer-everything') ?>

<?php get_footer(); ?>