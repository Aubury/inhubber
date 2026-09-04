<?php
/**
 * Block template file: templates/blocks/main-page/first-section.php
 *
 * Main Page   First Section Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page---first-section-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page---first-section';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$id_home = pll_get_post(get_option('page_on_front'));
$language = function_exists('pll_current_language') ? pll_current_language() : 'en';

$banner_image = get_field( 'banner_image' );
$banner_image_loading = wp_get_attachment_image(
    $banner_image,
    'full',
    false,
    array(
        'class'         => 'banner-bg-img__image',
        'alt'           => '',
        'loading'       => 'eager',
        'fetchpriority' => 'high',
        'decoding'      => 'async',
        'aria-hidden'   => 'true',
    ));

?>

<link
        rel="preload"
        as="image"
        href="<?php echo esc_url( $banner_image['url'] ); ?>"
        fetchpriority="high"
>

<style type="text/css">
    <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
    }
</style>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="main-page-first-section-container">
            <div class="main-title-block-container">
                <div class="main-title-block-header">
                    <div class="main-title-block">
                        <?php if (get_field('over_title_text')) : ?>
                            <div class="over-title">
                            <?php the_field( 'over_title_text' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('title')) : ?>
                            <h1><?php the_field( 'title' ); ?></h1>
                        <?php endif; ?>

                    </div>

                    <?php if (get_field('under_title_text')) : ?>
                        <div class="under-title">
                            <?php the_field( 'under_title_text' ); ?>
                        </div>
                    <?php endif; ?>

                </div>

            <?php $link_button = get_field('link_button'); ?>
            <?php if ( $link_button ) : ?>
                <?php
                $url = '';
                $onclick = '';

                if ( $link_button['url'] !== '#' ) :
                    $url = $link_button['url'];
                else:
                    $onclick = "Calendly.initPopupWidget({url:'" .  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()) . "' });return false;";
                endif;
                ?>

                <a href="<?php echo esc_url( $url ); ?>"
                   onclick="<?php echo esc_attr( $onclick ); ?>"
                   class="btn-fill">
                    <?php echo esc_html( $link_button['title'] ); ?>
                </a>

            <?php endif; ?>
        </div>

            <div class="main-body-block-container">
                <?php if ( have_rows( 'raiting_&_comppliance_badges' ) ) : ?>
                    <div class="rating-compliance_badges">
                        <?php while ( have_rows( 'raiting_&_comppliance_badges' ) ) : the_row(); ?>

                            <?php if ( have_rows( 'raiting' ) ) : ?>

                                <div class="rating-row">
                                    <?php while ( have_rows( 'raiting' ) ) : the_row(); ?>
                                        <?php $image = get_sub_field( 'image' );  ?>
                                        <?php if ( $image ) :
                                            $dimensions = inhubber_get_image_dimensions( $image );
                                        ?>
                                            <img src="<?php echo esc_url( $image['url'] ); ?>"

                                                <?php if ( $dimensions['width'] && $dimensions['height'] ) : ?>
                                                    width="<?php echo esc_attr( $dimensions['width'] ); ?>"
                                                    height="<?php echo esc_attr( $dimensions['height'] ); ?>"
                                                <?php endif; ?>

                                                    class="rating-image"
                                                    alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>"
                                                    loading="eager"
                                                    decoding="async"
                                            >

                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>

                            <?php else : ?>
                                <?php // No rows found ?>
                            <?php endif; ?>

                            <?php if ( have_rows( 'comppliance_badges' ) ) : ?>

                                <div class="compliance-row">
                                    <?php while ( have_rows( 'comppliance_badges' ) ) : the_row(); ?>
                                        <div class="singe-badge">
                                            <?php $image = get_sub_field( 'image' ); ?>
                                            <?php if ( $image ) :
                                                $dimensions = inhubber_get_image_dimensions( $image );
                                            ?>
                                                <img src="<?php echo esc_url( $image['url'] ); ?>"

                                                    <?php if ( $dimensions['width'] && $dimensions['height'] ) : ?>
                                                        width="<?php echo esc_attr( $dimensions['width'] ); ?>"
                                                        height="<?php echo esc_attr( $dimensions['height'] ); ?>"
                                                    <?php endif; ?>

                                                     class="rating-image"
                                                     alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>"
                                                     loading="eager"
                                                     decoding="async"
                                                >

                                            <?php endif; ?>

                                            <?php if (get_sub_field('text')) : ?>
                                                <div class="singe-badge-text">
                                                    <?php the_sub_field( 'text' ); ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    <?php endwhile; ?>
                                </div>

                            <?php else : ?>
                                <?php // No rows found ?>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( $banner_image ) : ?>
        <?php
            $image_id = $banner_image['ID'] ?? $banner_image['id'] ?? 0;
        ?>
        <div class="banner-wrap-container">
            <div class="banner-wrap">
                <div class="banner-bg-img">
                    <?php if ( $image_id ) : ?>
                        <?php echo wp_get_attachment_image(
                            $image_id,
                            'full',
                            false,
                            array(
                                'class'         => 'banner-bg-img__image',
                                'alt'           => '',
                                'loading'       => 'eager',
                                'fetchpriority' => 'high',
                                'decoding'      => 'async',
                                'aria-hidden'   => 'true',
                            )
                        ); ?>
                    <?php else : ?>
                        <img
                                class="banner-bg-img__image"
                                src="<?php echo esc_url( $banner_image['url'] ); ?>"
                                width="<?php echo esc_attr( $banner_image['width'] ); ?>"
                                height="<?php echo esc_attr( $banner_image['height'] ); ?>"
                                alt=""
                                loading="eager"
                                fetchpriority="high"
                                decoding="async"
                                aria-hidden="true"
                        >
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( get_field( 'display_trusted_by_over_block' ) == 1 ) : ?>
        <?php if ($crb_new_trusted_gallery = carbon_get_post_meta($id_home, 'crb_new_trusted_gallery')): ?>
            <div class="main-page-trusted">
                <div class=" offer__trusted-title">
                    <?php echo carbon_get_post_meta($id_home, 'crb_new_trusted_title'); ?>
                </div>

                <div class="offer__trusted-images block-logo__slider swiper hero__swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $ids = carbon_get_post_meta($id_home, 'crb_new_trusted_gallery') ?: [];

                        $images = array_values(array_filter(array_map(function($id){
                            $id  = (int) $id;
                            $url = wp_get_attachment_url($id);
                            if (!$url) return null;

                            $dimensions = inhubber_get_image_dimensions(
                                array(
                                    'ID' => $id,
                                )
                            );

                            return [
                                'id'    => $id,
                                'url'   => $url,
                                'alt'   => get_post_meta($id, '_wp_attachment_image_alt', true),
                                'title' => get_the_title($id),
                                'width' => $dimensions['width'],
                                'height' => $dimensions['height'],
                                // метаданные с размерами (thumbnail, medium, etc.)
                                'meta'  => wp_get_attachment_metadata($id),
                            ];
                        }, $ids)));

                        foreach ($images as $img) : ?>
                            <?php
                            $mobile_image = inhubber_get_mobile_logo_data(
                                $img['id']
                            );
                            ?>

                            <div class="offer__trusted-image block-logo__slide swiper-slide">
                                <picture class="block-logo__picture">

                                    <source media="(max-width: 570px)"
                                            srcset="<?php echo esc_url($mobile_image['url']); ?>"
                                            width="<?php echo esc_attr($mobile_image['width']); ?>"
                                            height="<?php echo esc_attr($mobile_image['height']); ?>"

                                    >

                                    <img
                                            src="<?php echo esc_url($img['url']); ?>"
                                        <?php if ($img['width'] && $img['height']) : ?>
                                            width="<?php echo esc_attr($img['width']); ?>"
                                            height="<?php echo esc_attr($img['height']); ?>"
                                        <?php endif; ?>
                                            alt="<?php echo esc_attr(
                                                $img['alt'] ?: 'Logo image'
                                            ); ?>"
                                            loading="lazy"
                                            decoding="async"
                                    >

                                </picture>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <?php // echo 'false'; ?>
    <?php endif; ?>
</section>