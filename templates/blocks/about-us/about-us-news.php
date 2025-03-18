<?php
/**
 * Block template file: templates/blocks/about-us/about-us-news.php
 *
 * About Us News Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-us-news-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-about-us-news';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>
<?php

$category_news = get_field('category_news');


?>

<section id="<?php echo esc_attr($id); ?>" class="about-us-values about-us-press <?php echo esc_attr($classes); ?>">
    <div class="container">
        <h2>
            <?php the_field('title'); ?>
        </h2>
        <?php $news = get_posts([

            'posts_per_page' => get_field('cout_news'),
            'category' => $category_news,

        ]); ?>

        <?php if ($news): ?>
            <div class="blog-content__items">
                <?php foreach ($news as $item): ?>

                    <div class="blog-content__item">
                        <a href="<?php echo get_the_permalink($item->ID); ?>" class="blog-content__wrapp">
                            <div class="blog-content__image">
                                <?php echo kama_thumb_img('w=592 &h=240 &post_id=' . $item->ID . ' &crop=true  &alt=' . get_the_title() . ''); ?>
                            </div>
                            <div class="blog-content__info">
                                <div class="blog-content__date">
                                    <?php echo get_cat_name($category_news) ?>・<?php the_time('d F Y'); ?>
                                </div>
                                <div class="blog-content__title">
                                    <?php echo get_the_title($item->ID); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>