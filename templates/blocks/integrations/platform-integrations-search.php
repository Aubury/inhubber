<?php
/**
 * Block template file: templates/blocks/integrations/platform-integrations-search.php
 *
 * Integrations Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'integrations-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-integrations';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$categories = [];
?>

<style type="text/css">
    <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
    }
</style>

<section id="<?php echo esc_attr( $id ); ?>" class="software <?php echo esc_attr( $classes ); ?>">
    <div class="container">

        <div class="section-header full-width">
            <?php if ( get_field( 'title' ) ) : ?>
                <h2 class="section-header__title">
                    <?php the_field( 'title' ); ?>
                </h2>
            <?php endif; ?>
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
        </div><!-- end .section-header -->

        <?php if ( have_rows( 'menu_with_cards' ) ) : ?>
        <?php while ( have_rows( 'menu_with_cards' ) ) : the_row(); ?>
            <div class="flex-row">

                <div class="menu-content">
                    <div class="menu-top-title">
                        <?php echo pll_e('Categories')?>
                    </div>

                    <ul class="submenu">
                        <?php if ( have_rows( 'menu' ) ) : ?>
                            <?php while ( have_rows( 'menu' ) ) : the_row(); ?>
                                <li onclick="filterCategory('<?php the_sub_field( 'name' ); ?>')">
                                    <?php
                                    $category_name = get_sub_field('name');
                                    if ($category_name !== 'Other') {
                                        $categories[] = $category_name;
                                    }

                                    the_sub_field( 'name' );
                                    ?>
                                </li>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </ul> <!-- end .submenu -->
                </div> <!-- end .menu-content -->

                <div class="dictionary-single-content__wrapper">
                    <div class="integrations-grid">
                        <?php if ( have_rows( 'cards' ) ) : ?>
                            <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                                <div class="integrations-card" data-category="<?php the_sub_field( 'crm' ); ?>" >
                                    <div class="card-header">
                                        <?php $image = get_sub_field( 'image' ); ?>
                                        <?php if ( $image ) : ?>
                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                        <?php endif; ?>
                                        <p><?php the_sub_field( 'upcoming' ); ?></p>
                                    </div>
                                    <div class="card-body">
                                        <p class="info"><?php the_sub_field( 'crm' ); ?></p>
                                        <h3><?php the_sub_field( 'title' ); ?></h3>
                                        <p><?php the_sub_field( 'text' ); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <?php $button = get_sub_field( 'button' ); ?>
                                        <?php if ( $button ) : ?>
                                            <a href=""
                                               onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                                               class="card-button">
                                                <?php echo esc_html( $button['title'] ); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php $link = get_sub_field( 'link' ); ?>
                                        <?php if ( $link ) : ?>
                                            <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
                                                <?php echo esc_html( $link['title'] ); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </div> <!-- end .integrations-grid -->
                </div> <!-- end .dictionary-single-content__wrapper -->

            </div><!-- end .flex-row -->

            <div class="flex-row align-items-center justify-content-center">
                    <button id="loadMore" class="load-more hidden" onclick="showMore()">Load More</button>
                </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div> <!-- end .container -->
</section>

<script>
    let categories = <?php  echo json_encode($categories); ?>;

    function filterContent() {
        let input = document.getElementById("integrations-search").value.toLowerCase();
        let cards = document.querySelectorAll(".integrations-card");
        cards.forEach(card => {
            card.style.display = card.textContent.toLowerCase().includes(input) ? "block" : "none";
        });
    }

    function filterCategory(category) {
        let cards = document.querySelectorAll(".integrations-card");
        cards.forEach(card => {
            if (category === 'Other') {
                card.style.display = (card.dataset.category && !<?php  echo json_encode($categories); ?>.includes(card.dataset.category)) ? "block" : "none";
            } else {
                card.style.display = (category === 'All integrations' || card.dataset.category === category) ? "block" : "none";
            }
        });

    }

    function showMore() {
        let cards = document.querySelectorAll(".integrations-card.hidden");
        cards.forEach(card => card.classList.remove("hidden"));
        document.getElementById("loadMore").classList.add("hidden");
    }

    document.addEventListener("DOMContentLoaded", function() {

        let cards = document.querySelectorAll(".integrations-card");
        if (cards.length > 9) {
            for (let i = 9; i < cards.length; i++) {
                cards[i].classList.add("hidden");
            }
            document.getElementById("loadMore").classList.remove("hidden");
        }
    });
</script>