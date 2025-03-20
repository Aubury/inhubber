<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="apple-touch-icon" sizes="76x76"
          href="<?php echo get_template_directory_uri() ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/img/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/assets/img/safari-pinned-tab.svg"
          color="#5bbad5">
    <!-- Calendly Link-Widget Beginn -->
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
    <!-- Calendly Link-Widget Ende -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <?php if (carbon_get_theme_option('crb_options_header_video_text' . carbon_lang_prefix())): ?>
        <div class="header__top top-header">
            <div class="container">
                <div class="top-header__wrapper">
                    <div class="top-header__left">
                        <div class="top-header__icon">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/Video.svg" alt="Video">
                        </div>
                        <div class="top-header__text">
                            <?php echo carbon_get_theme_option('crb_options_header_video_text' . carbon_lang_prefix()); ?>

						</div>
                    </div>

                    <?php
                    $calendar_link = carbon_get_theme_option('crb_options_header_video_register' . carbon_lang_prefix());
                    ?>

                    <div class="top-header__right">
						<a href=""
                           onclick="Calendly.initPopupWidget({url: '<?php echo $calendar_link ?>' });return false;">
							<?php pll_e('Register'); ?> →
						</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="header__bottom bottom-header">
        <div class="container">
            <div class="bottom-header__wrapper">
                <div class="bottom-header__logo">
                    <a href="<?php echo home_url() ?>">
                        <?php if (carbon_get_theme_option('crb_options_logo' . carbon_lang_prefix())): ?>
                            <?php echo wp_get_attachment_image(carbon_get_theme_option('crb_options_logo' . carbon_lang_prefix()), 'full',); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/Logo.svg" alt="Logo">
                        <?php endif; ?>
                    </a>
                </div>
                <?php

                    $language = function_exists('pll_current_language') ? pll_current_language() : 'en';

                    if ( $language == 'en' ) {
                        if ( get_field( 'showing_menu_en', 'option' ) == 1 ) {
                            get_template_part('templates/blocks/main/mane_menu_en', get_post_format());
                        } else {
                            wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'container' => 'nav',
                                'container_class' => 'bottom-header__nav',
                                'menu_class' => 'bottom-header__nav-list',
                                'depth' => 2,
                                'walker' => new Header_Walker_Nav_Menu(),
                            ));
                        }
                    } elseif ( $language == 'de' ) {
                        if ( get_field( 'showing_menu_de', 'option' ) == 1 ) {
                            get_template_part('templates/blocks/main/mane_menu_de', get_post_format());
                        } else {
                            wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'container' => 'nav',
                                'container_class' => 'bottom-header__nav',
                                'menu_class' => 'bottom-header__nav-list',
                                'depth' => 2,
                                'walker' => new Header_Walker_Nav_Menu(),
                            ));
                        }
                    }

                    ?>
                <div class="language">
                    <div class="langeage__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 16 16" fill="none">
                            <path
                                    d="M11 8C11 8.69375 10.9625 9.3625 10.8969 10H5.10313C5.0375 9.3625 4.97188 8.69375 4.97188 8C4.97188 7.30625 5.0375 6.6375 5.10313 6H10.8969C10.9625 6.6375 11 7.30625 11 8ZM15.7469 6C15.9125 6.64062 16 7.30937 16 8C16 8.69063 15.9125 9.35938 15.7469 10H11.9C11.9656 9.35625 12 8.65938 12 8C12 7.3125 11.9656 6.64375 11.9 6H15.7469ZM15.4187 5H11.7719C11.4594 3.00437 10.8406 1.33188 10.0437 0.263813C12.4937 0.909063 14.4812 2.68563 15.4187 5ZM10.7594 5H5.24062C5.43125 3.8625 5.725 2.85562 6.08437 2.04219C6.4125 1.30437 6.77812 0.769063 7.13125 0.431563C7.48125 0.0993125 7.77187 0 8 0C8.22812 0 8.51875 0.0993125 8.86875 0.431563C9.22187 0.769063 9.5875 1.30437 9.91562 2.04219C10.275 2.85562 10.5687 3.8625 10.7594 5ZM0.581563 5C1.51844 2.68563 3.50625 0.909063 5.95625 0.263813C5.15938 1.33188 4.54063 3.00437 4.22813 5H0.581563ZM4.1 6C4.03437 6.64375 3.97187 7.3125 3.97187 8C3.97187 8.65938 4.03437 9.35625 4.1 10H0.252031C0.0875 9.35938 0 8.69063 0 8C0 7.30937 0.0875 6.64062 0.252031 6H4.1ZM6.08437 13.9563C5.725 13.1438 5.43125 12.1375 5.24062 11H10.7594C10.5687 12.1375 10.275 13.1438 9.91562 13.9563C9.5875 14.6969 9.22187 15.2313 8.86875 15.5688C8.51875 15.9 8.22813 16 7.97188 16C7.77188 16 7.48125 15.9 7.13125 15.5688C6.77812 15.2313 6.4125 14.6969 6.08437 13.9563ZM5.95625 15.7375C3.50625 15.0906 1.51844 13.3156 0.581563 11H4.22813C4.54063 12.9969 5.15938 14.6687 5.95625 15.7375ZM10.0437 15.7375C10.8406 14.6687 11.4594 12.9969 11.7719 11H15.4187C14.4812 13.3156 12.4937 15.0906 10.0437 15.7375Z"
                                    fill="#5F5E66"/>
                        </svg>
                    </div>
                    <?php if (function_exists('pll_the_languages')): ?>
                        <?php $lang = pll_the_languages([
                            'raw' => 1,
                            'hide_if_empty' => 1,
                            'hide_if_no_translation' => 1,
                        ]); ?>
                        <div class="language__menu">
                            <?php foreach ($lang as $item): ?>
                                <a href="<?php echo $item['url'] ?>"><?php echo $item['name'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="bottom-header__btns">
                    <a class="btn"
                       href="<?php echo carbon_get_theme_option('crb_options_menu_link_sign' . carbon_lang_prefix()) ?>"
                       target="_blank">Log in
                        <?php // pll_e('Sign In'); ?>
                    </a>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo $calendar_link ?>' });return false;"
                       class="btn-fill">
                        <?php pll_e('Request a demo'); ?>
                    </a>
                </div>
                <div class="header__burger burger-header">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/burger.svg" alt="burger"
                         class="_burger">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/close.svg" alt="close"
                         class="_close">
                </div>
            </div>
        </div>
    </div>
</header>

<main>