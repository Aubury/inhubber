<?php
/**
 * Block template file: templates/blocks/events/single-trusted-by-over.php
 *
 * Single Block Trusted By Over Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'single-block-trusted-by-over-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-single-block-trusted-by-over';
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

<?php $logo_user_images = get_field( 'logo_user' ); ?>
<?php if ( $logo_user_images ) :  ?>
    <section id="<?php echo esc_attr( $id ); ?>" class="single-block block-logo <?php echo esc_attr( $classes ); ?>">
            <div class="block-logo__wrapper">
                <?php if(get_field( 'title' )): ?>
                    <div class="container">
                        <h2>
                            <?php the_field( 'title' ); ?>
                        </h2>
                    </div>
                <?php  endif;?>
                <div class="block-logo__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ( $logo_user_images as $logo_user_image ): ?>
                            <?php
                            /*
                             * ACF обычно возвращает ID с ключом ID,
                             * но оставляем поддержку id.
                             */
                            $image_id = !empty($logo_user_image['ID'])
                                ? (int) $logo_user_image['ID']
                                : (int) ($logo_user_image['id'] ?? 0);

                            if (!$image_id) {
                                continue;
                            }

                            $dimensions = inhubber_get_image_dimensions(
                                array(
                                    'ID' => $image_id,
                                )
                            );

                            $mime_type = get_post_mime_type($image_id);
                            $is_svg    = ($mime_type === 'image/svg+xml');

                            $desktop_image = wp_get_attachment_image_src(
                                $image_id,
                                'full'
                            );

                            if (!$desktop_image) {
                                continue;
                            }

                            $mobile_image = $is_svg
                                ? false
                                : inhubber_get_mobile_logo_data($image_id);

                            $image_alt = get_post_meta(
                                $image_id,
                                '_wp_attachment_image_alt',
                                true
                            );

                            if (!$image_alt) {
                                $image_alt = 'Logo image';
                            }
                            ?>

                            <div class="block-logo__slide swiper-slide">

                                <?php if ($is_svg) : ?>

                                    <img class="block-logo__image"
                                         src="<?php echo esc_url(wp_get_attachment_url($image_id)); ?>"
                                        <?php if (
                                            !empty($dimensions['width']) &&
                                            !empty($dimensions['height'])
                                        ) : ?>
                                            width="<?php echo esc_attr($dimensions['width'] ); ?>"
                                            height="<?php echo esc_attr($dimensions['height']); ?>"
                                        <?php endif; ?>
                                         alt="<?php echo esc_attr($image_alt ?: 'Logo image'); ?>"
                                         loading="lazy"
                                         decoding="async"
                                    >

                                <?php elseif ($desktop_image) : ?>

                                    <picture class="block-logo__picture">

                                        <?php if ($mobile_image) : ?>
                                            <source media="(max-width: 570px)"
                                                    srcset="<?php echo esc_url($mobile_image['url']); ?>"
                                                    width="<?php echo esc_attr($mobile_image['width']); ?>"
                                                    height="<?php echo esc_attr($mobile_image['height']); ?>"
                                            >
                                        <?php endif; ?>

                                        <img class="block-logo__image"
                                             src="<?php echo esc_url($desktop_image[0]); ?>"
                                             width="<?php echo esc_attr($desktop_image[1]); ?>"
                                             height="<?php echo esc_attr($desktop_image[2]); ?>"
                                             alt="<?php echo esc_attr($image_alt); ?>"
                                             loading="lazy"
                                             decoding="async"
                                        >

                                    </picture>

                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>