<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="76x76"
          href="<?php echo get_template_directory_uri() ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-16x16.png">
    <!-- <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/img/site.webmanifest"> -->
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/assets/img/safari-pinned-tab.svg"
          color="#5bbad5">
    
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php if (!defined('CUSTOM_LAZY_LOAD_ENABLED') || !CUSTOM_LAZY_LOAD_ENABLED): ?>
        
    <?php endif; ?>

    <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;j.src="https://s.inhubber.com/92nvkxitxrmpr.js?"+i;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','ay4p=aWQ9R1RNLTVRVFJIUFBT&sort=asc');
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (defined('CUSTOM_LAZY_LOAD_ENABLED') && CUSTOM_LAZY_LOAD_ENABLED): ?>
    <!-- Preconnect to Usercentrics for faster loading -->
    <!-- <link rel="preconnect" href="https://web.cmp.usercentrics.eu" crossorigin> -->

    <script>
        // Initialize Google Consent Mode with denied by default
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('consent', 'default', {
            ad_storage: 'denied',
            analytics_storage: 'denied',
            ad_user_data: 'denied',
            ad_personalization: 'denied',
            wait_for_update: 500
        });
    </script>

    <!-- Official Usercentrics CMP Script -->
    <!-- <script
        id="usercentrics-cmp"
        data-settings-id="-UUHgIebdqCyo7"
        src="https://web.cmp.usercentrics.eu/ui/loader.js"
        async>
    </script> -->

    <script>
        // Utility: call a function only once
        function once(fn) {
            let done = false;
            return () => { if (!done) { done = true; fn(); } }
        }

        // Loads the Stape Tag Manager *only once* after consent
        const loadStape = once(function () {
            const s = document.createElement('script');
            s.async = true;
            s.id = 'stape-script';
            // Inline loading of Stape GTM loader to bypass any script blocks until consent
            s.textContent = "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;j.src='https://s.inhubber.com/92nvkxitxrmpr.js?'+i;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','ay4p=aWQ9R1RNLTVRVFJIUFBT&sort=asc');";
            document.head.appendChild(s);
        });

        // Listen for Usercentrics consent updates (v3 Window Event)
        window.addEventListener('ucEvent', function (e) {
            // Trigger only on consent_status event from Usercentrics
            if (e.detail && e.detail.event === 'consent_status') {
                // A) Accept if any required categories are allowed
                const allowedByCategory =
                    (e.detail.categories?.marketing === true) ||
                    (e.detail.categories?.analytics === true);

                // B) Or by specific service names (as configured in Usercentrics)
                const allowedByService =
                    (e.detail['Google Analytics'] === true) ||
                    (e.detail['Meta Pixel'] === true) ||
                    (e.detail['Hotjar'] === true);

                if (allowedByCategory || allowedByService) {
                    // Optionally update Google Consent Mode
                    window.dataLayer = window.dataLayer || [];
                    function gtag() { dataLayer.push(arguments); }
                    gtag('consent', 'update', {
                        ad_storage: 'granted',
                        analytics_storage: 'granted'
                    });
                    console.log('loadStape: consent granted, loading scripts.');
                    // Eagerly load scripts that depend on marketing/analytics consent
                    if (typeof injectLazyScripts === 'function') {
                        injectLazyScripts();
                    }
                    if (typeof loadStape === 'function') {
                        loadStape();
                    }
                }
            }
        });
    </script>
