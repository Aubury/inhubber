<?php if (carbon_get_theme_option('crb_options_footer_info_block' . carbon_lang_prefix())): ?>
    <section class="contracts">
        <div class="container">
            <div class="contracts__wrapper">
                <div class="contracts__info wow animate__animated animate__fadeInUp">
                    <h2><?php echo carbon_get_theme_option('crb_options_footer_info_block' . carbon_lang_prefix()) ?></h2>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="contracts__btn btn-fill">
                        <?php pll_e('Request a demo'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>