<?php // $id_blog = get_option('page_for_posts'); ?>
<?php get_header() ?>

<?php
$category = get_queried_object();
$current_cat_id = $category->term_id;
//$current_cat_name = $category->name;

echo '<pre>';
var_dump($category);
echo '</pre>';

$id_blog = $current_cat_id;

var_dump($current_cat_id);
?>
    <section class="blog-offer">
        <div class="container">
            <div class="blog-offer__wrapper">
                <h1>
                    <?php echo get_the_title($id_blog); ?>
                </h1>
                <div class="blog-offer__text">
                    <?php echo get_the_content(null, null, $id_blog) ?>
                </div>
                <div class="blog-offer__tabs">
                    <a href="<?php echo get_page_link(pll_get_post($id_blog)); ?>" class="blog-offer__tab ">
                        <?php pll_e('All'); ?>
                    </a>
                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                        'orderby' => 'id',
                    ]);
                    ?>
                    <?php if ($terms): ?>
                        <?php foreach ($terms as $term): ?>
                            <a href="<?php echo get_term_link($term->term_id) ?>"
                               class="blog-offer__tab <?php if ($term->term_id == $current_cat_id): ?> _active <?php endif; ?>"
                                <?php echo isset($term->term_id) && !empty($term->term_id) ? ' data-id="' . esc_attr($term->term_id) . '" ' : ''; ?>
                                <?php echo isset($term->name) && !empty($term->name) ? ' data-name="' . esc_attr($term->name) . '" ' : ''; ?>
                                <?php echo isset($term->slug) && !empty($term->slug) ? ' data-slug="' . esc_attr($term->slug) . '" ' : ''; ?>
                                <?php echo isset($term->count) && !empty($term->count) ? ' data-count="' . esc_attr($term->count) . '" ' : ''; ?>
                                <?php echo isset($term->taxonomy) && !empty($term->taxonomy) ? ' data-taxonomy="' . esc_attr($term->taxonomy) . '" ' : ''; ?>
                                <?php echo isset($term->term_id) && !empty($term->term_id) ? ' data-link="' . esc_attr(get_term_link($term->term_id)) . '" ' : ''; ?>
                            ><?php echo $term->name; ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php if (have_posts()) : ?>
    <section class="blog-content">
        <div class="container">
            <div class="blog-content__content">
                <div class="blog-content__items" id="blog-content__items">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('templates/post-block/blog'); ?>
                    <?php endwhile; ?>
                </div>

                <?php
                global $wp_query; // you can remove this line if everything works for you

                // var_dump($wp_query->max_num_pages);

                if ($wp_query->max_num_pages > 1): ?>
                    <div class="blog-content__btn">
                        <a href="#" id="blog_loadmore" class="btn"><?php pll_e('Load more'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php get_template_part('templates/footer-everything') ?>
<?php get_footer() ?>