<?php
/**
 * Block template file: templates/blocks/main/first_title_block.php
 *
 * First Block With Title Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'first-block-with-title-page-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-first-block-with-title-page';
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

<section id="<?php echo esc_attr( $id ); ?>" class="offer overwiew-offer white_bg <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="offer__wrapper <?php echo $rating_class ?>">
            <div class="section-header">
                <?php if (get_field('page_title')) : ?>
                    <h4 class="section-header__overtitle wow animate__animated animate__fadeInUp"><?php the_field( 'page_title' ); ?></h4>
                <?php endif; ?>

                <?php if (get_field('title')) : ?>
                    <h1 class="section-header__title wow animate__animated animate__fadeInUp"><?php the_field('title'); ?></h1>
                <?php endif; ?>

                <?php if (get_field('text')) : ?>
                    <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                        <?php the_field( 'text' ); ?>
                    </div>
                <?php endif; ?>



                <?php $link = get_field( 'link' ); ?>

                <?php if ($link['title']) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>


            </div>

            <?php if ( get_field( 'display_raiting_&_comppliance_badges' ) == 1 ) : ?>
                <div class="rating-compliance_badges">
                    <?php if ($crb_raiting_gallery = carbon_get_post_meta($id_home, 'crb_raiting_gallery')): ?>

                        <?php
                        $ids = carbon_get_post_meta($id_home, 'crb_raiting_gallery') ?: [];

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
                                // Размеры изображения.
                                'width'  => $dimensions['width'],
                                'height' => $dimensions['height'],
                                // метаданные с размерами (thumbnail, medium, etc.)
                                'meta'  => wp_get_attachment_metadata($id),
                            ];
                        }, $ids)));

                        ?>
                        <div class="rating-row">
                            <?php
                            foreach ($images as $img) : ?>
                                <img src="<?php echo esc_url( $img['url'] ); ?>"

                                    <?php if ( $img['width'] && $img['height'] ) : ?>
                                        width="<?php echo esc_attr( $img['width'] ); ?>"
                                        height="<?php echo esc_attr( $img['height'] ); ?>"
                                    <?php endif; ?>

                                     alt="<?php echo esc_attr( $img['alt'] ); ?>"
                                     loading="eager"
                                     decoding="async"
                                >
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
                                            $dimensions = inhubber_get_image_dimensions(
                                                array(
                                                    'ID' => $id,
                                                )
                                            );
                                            ?>

                                            <img src="<?php echo esc_url( $url ); ?>"
                                                <?php if ( $img['width'] && $img['height'] ) : ?>
                                                    width="<?php echo esc_attr( $img['width'] ); ?>"
                                                    height="<?php echo esc_attr( $img['height'] ); ?>"
                                                <?php endif; ?>
                                                 alt="<?php echo 'Badge'; ?>"
                                                 loading="eager"
                                                 decoding="async"
                                            >

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
            <?php else : ?>
                <?php // echo 'false'; ?>
            <?php endif; ?>
        </div>
    </div>
</section>