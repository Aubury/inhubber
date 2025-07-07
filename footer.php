</main>
<footer class="footer">
    <div class="footer__top top-footer">
        <div class="container">
            <div class="top-footer__wrapper">
                <div class="top-footer__info">
                    <div class="top-footer__top">
                        <div class="top-footer__logo">
                            <?php if (carbon_get_theme_option('crb_options_foote_logo' . carbon_lang_prefix())): ?>
                                <?php echo wp_get_attachment_image(carbon_get_theme_option('crb_options_foote_logo' . carbon_lang_prefix()), 'full',); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo-footer.svg"
                                     alt="logo">
                            <?php endif; ?>
                        </div>
                        <div class="top-footer__sociale">
                            <?php if (carbon_get_theme_option('crb_options_soc_linkedin_link' . carbon_lang_prefix())): ?>
                                <a href="<?php echo carbon_get_theme_option('crb_options_soc_linkedin_link' . carbon_lang_prefix()); ?>" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M2.41608 0H13.5839C14.9183 0 16 1.08172 16 2.41608V13.5823C16 14.9167 14.9183 15.9984 13.5839 15.9984H2.41608C1.08172 15.9984 0 14.9167 0 13.5823V2.41608C0 1.08172 1.08172 0 2.41608 0Z"
                                                fill="#5F5E66"/>
                                        <path
                                                d="M5.11926 13.4276V6.15689H2.70262V13.4276H5.11926ZM3.91126 5.16361C4.75398 5.16361 5.27854 4.60529 5.27854 3.90761C5.26286 3.19417 4.75398 2.65137 3.92726 2.65137C3.10062 2.65137 2.56006 3.19417 2.56006 3.90761C2.56006 4.60537 3.08446 5.16361 3.8955 5.16361H3.91118H3.91126Z"
                                                fill="white"/>
                                        <path
                                                d="M6.45703 13.4267H8.87367V9.36639C8.87367 9.14911 8.88935 8.93199 8.95319 8.77663C9.12791 8.34247 9.52551 7.89287 10.1931 7.89287C11.0676 7.89287 11.4174 8.55959 11.4174 9.53695V13.4267H13.8339V9.25775C13.8339 7.02447 12.6417 5.98535 11.0517 5.98535C9.74799 5.98535 9.17559 6.71399 8.85759 7.21039H8.87375V6.15591H6.45711C6.48879 6.83815 6.45711 13.4266 6.45711 13.4266L6.45703 13.4267Z"
                                                fill="white"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (carbon_get_theme_option('crb_options_soc_facebook_link' . carbon_lang_prefix())): ?>
                                <a href="<?php echo carbon_get_theme_option('crb_options_soc_facebook_link' . carbon_lang_prefix()); ?>" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M16 8.04873C16 3.60307 12.4187 0 8 0C3.58125 0 0 3.60307 0 8.04873C0 12.0668 2.925 15.3963 6.75 16V10.3753H4.71875V8.04873H6.75V6.2755C6.75 4.2586 7.94375 3.14404 9.77188 3.14404C10.6469 3.14404 11.5625 3.30124 11.5625 3.30124V5.28198H10.5531C9.55938 5.28198 9.25 5.90293 9.25 6.5396V8.04873H11.4688L11.1141 10.3753H9.25V16C13.075 15.3963 16 12.0668 16 8.04873Z"
                                                fill="#5F5E66"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (carbon_get_theme_option('crb_options_soc_twitter_link' . carbon_lang_prefix())): ?>
                                <a href="<?php echo carbon_get_theme_option('crb_options_soc_twitter_link' . carbon_lang_prefix()); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16"
                                         viewBox="0 0 50 50">
                                        <path d="M 6.9199219 6 L 21.136719 26.726562 L 6.2285156 44 L 9.40625 44 L 22.544922 28.777344 L 32.986328 44 L 43 44 L 28.123047 22.3125 L 42.203125 6 L 39.027344 6 L 26.716797 20.261719 L 16.933594 6 L 6.9199219 6 z" fill="#5F5E66"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (carbon_get_theme_option('crb_options_soc_youtube_link' . carbon_lang_prefix())): ?>
                                <a href="<?php echo carbon_get_theme_option('crb_options_soc_youtube_link' . carbon_lang_prefix()); ?>" target="_blank">
                                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M15.6636 2.12692C15.4818 1.43601 14.9364 0.890554 14.2455 0.699645C13 0.363281 8 0.363281 8 0.363281C8 0.363281 3 0.363281 1.74545 0.699645C1.05455 0.881463 0.518182 1.42692 0.327273 2.12692C4.33488e-08 3.38146 0 5.99964 0 5.99964C0 5.99964 -2.16744e-08 8.61783 0.336364 9.87237C0.518182 10.5633 1.06364 11.1087 1.75455 11.2996C3 11.636 8 11.636 8 11.636C8 11.636 13 11.636 14.2545 11.2996C14.9455 11.1178 15.4818 10.5724 15.6727 9.87237C16 8.61783 16 5.99964 16 5.99964C16 5.99964 16 3.38146 15.6636 2.12692Z"
                                                fill="#5F5E66"/>
                                        <path d="M6.36377 8.3818L10.5456 5.99998L6.36377 3.61816V8.3818Z" fill="white"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (carbon_get_theme_option('crb_options_soc_instagram_link' . carbon_lang_prefix())): ?>
                                <a href="<?php echo carbon_get_theme_option('crb_options_soc_instagram_link' . carbon_lang_prefix()); ?>" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M4.75293 0.175781C5.59355 0.138281 5.8623 0.128906 7.9998 0.128906C10.1373 0.128906 10.4061 0.138281 11.2498 0.172656C12.0904 0.210156 12.6623 0.344531 13.1623 0.538281C13.6779 0.741406 14.1186 1.01016 14.5561 1.44766C14.9936 1.88516 15.2654 2.32266 15.4654 2.84141C15.6592 3.34453 15.7936 3.91641 15.8311 4.75391C15.8686 5.59453 15.8779 5.86016 15.8779 8.00078C15.8779 10.1414 15.8686 10.407 15.8311 11.2477C15.7936 12.0883 15.6592 12.6602 15.4654 13.1602C15.2623 13.6758 14.9936 14.1164 14.5561 14.5539C14.1186 14.9914 13.6811 15.2633 13.1623 15.4633C12.6592 15.657 12.0873 15.7914 11.2498 15.8289C10.4092 15.8664 10.1436 15.8758 8.00293 15.8758C5.8623 15.8758 5.59668 15.8664 4.75605 15.8289C3.91543 15.7914 3.34355 15.657 2.84355 15.4633C2.32793 15.2602 1.8873 14.9914 1.4498 14.5539C1.0123 14.1164 0.74043 13.6789 0.54043 13.1602C0.34668 12.657 0.212305 12.0852 0.174805 11.2477C0.137305 10.407 0.12793 10.1383 0.12793 8.00078C0.12793 5.86328 0.137305 5.59453 0.174805 4.75703C0.212305 3.91641 0.34668 3.34453 0.54043 2.84453C0.743555 2.32891 1.0123 1.88828 1.4498 1.45078C1.8873 1.01328 2.3248 0.741406 2.84355 0.541406C3.34355 0.347656 3.91543 0.213281 4.75293 0.175781Z"
                                                fill="#5F5E66"/>
                                        <path
                                                d="M7.9998 3.95703C5.76855 3.95703 3.95605 5.76641 3.95605 8.00078C3.95605 10.2352 5.76855 12.0445 7.9998 12.0445C10.2311 12.0445 12.0436 10.232 12.0436 8.00078C12.0436 5.76953 10.2311 3.95703 7.9998 3.95703ZM7.9998 10.6258C6.5498 10.6258 5.3748 9.45078 5.3748 8.00078C5.3748 6.55078 6.5498 5.37578 7.9998 5.37578C9.4498 5.37578 10.6248 6.55078 10.6248 8.00078C10.6248 9.45078 9.4498 10.6258 7.9998 10.6258Z"
                                                fill="white"/>
                                        <path
                                                d="M12.203 4.74199C12.7242 4.74199 13.1468 4.31946 13.1468 3.79824C13.1468 3.27702 12.7242 2.85449 12.203 2.85449C11.6818 2.85449 11.2593 3.27702 11.2593 3.79824C11.2593 4.31946 11.6818 4.74199 12.203 4.74199Z"
                                                fill="white"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="top-footer__made">
                        <div class="top-footer__made-item">
                            <div class="top-footer__made-flag">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/top-footer__made-flag-1.svg"
                                     alt="footer__made-flag">
                            </div>
                            <div class="top-footer__made-text">
                                <?php pll_e('Made in Germany'); ?>
                            </div>
                        </div>
                        <div class="top-footer__made-item">
                            <div class="top-footer__made-flag">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/top-footer__made-flag-2.svg"
                                     alt="footer__made">
                            </div>
                            <div class="top-footer__made-text">
                                <?php pll_e('GDPR compliance'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="top-footer__nav">
                    <?php if (has_nav_menu('product-menu')): ?>
                        <div class="top-footer__nav-item">
                            <div class="top-footer__nav-title">
                                <?php pll_e('Product'); ?>
                            </div>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'product-menu',
                                'container' => false,
                                'menu_class' => '',
                                'depth' => 1,
                            )); ?>
                        </div>
                    <?php endif; ?>
