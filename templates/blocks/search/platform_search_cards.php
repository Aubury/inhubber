<?php
/**
 * Block template file: templates/blocks/search/platform_search_cards.php
 *
 * Platform Search Cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'platform-search-cards-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-platform-search-cards';
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

<section id="<?php echo esc_attr( $id ); ?>" class="features overwiew-features  overwiew-features-grey block-overwiew-information <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="section-header width-100">
            <?php if (get_field('title')) : ?>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php the_field( 'title' ); ?>
                </h2>
            <?php endif; ?>
        </div>

        <?php if ( get_field( 'under_title' ) ) : ?>
            <div class="section-header__undertitle">
                <?php the_field( 'under_title' ); ?>
            </div>
        <?php endif; ?>

        <div class="search-container">
            <input type="text"
                   id="integrations-search"
                   onkeyup="filterContent()"
                   placeholder='Search' />
        </div>


        <div class="two_columns_grid">
            <?php if ( have_rows( 'single_card' ) ) : ?>
                <?php while ( have_rows( 'single_card' ) ) : the_row(); ?>
                <div class="card">
                    <?php $link = get_sub_field( 'link' ); ?>
                    <?php if ( $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>" class="blog-content__wrapp">
                            <div class="blog-content__image">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="blog-content__info">
                                <?php if ( get_sub_field('title') ) : ?>
                                    <div class="blog-content__title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( get_sub_field('description') ) : ?>
                                    <div class="blog-content__date">
                                        <?php the_sub_field( 'description' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php else: ?>
                        <div class="blog-content__wrapp">
                            <div class="blog-content__image">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="blog-content__info">
                                <?php if ( get_sub_field('title') ) : ?>
                                    <div class="blog-content__title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( get_sub_field('description') ) : ?>
                                    <div class="blog-content__date">
                                        <?php the_sub_field( 'description' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>



                <?php endwhile; ?>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
        <div class="flex-row align-items-center justify-content-center">
            <button id="loadMore" class="load-more hidden" onclick="showMore()">Load More</button>
        </div>

    </div>


</section>

<script>

    function filterContent() {
        let input = document.getElementById("integrations-search").value.toLowerCase();
        let cards = document.querySelectorAll(".card");
        cards.forEach(card => {
            card.style.display = card.textContent.toLowerCase().includes(input) ? "block" : "none";
        });

        let visibleCards = Array.from(cards).filter(card => {
            let match = card.textContent.toLowerCase().includes(input);
            card.style.display = match ? "block" : "none";
            return match;
        });

        if (visibleCards.length > 6) {
            for (let i = 6; i < visibleCards.length; i++) {
                visibleCards[i].classList.add("hidden");
                visibleCards[i].style.display = '';
            }

            document.getElementById("loadMore").classList.remove("hidden");

        } else {
            document.getElementById("loadMore").classList.add("hidden");
        }
    }

    function showMore() {
        let cards = document.querySelectorAll(".card.hidden");

        if (cards.length > 6) {
            for (let i = 6; i < cards.length; i++) {
                cards[i].classList.remove("hidden");
            }
        } else {
            cards.forEach(card => card.classList.remove("hidden"));
            document.getElementById("loadMore").classList.add("hidden");
        }
    }

    document.addEventListener("DOMContentLoaded", function() {

        let cards = document.querySelectorAll(".card");
        if (cards.length > 6) {
            for (let i = 6; i < cards.length; i++) {
                cards[i].classList.add("hidden");
            }
            document.getElementById("loadMore").classList.remove("hidden");
        }
    });
</script>