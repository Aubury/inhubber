<?php
/**
 * Block template file: templates/blocks/main/first_block_with_social_link.php
 *
 * First Block With Social Link Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'first-block-with-social-link-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-first-block-with-social-link';
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

<section id="<?php echo esc_attr( $id ); ?>" class="page_first_block overwiew-offer white_bg <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="header_block offer__header">
                <div class="top_header_block">
                    <?php if (get_field('page_title')) : ?>
                        <h4 class="section-header__overtitle wow animate__animated animate__fadeInUp"><?php the_field( 'page_title' ); ?></h4>
                    <?php endif; ?>

                    <?php if (get_field('title')) : ?>
                        <h1><?php the_field('title'); ?></h1>
                    <?php endif; ?>
                </div>

                <?php if ( get_field( 'social_links' ) == 1 ) : ?>
                    <div class="social_block">
                         <div>
                             <?php echo pll_e('Share')?>:
                         </div>

                        <?php if (carbon_get_theme_option('crb_options_soc_linkedin_link' . carbon_lang_prefix())): ?>
                            <a href="<?php echo carbon_get_theme_option('crb_options_soc_linkedin_link' . carbon_lang_prefix()); ?>" target="_blank">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.41608 0H13.5839C14.9183 0 16 1.08172 16 2.41608V13.5823C16 14.9167 14.9183 15.9984 13.5839 15.9984H2.41608C1.08172 15.9984 0 14.9167 0 13.5823V2.41608C0 1.08172 1.08172 0 2.41608 0Z"
                                            fill="#5F5E66"/>
                                    <path d="M5.11926 13.4276V6.15689H2.70262V13.4276H5.11926ZM3.91126 5.16361C4.75398 5.16361 5.27854 4.60529 5.27854 3.90761C5.26286 3.19417 4.75398 2.65137 3.92726 2.65137C3.10062 2.65137 2.56006 3.19417 2.56006 3.90761C2.56006 4.60537 3.08446 5.16361 3.8955 5.16361H3.91118H3.91126Z"
                                            fill="white"/>
                                    <path d="M6.45703 13.4267H8.87367V9.36639C8.87367 9.14911 8.88935 8.93199 8.95319 8.77663C9.12791 8.34247 9.52551 7.89287 10.1931 7.89287C11.0676 7.89287 11.4174 8.55959 11.4174 9.53695V13.4267H13.8339V9.25775C13.8339 7.02447 12.6417 5.98535 11.0517 5.98535C9.74799 5.98535 9.17559 6.71399 8.85759 7.21039H8.87375V6.15591H6.45711C6.48879 6.83815 6.45711 13.4266 6.45711 13.4266L6.45703 13.4267Z"
                                            fill="white"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if (carbon_get_theme_option('crb_options_soc_facebook_link' . carbon_lang_prefix())): ?>
                            <a href="<?php echo carbon_get_theme_option('crb_options_soc_facebook_link' . carbon_lang_prefix()); ?>" target="_blank">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 8.04873C16 3.60307 12.4187 0 8 0C3.58125 0 0 3.60307 0 8.04873C0 12.0668 2.925 15.3963 6.75 16V10.3753H4.71875V8.04873H6.75V6.2755C6.75 4.2586 7.94375 3.14404 9.77188 3.14404C10.6469 3.14404 11.5625 3.30124 11.5625 3.30124V5.28198H10.5531C9.55938 5.28198 9.25 5.90293 9.25 6.5396V8.04873H11.4688L11.1141 10.3753H9.25V16C13.075 15.3963 16 12.0668 16 8.04873Z"
                                            fill="#5F5E66"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if (carbon_get_theme_option('crb_options_soc_twitter_link' . carbon_lang_prefix())): ?>
                            <a href="<?php echo carbon_get_theme_option('crb_options_soc_twitter_link' . carbon_lang_prefix()); ?>" target="_blank">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.89251 13.6918C11.179 13.6918 14.0696 9.3112 14.0696 5.5147C14.0696 5.38954 14.0696 5.26438 14.0636 5.14518C14.6239 4.7399 15.1126 4.2333 15.5 3.65518C14.9874 3.88166 14.4332 4.03662 13.8491 4.10814C14.4451 3.75054 14.898 3.1903 15.1126 2.51683C14.5583 2.84463 13.9444 3.08302 13.2888 3.21414C12.7644 2.65391 12.0194 2.30823 11.1909 2.30823C9.60558 2.30823 8.31822 3.59558 8.31822 5.18094C8.31822 5.40742 8.34206 5.62793 8.3957 5.83653C6.00575 5.71733 3.88995 4.57302 2.47148 2.83271C2.22712 3.25586 2.08408 3.75054 2.08408 4.27502C2.08408 5.27034 2.59068 6.15241 3.36547 6.66497C2.89464 6.65305 2.4536 6.52193 2.0662 6.30737V6.34313C2.0662 7.73777 3.05556 8.894 4.37271 9.1622C4.13431 9.22776 3.87803 9.26352 3.61579 9.26352C3.43103 9.26352 3.25224 9.24564 3.07344 9.20988C3.43699 10.3542 4.49787 11.1826 5.75543 11.2065C4.77203 11.9753 3.53235 12.4342 2.1854 12.4342C1.95296 12.4342 1.72648 12.4223 1.5 12.3925C2.75756 13.215 4.27139 13.6918 5.89251 13.6918Z" fill="#5F5E66"/>
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
                <?php else : ?>
                    <?php // echo 'false'; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php if ( have_rows( 'information_block' ) ) : ?>
    <section class="second-first-block">
        <div class="container">
        <?php while ( have_rows( 'information_block' ) ) : the_row(); ?>
            <div class="flex-row">
                <div class="dictionary-single-content__wrapper main-content">
                    <div class="info-block">
                        <h4><?php the_sub_field( 'title' ); ?></h4>
                        <p><?php the_sub_field( 'text' ); ?></p>
                    </div>

                    <div class="table-display speakers_block">
                        <?php if ( have_rows( 'speakers' ) ) : ?>
                            <div class="menu-title">
                                <?php echo pll_e('Speakers')?>
                            </div>

                            <div class="list-speakers">
                                <?php while ( have_rows( 'speakers' ) ) : the_row(); ?>

                                    <?php if ( have_rows( 'speaker' ) ) : ?>

                                        <?php while ( have_rows( 'speaker' ) ) : the_row(); ?>
                                            <div class="single_speaker">
                                                <?php $image = get_sub_field( 'image' ); ?>
                                                <?php if ( $image ) : ?>
                                                    <div class="icon-frame">
                                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'name_of_speaker' ); ?>" width="40" height="40"/>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="single_speaker_info">
                                                    <div class="mane_title">
                                                        <?php the_sub_field( 'name_of_speaker' ); ?>
                                                    </div>
                                                    <div class="info_text">
                                                        <?php the_sub_field( 'positions' ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>

                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="menu-content desktop-display">
                    <?php if ( have_rows( 'details' ) ) : ?>
                        <div class="menu-title">
                            <?php echo pll_e('Details')?>
                        </div>
                        <?php while ( have_rows( 'details' ) ) : the_row(); ?>
                            <div class="menu-plan-details">
                                <span>
                                    <svg width="14.000000" height="16.000000" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path id="Vector" d="M5 1L5 2L9 2L9 1C9 0.44 9.44 0 10 0C10.55 0 11 0.44 11 1L11 2L12.5 2C13.32 2 14 2.67 14 3.5L14 5L0 5L0 3.5C0 2.67 0.67 2 1.5 2L3 2L3 1C3 0.44 3.44 0 4 0C4.55 0 5 0.44 5 1ZM0 6L14 6L14 14.5C14 15.32 13.32 16 12.5 16L1.5 16C0.67 16 0 15.32 0 14.5L0 6ZM2.5 8C2.22 8 2 8.22 2 8.5L2 11.5C2 11.77 2.22 12 2.5 12L5.5 12C5.77 12 6 11.77 6 11.5L6 8.5C6 8.22 5.77 8 5.5 8L2.5 8Z" fill="#5F5E66" fill-opacity="1.000000" fill-rule="nonzero"/>
                                    </svg>
                                </span>
                                <?php the_sub_field( 'date' ); ?></div>
                            <div class="menu-plan-details">
                                <span>
                                    <svg width="13.333008" height="13.333313" viewBox="0 0 13.333 13.3333" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path id="Vector" d="M6.66 13.33C2.98 13.33 0 10.34 0 6.66C0 2.98 2.98 0 6.66 0C10.34 0 13.33 2.98 13.33 6.66C13.33 10.34 10.34 13.33 6.66 13.33ZM6.04 6.66C6.04 6.87 6.14 7.07 6.32 7.16L8.82 8.83C9.1 9.04 9.49 8.96 9.66 8.67C9.87 8.39 9.79 8 9.51 7.81L7.29 6.33L7.29 3.12C7.29 2.77 7.01 2.5 6.64 2.5C6.32 2.5 6.01 2.77 6.01 3.12L6.04 6.66Z" fill="#5F5E66" fill-opacity="1.000000" fill-rule="nonzero"/>
                                    </svg>
                                </span>
                                <?php the_sub_field( 'time' ); ?>
                            </div>
                            <div class="menu-plan-details">
                                <span>
                                    <svg width="12.000000" height="15.958618" viewBox="0 0 12 15.9586" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path id="Vector" d="M5.25 15.6C3.62 13.59 0 8.73 0 6C0 2.68 2.68 0 6 0C9.31 0 12 2.68 12 6C12 8.73 8.34 13.59 6.74 15.6C6.35 16.07 5.64 16.07 5.25 15.6ZM6 8C7.1 8 8 7.1 8 6C8 4.89 7.1 4 6 4C4.89 4 4 4.89 4 6C4 7.1 4.89 8 6 8Z" fill="#5F5E66" fill-opacity="1.000000" fill-rule="nonzero"/>
                                    </svg>
                                 </span>
                                <?php the_sub_field( 'online' ); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php $register_button = get_sub_field( 'register_button' ); ?>
                    <?php if ( $register_button ) : ?>
                        <a class="btn-fill" href="<?php echo esc_url( $register_button['url'] ); ?>" >
                            <?php echo esc_html( $register_button['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>