<?php else: ?>
    <?php endif; ?>
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
                        <?php $calendar_link = carbon_get_theme_option('crb_options_header_video_register' . carbon_lang_prefix()); ?>

                        <div class="top-header__text desktop-display">
                            <a href=""
                               onclick="Calendly.initPopupWidget({url: '<?php echo $calendar_link ?>' });return false;">
                                <?php pll_e('Register'); ?> →
                            </a>
                        </div>
                    </div>

                    <?php

                    $crb_options_company_phone = carbon_get_theme_option('crb_options_company_phone' . carbon_lang_prefix());
                    $crb_options_whatsapp_number = carbon_get_theme_option('crb_options_whatsapp_number' . carbon_lang_prefix());
                    ?>

                    <div class="top-header__right">
                        <a class="table-display" href=""
                           onclick="Calendly.initPopupWidget({url: '<?php echo $calendar_link ?>' });return false;">
                            <?php pll_e('Register'); ?> →
                        </a>
                        <a class="desktop-display" href="tel:<?php echo str_replace(' ', '', $crb_options_company_phone); ?>">
                            <?php echo $crb_options_company_phone; ?>
                        </a>
                        <a class="desktop-display" href="https://wa.me/<?php echo preg_replace('/\D+/', '', $crb_options_whatsapp_number);?>" target="_blank">
                            WhatsApp
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99707 1C9.85012 1.00005 11.594 1.72173 12.9033 3.03418C14.2126 4.34663 14.9999 6.08738 15 7.94043C15 11.7654 11.8189 14.8778 7.99707 14.8779H7.99414C6.83164 14.8779 5.69023 14.5873 4.67773 14.0342L1 15L1.98438 11.4062C1.37813 10.3531 1.05957 9.15938 1.05957 7.9375C1.05957 4.1125 4.17207 1 7.99707 1ZM5.53711 4.7373C5.42148 4.7374 5.23437 4.78153 5.0752 4.95312L5.04004 4.99121C4.85871 5.1855 4.46875 5.60362 4.46875 6.40039C4.46893 7.23123 5.0584 8.03556 5.16699 8.18359L5.1748 8.19336C5.17932 8.19933 5.18724 8.2103 5.19727 8.22461L5.20801 8.24023C5.42216 8.54641 6.51733 10.1114 8.1377 10.8125C9.23756 11.2874 9.66879 11.3283 10.2188 11.2471C10.5531 11.1971 11.2439 10.8281 11.3877 10.4219C11.5314 10.0157 11.5311 9.66855 11.4873 9.59668C11.4532 9.53148 11.367 9.48975 11.2393 9.42871C11.2174 9.41826 11.1942 9.40734 11.1699 9.39551L11.1592 9.39062C10.9869 9.30295 10.1339 8.88436 9.97461 8.82812C9.81541 8.76884 9.69953 8.74114 9.58398 8.91602C9.46809 9.09122 9.13723 9.47801 9.03418 9.59668C8.93418 9.71231 8.83105 9.72812 8.65918 9.64062C7.64052 9.13129 6.97164 8.73119 6.2998 7.57812C6.20103 7.40825 6.26672 7.33909 6.40137 7.19824C6.50937 7.08527 6.66225 6.9255 6.80957 6.63086C6.86555 6.51544 6.83762 6.41551 6.79395 6.32812C6.76313 6.26649 6.58144 5.82511 6.42676 5.44824C6.36199 5.29045 6.30222 5.14346 6.25977 5.04102C6.16722 4.81891 6.07293 4.76289 5.98926 4.74902L5.90918 4.74414C5.89541 4.74416 5.8819 4.74487 5.86914 4.74414C5.76914 4.73789 5.65273 4.7373 5.53711 4.7373Z" fill="white"/>
                                </svg>
                            </span>
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

                <div class="bottom-header__btns table-xl-display-none">
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
                    <a id="sing-in-btn" class="btn"
                       href="<?php echo carbon_get_theme_option('crb_options_menu_link_sign' . carbon_lang_prefix()) ?>"
                       target="_blank">
                        <?php  pll_e('Sign In'); ?>
                    </a>
                </div>


                <div id="bottom-header__btn" class="bottom-header__btns table-xl-display-none">
                    <?php if (!empty(carbon_get_theme_option('crb_options_header_button_link' . carbon_lang_prefix()))) : ?>
                        <a class="btn button_header_border"
                           href="<?php echo carbon_get_theme_option('crb_options_header_button_link' . carbon_lang_prefix()) ?>"
                           target="_blank">
                            <?php echo carbon_get_theme_option('crb_options_header_button_text' . carbon_lang_prefix()) ?>
                        </a>
                    <?php endif; ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo $calendar_link ?>' });return false;"
                       class="btn-fill">
                        <?php pll_e('Request a demo'); ?>
                    </a>
                </div>

                <div class="bottom-header_phones">
                    <a href="tel:<?php echo str_replace(' ', '', $crb_options_company_phone); ?>">
                        <?php echo $crb_options_company_phone; ?>
                    </a>
                    <a href="https://wa.me/<?php echo preg_replace('/\D+/', '', $crb_options_whatsapp_number);?>" target="_blank">
                        WhatsApp
                        <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99707 1C9.85012 1.00005 11.594 1.72173 12.9033 3.03418C14.2126 4.34663 14.9999 6.08738 15 7.94043C15 11.7654 11.8189 14.8778 7.99707 14.8779H7.99414C6.83164 14.8779 5.69023 14.5873 4.67773 14.0342L1 15L1.98438 11.4062C1.37813 10.3531 1.05957 9.15938 1.05957 7.9375C1.05957 4.1125 4.17207 1 7.99707 1ZM5.53711 4.7373C5.42148 4.7374 5.23437 4.78153 5.0752 4.95312L5.04004 4.99121C4.85871 5.1855 4.46875 5.60362 4.46875 6.40039C4.46893 7.23123 5.0584 8.03556 5.16699 8.18359L5.1748 8.19336C5.17932 8.19933 5.18724 8.2103 5.19727 8.22461L5.20801 8.24023C5.42216 8.54641 6.51733 10.1114 8.1377 10.8125C9.23756 11.2874 9.66879 11.3283 10.2188 11.2471C10.5531 11.1971 11.2439 10.8281 11.3877 10.4219C11.5314 10.0157 11.5311 9.66855 11.4873 9.59668C11.4532 9.53148 11.367 9.48975 11.2393 9.42871C11.2174 9.41826 11.1942 9.40734 11.1699 9.39551L11.1592 9.39062C10.9869 9.30295 10.1339 8.88436 9.97461 8.82812C9.81541 8.76884 9.69953 8.74114 9.58398 8.91602C9.46809 9.09122 9.13723 9.47801 9.03418 9.59668C8.93418 9.71231 8.83105 9.72812 8.65918 9.64062C7.64052 9.13129 6.97164 8.73119 6.2998 7.57812C6.20103 7.40825 6.26672 7.33909 6.40137 7.19824C6.50937 7.08527 6.66225 6.9255 6.80957 6.63086C6.86555 6.51544 6.83762 6.41551 6.79395 6.32812C6.76313 6.26649 6.58144 5.82511 6.42676 5.44824C6.36199 5.29045 6.30222 5.14346 6.25977 5.04102C6.16722 4.81891 6.07293 4.76289 5.98926 4.74902L5.90918 4.74414C5.89541 4.74416 5.8819 4.74487 5.86914 4.74414C5.76914 4.73789 5.65273 4.7373 5.53711 4.7373Z" fill="#1B1B1F"/>
                                </svg>
                            </span>
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