<!--                    --><?php //if (has_nav_menu('solutions-menu')): ?>
<!--                        <div class="top-footer__nav-item">-->
<!--                            <div class="top-footer__nav-title">-->
<!--                                --><?php //pll_e('Solutions'); ?>
<!--                            </div>-->
<!--                            --><?php //wp_nav_menu(array(
//                                'theme_location' => 'solutions-menu',
//                                'container' => false,
//                                'menu_class' => '',
//                                'depth' => 1,
//                            )); ?>
<!--                        </div>-->
<!--                    --><?php //endif; ?>
                    <?php if (has_nav_menu('industries-menu')): ?>
                        <div class="top-footer__nav-item">
                            <div class="top-footer__nav-title">
                                <?php pll_e('Industries'); ?>
                            </div>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'industries-menu',
                                'container' => false,
                                'menu_class' => '',
                                'depth' => 1,
                            )); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (has_nav_menu('teams-menu')): ?>
                        <div class="top-footer__nav-item">
                            <div class="top-footer__nav-title">
                                <?php pll_e('Teams'); ?>
                            </div>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'teams-menu',
                                'container' => false,
                                'menu_class' => '',
                                'depth' => 1,
                            )); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (has_nav_menu('resources-menu')): ?>
                        <div class="top-footer__nav-item">
                            <div class="top-footer__nav-title">
                                <?php pll_e('Resources'); ?>
                            </div>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'resources-menu',
                                'container' => false,
                                'menu_class' => '',
                                'depth' => 1,
                            )); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (has_nav_menu('compare-menu')): ?>
                        <div class="top-footer__nav-item">
                            <div class="top-footer__nav-title">
                                <?php pll_e('Compare'); ?>
                            </div>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'compare-menu',
                                'container' => false,
                                'menu_class' => '',
                                'depth' => 1,
                            )); ?>
                        </div>
                    <?php endif; ?>
