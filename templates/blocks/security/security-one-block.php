<?php
/**
 * Block template file: templates/blocks/security-one-block.php
 *
 * Security One Block Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'security-one-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-security-one-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="security-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="security-offer__header">
            <div class="security-offer__header-label">
                <?php the_field('title'); ?>
            </div>
            <h1><?php the_field('subtitle'); ?></h1>
            <div class="security-offer__header-text">
                <?php the_field('text'); ?>
            </div>
            <?php $link = get_field('link'); ?>
            <?php if ($link['title']) : ?>
                <a href=""
                   onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                   class="btn-fill"><?php echo esc_html($link['title']); ?></a>
            <?php endif; ?>
        </div>
        <div class="security-offer__img">
            <?php
            $image_block      = get_field('image_block');
            $image_block_mobi = get_field('image_block_mobi');

            /*
             * Основное изображение для <img>.
             * Если десктопного нет, используем мобильное.
             */
            $fallback_image = $image_block ?: $image_block_mobi;

            if ($fallback_image) :
                $desktop_id = !empty($fallback_image['ID'])
                    ? (int) $fallback_image['ID']
                    : (int) ($fallback_image['id'] ?? 0);

                $mobile_id = !empty($image_block_mobi['ID'])
                    ? (int) $image_block_mobi['ID']
                    : (int) ($image_block_mobi['id'] ?? 0);

                $desktop_dimensions = $desktop_id
                    ? inhubber_get_image_dimensions([
                        'ID' => $desktop_id,
                    ])
                    : [];

                $mobile_dimensions = $mobile_id
                    ? inhubber_get_image_dimensions([
                        'ID' => $mobile_id,
                    ])
                    : [];

                $image_alt = !empty($fallback_image['alt'])
                    ? $fallback_image['alt']
                    : (
                    !empty($image_block_mobi['alt'])
                        ? $image_block_mobi['alt']
                        : 'Security offer'
                    );
                ?>

                <picture class="security-offer__picture">

                    <?php if ($image_block_mobi) : ?>
                        <source
                                media="(max-width: 576px)"
                                srcset="<?php echo esc_url(
                                    $image_block_mobi['url']
                                ); ?>"
                            <?php if (
                                !empty($mobile_dimensions['width']) &&
                                !empty($mobile_dimensions['height'])
                            ) : ?>
                                width="<?php echo esc_attr(
                                    $mobile_dimensions['width']
                                ); ?>"
                                height="<?php echo esc_attr(
                                    $mobile_dimensions['height']
                                ); ?>"
                            <?php endif; ?>
                        >
                    <?php endif; ?>

                    <img
                            src="<?php echo esc_url(
                                $fallback_image['url']
                            ); ?>"
                        <?php if (
                            !empty($desktop_dimensions['width']) &&
                            !empty($desktop_dimensions['height'])
                        ) : ?>
                            width="<?php echo esc_attr(
                                $desktop_dimensions['width']
                            ); ?>"
                            height="<?php echo esc_attr(
                                $desktop_dimensions['height']
                            ); ?>"
                        <?php endif; ?>
                            fetchpriority="high"
                            loading="eager"
                            decoding="async"
                            alt="<?php echo esc_attr($image_alt); ?>"
                    >

                </picture>

            <?php endif; ?>
        </div>
    </div>
</section>