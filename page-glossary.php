<?php
/*
Template Name:Glossary
Template Post Type: page
*/

global $post;
$id_home = pll_get_post(get_option('page_on_front'));

get_header();

?>

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


<section class="software">
    <div class="container">
        <div id="glossary-results"></div>

            <?php
            $args = array(
                'post_type'      => 'post',  // Кастомный тип записей
                'category_name'  => 'glossary',
                'posts_per_page' => -1,          // Выводим все посты
                'orderby'        => 'title',     // Сортировка по заголовку
                'order'          => 'ASC',       // По возрастанию (A-Z)
                'post_status'    => 'publish',
            );

            $query = new WP_Query($args);

            $glossary_items = [];
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $first_letter = strtoupper(mb_substr(get_the_title(), 0, 1)); // Первая буква заглавная
                    $glossary_items[$first_letter][] = [
                        'title' => get_the_title(),
                        'link'  => get_permalink(),
                        'content' => get_the_excerpt(),
                    ];
                }
            }

            wp_reset_postdata();

            ?>

            <div class="glossary-container">
                <?php foreach ($glossary_items as $letter => $items) : ?>
                    <h2 id="<?php echo $letter; ?>" class="glossary-letter"><?php echo $letter; ?></h2>
                    <div class="glossary-grid">
                        <?php foreach ($items as $item) :
                            $short_excerpt = wp_trim_words($item['content'], 10, '...');
                            ?>

                            <div class="glossary-card">
                                <a href="<?php echo $item['link']; ?>">

                                        <h3 class="blog-content__title">
                                            <?php echo $item['title']; ?>
                                        </h3>

                                        <div class="blog-content__date">
                                            <?php echo $short_excerpt; ?>
                                        </div>
                                </a>
                            </div>  <!-- end .blog-content__item -->

                        <?php endforeach; ?>
                    </div>  <!-- end .glossary-grid -->
                <?php endforeach; ?>
            </div> <!-- end .glossary-container -->

   </div> <!-- end .container -->
</section>

<?php if ($crb_association = carbon_get_post_meta($post->ID, 'crb_association')) : ?>
    <section class="software">
        <div class="container">
            <div class="section-header">
                <?php if ($crb_related_terms_title = carbon_get_post_meta($post->ID, 'crb_related_terms_title')) : ?>
                    <h2 class="section-header__title header__title">
                        <?php echo $crb_related_terms_title ?>
                    </h2>
                <?php endif; ?>
            </div>
            <div class="glossary-container">
                <div class="glossary-grid">

                <?php foreach ($crb_association as $index => $item) :
                    $post = get_post($item['id']);
                    $short_excerpt = wp_trim_words($post->post_excerpt, 10, '...');
                ?>

                    <div class="glossary-card">
                        <a href="<?php echo $post->guid; ?>">

                                <h3 class="blog-content__title">
                                    <?php echo $post->post_title; ?>
                                </h3>

                                <div class="blog-content__date">
                                    <?php echo $short_excerpt; ?>
                                </div>
                        </a>
                    </div>  <!-- end .blog-content__item -->

                <?php endforeach; ?>
                </div>  <!-- end .glossary-grid -->
            </div> <!-- end .glossary-container -->

            </div>
        </div>
    </section>
<?php endif; ?>

<?php

get_footer();
?>