<!--                    --><?php //if (has_nav_menu('company-menu')): ?>
<!--                        <div class="top-footer__nav-item">-->
<!--                            <div class="top-footer__nav-title">-->
<!--                                --><?php //pll_e('Company'); ?>
<!--                            </div>-->
<!--                            --><?php //wp_nav_menu(array(
//                                'theme_location' => 'company-menu',
//                                'container' => false,
//                                'menu_class' => '',
//                                'depth' => 1,
//                            )); ?>
<!--                        </div>-->
<!--                    --><?php //endif; ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="footer__bottom bottom-footer">
        <div class="container">
            <div class="bottom-footer__wrapper desktop-display">

                    <div class="bottom-footer__copyright">
                        <?php pll_e('Copyright'); ?> © <?php echo date('Y'); ?>
                        - <?php pll_e('Inhubber (key2contract GmbH)'); ?>
                    </div>
                    <nav class="bottom-footer__nav">
                        <ul>
                            <li>
                                <a href="<?php echo carbon_get_theme_option('crb_options_footer_link_impressum' . carbon_lang_prefix()); ?>"><?php pll_e('Impressum'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo carbon_get_theme_option('crb_options_footer_link_privacy' . carbon_lang_prefix()); ?>"><?php pll_e('Privacy Policy'); ?></a>
                            </li>
                        </ul>
                    </nav>

                    <?php if (function_exists('pll_the_languages')): ?>
                        <?php $translations = pll_the_languages(['raw' => 1]); ?>
                        <?php if ($translations): ?>
                            <div class="bottom-footer__language">
                                <div class="bottom-footer__language-header">
                                    <?php foreach ($translations as $lang): ?>
                                        <?php if ($lang['current_lang']): ?>
                                            <div class="bottom-footer__language-text">
                                                <?php echo $lang['name'] ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="bottom-footer__language-icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-menu.svg"
                                             alt="arrow-menu">
                                    </div>
                                </div>
                                <div class="bottom-footer__language-body">
                                    <?php foreach ($translations as $lang): ?>
                                        <?php if ($lang['no_translation'] == false): ?>
                                            <div class="bottom-footer__language-item <?php if ($lang['current_lang']): ?>_active <?php endif; ?>">
                                                <a href="<?php echo $lang['url'] ?>"><?php echo $lang['name'] ?></a>

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php
                    $crb_options_company_phone = carbon_get_theme_option('crb_options_company_phone' . carbon_lang_prefix());
                    $crb_options_whatsapp_number = carbon_get_theme_option('crb_options_whatsapp_number' . carbon_lang_prefix());
                    ?>

                    <div class="bottom-footer_phones">
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
            </div>

            <div class="bottom-footer__wrapper_table table-display">
                    <div class="flex-row">
                        <div class="bottom-footer__copyright">
                            <?php pll_e('Copyright'); ?> © <?php echo date('Y'); ?>
                            - <?php pll_e('Inhubber (key2contract GmbH)'); ?>
                        </div>
                        <nav class="bottom-footer__nav">
                            <ul>
                                <li>
                                    <a href="<?php echo carbon_get_theme_option('crb_options_footer_link_impressum' . carbon_lang_prefix()); ?>"><?php pll_e('Impressum'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo carbon_get_theme_option('crb_options_footer_link_privacy' . carbon_lang_prefix()); ?>"><?php pll_e('Privacy Policy'); ?></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="flex-row">
                        <?php if (function_exists('pll_the_languages')): ?>
                            <?php $translations = pll_the_languages(['raw' => 1]); ?>
                            <?php if ($translations): ?>
                                <div class="bottom-footer__language">
                                    <div class="bottom-footer__language-header">
                                        <?php foreach ($translations as $lang): ?>
                                            <?php if ($lang['current_lang']): ?>
                                                <div class="bottom-footer__language-text">
                                                    <?php echo $lang['name'] ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <div class="bottom-footer__language-icon">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/arrow-menu.svg"
                                                 alt="arrow-menu">
                                        </div>
                                    </div>
                                    <div class="bottom-footer__language-body">
                                        <?php foreach ($translations as $lang): ?>
                                            <?php if ($lang['no_translation'] == false): ?>
                                                <div class="bottom-footer__language-item <?php if ($lang['current_lang']): ?>_active <?php endif; ?>">
                                                    <a href="<?php echo $lang['url'] ?>"><?php echo $lang['name'] ?></a>

                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="vr"></div>

                        <?php
                        $crb_options_company_phone = carbon_get_theme_option('crb_options_company_phone' . carbon_lang_prefix());
                        $crb_options_whatsapp_number = carbon_get_theme_option('crb_options_whatsapp_number' . carbon_lang_prefix());
                        ?>

                        <div class="bottom-footer_phones">
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
                    </div>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>