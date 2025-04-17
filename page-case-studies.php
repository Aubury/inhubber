<?php
/* Template Name: Case Studies */

get_header();

// Получаем текущий язык
$lang = pll_current_language();

// ID категории (можно по слагу или ID)
$category_slug = 'case-studies'; // слаг категории, которую нужно вывести
$category = get_category_by_slug($category_slug);
$cat_id = get_cat_ID('case-studies');
$current_cat_id = $category ? $category->cat_ID : $category->term_taxonomy_id ;

// Получаем посты категории
$args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category__in' => [$current_cat_id],
    'orderby' => 'date',
    'order' => 'DESC',
    'lang' => $lang, // поддержка Polylang
];

$query = new WP_Query($args);

$blog_link = pll_current_language() === 'en' ? get_the_permalink(124) : get_the_permalink(1237);
$case_studies_pages_link = pll_current_language() === 'en' ? get_the_permalink(5478) : get_the_permalink(5480);

/** NEWS */
$news_pages_link = $lang === 'en' ? get_the_permalink(5482) : get_the_permalink(5484);
$lang === 'en' ? $news_slug = 'news' : $news_slug = 'nachrichten';
$lang === 'en' ? $news_cat_id = get_cat_ID('news') : $news_cat_id = get_cat_ID('nachrichten');
$news_category = get_category($news_cat_id);

/** BLOG  */
$blog_cat_id = get_cat_ID('blog');
$lang = 'en' ? $id_blog = 124 : $id_blog = 1237;

/** GLOSSARY */
$glossary_pages_link = $lang === 'en' ? get_the_permalink(2794) : get_the_permalink(2826);
$glossary_cat_id = get_cat_ID('glossary');
$glossary_category = get_category($glossary_cat_id);

?>

<section class="blog-offer">
    <div class="container">
        <div class="blog-offer__wrapper">
            <h1>
                <?php echo $category->name; ?>
            </h1>
            <div class="blog-offer__text">
                <?php echo $category->description; ?>
            </div>
            <div class="blog-offer__tabs">
                <a href="<?php echo $blog_link; ?>" data-id="<?php echo esc_attr($id_blog) ?>" class="blog-offer__tab">
                    <?php pll_e('All'); ?>
                </a>

                <a href="<?php echo $case_studies_pages_link; ?>" data-id="<?php echo esc_attr($current_cat_id) ?>" class="blog-offer__tab _active">
                    <?php pll_e('Case studies'); ?>
                </a>

                <?php if ($news_category->count > 0) : ?>
                    <a href="<?php echo $news_pages_link; ?>" data-id="<?php echo esc_attr($news_cat_id) ?>" class="blog-offer__tab">
                        <?php pll_e('News'); ?>
                    </a>
                <?php endif; ?>

                <?php if ($glossary_category->count > 0) : ?>
                    <a href="<?php echo $glossary_pages_link; ?>" data-id="<?php echo esc_attr($glossary_cat_id) ?>" class="blog-offer__tab">
                        <?php pll_e('Glossary'); ?>
                    </a>
                <?php endif; ?>

                <?php
                $terms = get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                    'orderby' => 'id',
                    'exclude'    => [$current_cat_id, $news_cat_id, $blog_cat_id, $glossary_cat_id]
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

<?php if ($query->have_posts()) : ?>
    <section class="blog-content">
        <div class="container">
            <div class="blog-content__content">
                <div class="blog-content__items" id="blog-content__items">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php get_template_part('templates/post-block/blog'); ?>
                    <?php endwhile; ?>
                </div>

                <div class="blog-content__btn hidden">
                    <button id="loadMore" class="load-more hidden" onclick="showMore()">
                        <?php pll_e('Load more'); ?>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <script>

        function showMore() {
            let cards = document.querySelectorAll(".blog-content__item.hidden");
            cards.forEach(card => card.classList.remove("hidden"));
            document.getElementById("loadMore").classList.add("hidden");
            document.querySelector(".blog-content__btn").classList.add("hidden");
        }

        document.addEventListener("DOMContentLoaded", function() {

            let cards = document.querySelectorAll(".blog-content__item");
            if (cards.length > 4) {
                for (let i = 4; i < cards.length; i++) {
                    cards[i].classList.add("hidden");
                }
                document.getElementById("loadMore").classList.remove("hidden");
                document.querySelector(".blog-content__btn").classList.remove("hidden");
            }
        });
    </script>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php
if ( have_posts() ) :?>
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
        ?>
    <?php endwhile; ?>
<?php endif;
?>

<?php get_template_part('templates/footer-everything') ?>
<?php get_footer(); ?>

