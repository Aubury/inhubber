<?php
/**
 * Block template file: templates/blocks/solutions/solutions-one-block.php
 *
 * Solutions One Block Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'solutions-one-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-solutions-one-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}

$id_home = pll_get_post(get_option('page_on_front'));
get_field( 'display_raiting_&_comppliance_badges' ) == 1
    ? $rating_class = 'rating-wrapper'
    : $rating_class = '';
?>
<?php $link = get_field('link'); ?>
<?php $main_image = get_field('main_image'); ?>
<?php $image_1 = get_field('image_1'); ?>
<?php $image_2 = get_field('image_2'); ?>
<section id="<?php echo esc_attr($id); ?>" class="offer solutions-offer <?php echo esc_attr($classes); ?>  <?php echo $rating_class ?>">
    <div class="container">
        <div class="solutions-offer__wrapper">
            <div class="solutions-offer__desc">
                <div class="solutions-offer__overtitle">
                    <?php the_field('title'); ?>
                </div>
                <h1>
                    <?php the_field('subtitle'); ?>
                </h1>
                <div class="solutions-offer__text">
                    <?php the_field('text'); ?>
                </div>
                <?php if ($link) : ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                       class="btn-fill">
						<?php echo esc_html($link['title']); ?>
					</a>
                <?php endif; ?>

            </div>
            <div class="solutions-offer__img <?php the_field('animation'); ?>">
                <?php
                    $dimensionsBig = inhubber_get_image_dimensions(
                        array(
                            'ID' => $main_image['id'],
                        )
                    );
                ?>
                <img src="<?php echo esc_url($main_image['url']); ?>"
                     width="<?php echo esc_attr( $dimensionsBig['width'] ); ?>"
                     height="<?php echo esc_attr( $dimensionsBig['height'] ); ?>"
                     alt="<?php echo esc_attr($main_image['alt']); ?>"/>
                <?php $additional_images_images = get_field('additional_images'); ?>
                <?php if ($additional_images_images) : ?>
                    <?php $i = 3; ?>
                    <?php foreach ($additional_images_images as $additional_images_image): ?>
                        <img class="solutions-offer__img-<?php echo $i; ?>"
                             src="<?php echo esc_url($additional_images_image['url']); ?>"
                             alt="<?php echo esc_attr($additional_images_image['alt']); ?>"/>

                        <?php $i++; ?>
                    <?php endforeach; ?>
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
        </div>
    <?php else : ?>
        <?php // echo 'false'; ?>
    <?php endif; ?>

</section>