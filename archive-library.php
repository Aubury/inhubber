<?php get_header() ?>
    <section class="single-offer">
        <div class="container">
            <div class="single-offer__wrapper">
                <h1>
                    <?php pll_e('Library'); ?>
                </h1>
                <div class="single-offer__text">
                    <?php pll_e('Download our free eBooks and learn how to manage your contracts more efficiently, and replay online events with our webinars.'); ?>
                </div>
            </div>
        </div>
    </section>
<?php $library = new WP_Query([
    'post_type' => 'library',
    'posts_per_archive_page' => 9,
    'paged' => get_query_var('paged')
]);

$total_posts = $library->found_posts;
$posts_per_page = $library->query['posts_per_archive_page'];

// var_dump($library->max_num_pages);
?>
<?php if ($library->have_posts()) : ?>
    <section class="library-content">
        <div class="container">
            <div class="library-content__items" id="library-content__items">
                <?php while ($library->have_posts()) : $library->the_post(); ?>
                    <?php get_template_part('templates/post-block/library'); ?>
                <?php endwhile; ?>
            </div>
            <?php
            if ($library->max_num_pages > 1) {
                ?>
                <div class="blog-content__btn">
                    <a href="#" id="library_loadmore" class="btn"><?php pll_e('Load more'); ?></a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_query(); ?>

<?php get_template_part('templates/footer-everything') ?>

<?php get_footer() ?>