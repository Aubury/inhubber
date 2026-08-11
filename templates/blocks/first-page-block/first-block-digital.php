<?php
/**
 * Block template file: templates/blocks/first-page-block/first-block-digital.php
 *
 * Customer Page First Block Digital Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customer-page-first-block-digital-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customer-page-first-block-digital';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$id_home = pll_get_post(get_option('page_on_front'));
get_field( 'display_raiting_&_comppliance_badges' ) == 1
    ? $rating_class = 'rating-wrapper'
    : $rating_class = '';
?>

<style type="text/css">
    <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
    }
</style>

<section id="<?php echo esc_attr($id); ?>" class="offer overwiew-offer <?php echo esc_attr($classes); ?> <?php echo $rating_class ?>">
    <div class="container">
        <div class="offer__wrapper">
            <div class="offer__header">
                <?php if (get_field('over_title')) : ?>
                    <div class="offer_over_title">
                        <?php the_field( 'over_title' ); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h1><?php the_field('title'); ?></h1>
                <?php endif; ?>

                <?php if (get_field('text')) : ?>
                    <div class="offer__text">
                        <?php the_field('text'); ?>
                    </div>
                <?php endif; ?>

                <?php $link = get_field('link'); ?>
                <?php if ($link['title']) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( get_field( 'display_raiting_&_comppliance_badges' ) == 1 ) : ?>
        <div class="container">
            <div class="rating-compliance_badges">
                <?php if ($crb_raiting_gallery = carbon_get_post_meta($id_home, 'crb_raiting_gallery')): ?>

                    <?php
                    $ids = carbon_get_post_meta($id_home, 'crb_raiting_gallery') ?: [];

                    $images = array_values(array_filter(array_map(function($id){
                        $id  = (int) $id;
                        $url = wp_get_attachment_url($id);
                        if (!$url) return null;

                        return [
                            'id'    => $id,
                            'url'   => $url,
                            'alt'   => get_post_meta($id, '_wp_attachment_image_alt', true),
                            'title' => get_the_title($id),
                            // метаданные с размерами (thumbnail, medium, etc.)
                            'meta'  => wp_get_attachment_metadata($id),
                        ];
                    }, $ids)));

                    ?>
                    <div class="rating-row">
                        <?php
                        foreach ($images as $img) : ?>

                            <?php
                            echo '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($img['alt']) . '">';
                            ?>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($crb_comppliance_badges = carbon_get_post_meta($id_home, 'crb_comppliance_badges')): ?>
                    <div class="compliance-row">
                        <?php foreach ($crb_comppliance_badges as $badge) : ?>
                            <?php if ($badge) : ?>
                                <?php $badge['crb_comppliance_text'] ? $compliance_class = '' : $compliance_class = 'compliance_none_text' ?>
                                <div class="singe-badge <?php echo $compliance_class ?>">
                                    <?php if ($badge['crb_comppliance_imags']) :
                                        $id  = (int) $badge['crb_comppliance_imags'];
                                        $url = wp_get_attachment_url($id);
                                        if (!$url) return null;
                                        ?>

                                        <img src="<?php echo esc_url( $url ); ?>"
                                             alt="<?php echo 'Badge'; ?>" />

                                    <?php endif; ?>

                                    <?php if ($badge['crb_comppliance_text']) : ?>
                                        <div class="singe-badge-text">
                                            <?php echo $badge['crb_comppliance_text']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php else : ?>
        <?php // echo 'false'; ?>
    <?php endif; ?>

    <div class="container">
        <div class="offer__wrapper">
            <?php $image = get_field( 'image' ); ?>
            <?php if ( $image ) : ?>
                <div class="offer__images wow animate__animated animate__fadeInUp">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
            <?php endif; ?>

            <?php if ( have_rows( 'block_images' ) ) : ?>
                <?php while ( have_rows( 'block_images' ) ) : the_row(); ?>

                    <div class="offer__images wow animate__animated animate__fadeInUp">
                        <?php $back_image = get_sub_field( 'back_image' ); ?>
                        <?php get_sub_field( 'shadow_for_back_image' ) == 1 ? $shadow = 'img-box-shadow' : $shadow = ''; ?>
                        <?php if ( $back_image ) : ?>
                            <div class="offer__images-big <?php echo $shadow; ?>">
                                <img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="offer__images" />
                            </div>
                        <?php endif; ?>

                        <?php if ( have_rows( 'small_image' ) ) : ?>
                            <?php $index = 1; ?>
                            <?php while ( have_rows( 'small_image' ) ) : the_row(); ?>
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <div class="image-info-block-digital offer__images-small offer__images-small-<?php echo esc_attr($index); ?>">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="offer__images" />
                                    </div>
                                <?php endif; ?>

                                <?php $index++; ?>

                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>