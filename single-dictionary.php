<?php
/*
Template Name: Single Dictionary page
*/
?>
<?php get_header() ?>
<?php $cat = get_the_terms(get_the_ID(), 'category');
//echo '<pre>';
//print_r($cat);
//echo '</pre>';
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="single-offer dictionary_cat">
        <div class="container">
            <div class="single-offer__wrapper">
                <div class="single-offer__overtext">
                    <?php echo $cat[0]->name; ?>
                </div>
                <h1>
                    <?php the_title() ?>
                </h1>
            </div>
        </div>
    </section>
    <section class="single-content">
        <div class="container flex-row">
            <div class="menu-content"></div>
            <div class="dictionary-single-content__wrapper">
                <?php the_content(); ?>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let dictionary_content = document.getElementsByClassName('dictionary-single-content__wrapper');
            if (dictionary_content) {
                // Находим все элементы внутри этого блока
                let elementsWithId = Array.from(dictionary_content.querySelectorAll('[id]')); // Выбираем элементы с атрибутом id

                console.log(elementsWithId); // Массив найденных элементов
            } else {
                console.log('Элемент с классом "dictionary-single-content__wrapper" не найден.');
            }
    </script>
<?php endwhile; ?>

<?php else: ?>

<?php endif; ?>


<?php get_template_part( 'templates/footer-everything') ?>

<?php get_footer() ?>