<?php get_header();
// Получаем текущий язык
$lang = pll_current_language();

$id_blog = get_option('page_for_posts');
$post_slug = get_post_field('post_name', get_post());

/** Case Studies */
$case_studies_pages_link = pll_current_language() === 'en' ? get_the_permalink(5478) : get_the_permalink(5480);
$case_studies = get_category_by_slug('case-studies');
$case_studies_cat_id = $case_studies ? $case_studies->cat_ID : $case_studies->term_taxonomy_id ;
$case_studies_category = get_category($case_studies_cat_id);

/** NEWS */
$news_pages_link = $lang === 'en' ? get_the_permalink(5482) : get_the_permalink(5484);
$lang === 'en' ? $category_slug = 'news' : $category_slug = 'nachrichten';
$lang === 'en' ? $news_cat_id = get_cat_ID('news') : $news_cat_id = get_cat_ID('nachrichten');
$news_category = get_category($news_cat_id);

/** BLOG  */
$blog_cat_id = get_cat_ID('blog');

/** GLOSSARY */
$glossary_pages_link = $lang === 'en' ? get_the_permalink(2794) : get_the_permalink(2826);
$glossary_cat_id = get_cat_ID('glossary');
$glossary_category = get_category($glossary_cat_id);

if (get_the_ID() === 124 || get_the_ID() === 1237 || $post_slug === 'blog' || $post_slug === 'blog-2') { // 124
    ?>
    <section class="blog-offer 1">
        <div class="container">
            <div class="blog-offer__wrapper">
                <h1>
                    <?php echo get_the_title($id_blog); ?>
                </h1>
                <div class="blog-offer__text">
                    <?php echo get_the_content(null, null, $id_blog) ?>
                </div>
                <div class="blog-offer__tabs">
                    <a href="<?php echo get_page_link(pll_get_post($id_blog)); ?>" data-id="<?php echo esc_attr($id_blog) ?>" class="blog-offer__tab _active">
                        <?php pll_e('All'); ?>
                    </a>

                    <?php if ($case_studies_category->count > 0) : ?>
                        <a href="<?php echo $case_studies_pages_link; ?>" data-id="<?php echo esc_attr($case_studies_cat_id) ?>" class="blog-offer__tab">
                            <?php pll_e('Case studies'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($news_category->count > 0) : ?>
                        <a href="<?php echo $news_pages_link; ?>" data-id="<?php echo esc_attr($news_cat_id) ?>" class="blog-offer__tab">
                            <?php pll_e('News'); ?>
                        </a>
                    <?php endif;

                    ?>


                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                        'orderby' => 'id',
                        'exclude'    => [$case_studies_cat_id, $news_cat_id, $blog_cat_id, $glossary_cat_id]
                    ]);
                    ?>
                    <?php if ($terms): ?>
                        <?php foreach ($terms as $term):
                            ?>
                            <a href="<?php echo get_term_link($term->term_id) ?>" class="blog-offer__tab 2"
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
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        'cat'         => '-' . $glossary_cat_id, // Именно так: минус перед ID
    );


    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <section class="blog-content">
            <div class="container">
                <div class="blog-content__content">
                    <div class="blog-content__items" id="blog-content__items">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <?php if (has_category('glossary', $id)) :
                                continue; // Пропустить пост, если у него есть категория glossary
                            endif; ?>
                            <?php get_template_part('templates/post-block/blog'); ?>
                        <?php endwhile; ?>
                    </div>
                    <?php
                    if ($query->max_num_pages > 1): ?>
                        <div class="blog-content__btn">
                            <a href="#" id="blog_loadmore" class="btn"><?php pll_e('Load more'); ?></a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php
} else {
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }
}

get_footer();