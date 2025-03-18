<?php
/*
Template Name: Integrations page
*/

global $post;
$id_home = pll_get_post(get_option('page_on_front'));
$categories = [];

if ($crb_integrations_menu = carbon_get_post_meta($post->ID, 'crb_integrations_menu')):
    foreach ($crb_integrations_menu as $item):
        $category_name = $item['title'];
        if ($category_name !== 'Other') {
            $categories[] = $category_name;
        }
    endforeach;
endif;

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}

?>
<?php if ($crb_integrations_cards = carbon_get_post_meta($post->ID, 'crb_integrations_cards')): ?>
    <section class="software block-integrations">
        <div class="container">

            <div class="section-header full-width">
                <?php if ($crb_integrations_title = carbon_get_post_meta($post->ID, 'crb_integrations_title')): ?>
                    <h2 class="section-header__title">
                        <?php echo $crb_integrations_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($crb_integrations_under_title = carbon_get_post_meta($post->ID, 'crb_integrations_under_title')): ?>
                    <div class="section-header__undertitle">
                        <?php echo $crb_integrations_under_title; ?>
                    </div>
                <?php endif; ?>

                <div class="search-container">
                    <input type="text"
                           id="integrations-search"
                           onkeyup="filterContent()"
                           placeholder='Search' />
                </div>

            </div><!-- end .section-header -->

            <div class="flex-row">
                <div class="menu-content">
                    <div class="menu-top-title">
                        <?php echo pll_e('Categories')?>
                    </div>

                    <ul class="submenu desktop-display">
                        <?php if ($crb_integrations_menu = carbon_get_post_meta($post->ID, 'crb_integrations_menu')):
                            foreach ($crb_integrations_menu as $item): ?>
                                <li onclick="filterCategory('<?php echo $item['title']; ?>')">
                                    <?php
                                        echo $item['title'];
                                    ?>
                                </li>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul> <!-- end .submenu -->

                    <div class="custom-dropdown table-display">
                        <div class="dropdown-selected" onclick="toggleDropdown()">Select Category</div>
                        <div class="dropdown-list hidden" id="dropdownList"></div>
                    </div>

                </div><!-- end .menu-content -->

                <div class="dictionary-single-content__wrapper">
                    <div class="integrations-grid">
                        <?php foreach ($crb_integrations_cards as $card) : ?>
                        <div class="integrations-card" data-category="<?php echo $card['crm']?>" >
                            <div class="card-header">
                                <?php echo wp_get_attachment_image($card['icon'], 'full',); ?>
                                <p><?php echo $card['upcoming']; ?></p>
                            </div>
                            <div class="card-body">
                                <p class="info"><?php echo $card['crm']; ?></p>
                                <h3><?php echo $card['title']; ?></h3>
                                <p><?php echo $card['text']; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href=""
                                   onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                                   class="card-button">
                                    <?php echo esc_html( $card['text_button'] ); ?>
                                </a>
                                <a href="<?php echo esc_url( $card['link'] ); ?>">
                                    <?php echo esc_html( $card['text_link'] ); ?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div> <!-- end .integrations-grid -->
                </div> <!-- end .dictionary-single-content__wrapper -->

            </div><!-- end .flex-row -->
            <div class="flex-row align-items-center justify-content-center">
                <button id="loadMore" class="load-more hidden" onclick="showMore()">Load More</button>
            </div>
        </div><!-- end .container -->
    </section>
<?php endif; ?>

<?php if ($crb_integrations_find_your_integration_title = carbon_get_post_meta($post->ID, 'crb_integrations_find_your_integration_title')): ?>
    <section class="software">
        <div class="container">
            <div class="software_text_image_wrapper ">
                <div class="software_text_block benefits__descr">
                    <div class="solutions-description__descr section-header">
                        <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                            <?php echo $crb_integrations_find_your_integration_title; ?>
                        </h2>
                    </div>
                    <?php if ($crb_integrations_find_your_integration_under_title = carbon_get_post_meta($post->ID, 'crb_integrations_find_your_integration_under_title')): ?>
                        <div class="solutions-description__text">
                            <?php echo $crb_integrations_find_your_integration_under_title; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="solutions-description__img">
                    <?php if ($crb_integrations_find_your_integration_under_image = carbon_get_post_meta($post->ID, 'crb_integrations_find_your_integration_under_image')): ?>
                        <?php echo wp_get_attachment_image($crb_integrations_find_your_integration_under_image, 'full',); ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($crb_software_gallery = carbon_get_post_meta($id_home, 'crb_software_gallery')): ?>
    <section class="software">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_software_title') ?>
                </h2>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_software_text') ?>
                </div>
            </div>
            <div class="software__items wow animate__animated animate__fadeInUp">
                <?php foreach ($crb_software_gallery as $image): ?>
                    <div class="software__item">
                        <div class="software__wrapp">
                            <div class="software__img">
                                <?php echo wp_get_attachment_image($image, 'full',); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

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
                if (category === 'Other' || category === 'Andere') {
                    if (card.dataset.category && !<?php  echo json_encode($categories); ?>.includes(card.dataset.category)) {
                        card.classList.add("showed");
                        card.classList.remove("hidden");
                    } else {
                        card.classList.add("hidden");
                        card.classList.remove("showed");
                    }
                    //card.style.display = (card.dataset.category && !<?php // echo json_encode($categories); ?>//.includes(card.dataset.category)) ? "block" : "none";
                } else {
                    if (category === 'All integrations' || category === 'Alle Integrationen' || card.dataset.category === category) {
                        card.classList.add("showed");
                        card.classList.remove("hidden");
                    } else {
                        card.classList.add("hidden");
                        card.classList.remove("showed");
                    }
                    // card.style.display = (category === 'All integrations' || category === 'Alle Integrationen' || card.dataset.category === category) ? "block" : "none";
                }
            });

            let card_showed = document.querySelectorAll(".integrations-card.showed");

            if (card_showed.length > 12) {
                for (let i = 12; i < cards.length; i++) {
                    cards[i].classList.add("hidden");
                    cards[i].classList.remove("showed");
                }
                document.getElementById("loadMore").classList.remove("hidden");
            } else {
                document.getElementById("loadMore").classList.add("hidden");
            }

        }

        function showMore() {
            let cards = document.querySelectorAll(".integrations-card.hidden");
            cards.forEach(card => card.classList.remove("hidden"));
            document.getElementById("loadMore").classList.add("hidden");
        }

        function toggleDropdown() {
            document.getElementById("dropdownList").classList.toggle("hidden");
        }

        document.addEventListener("DOMContentLoaded", function() {

            let cards = document.querySelectorAll(".integrations-card");
            if (cards.length > 9) {
                for (let i = 9; i < cards.length; i++) {
                    cards[i].classList.add("hidden");
                    cards[i].classList.remove("showed");
                }
                document.getElementById("loadMore").classList.remove("hidden");
            }

            let dropdownList = document.getElementById("dropdownList");
            categories.forEach(category => {
                let item = document.createElement("div");
                item.textContent = category;
                item.onclick = function () {
                    document.querySelector(".dropdown-selected").textContent = category;
                    filterCategory(category);
                    toggleDropdown();
                };
                dropdownList.appendChild(item);
            });
        });
    </script>

<?php
get_template_part('templates/footer-everything');
get_footer();
?>