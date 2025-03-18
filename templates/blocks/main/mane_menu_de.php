<?php
/**
 * Block template file: templates/blocks/main/mane_menu_de.php
 *
 * Mane Manu De Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-mane-manu-de';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>


<div class="bottom-header__nav <?php echo esc_attr( $classes ); ?>">
    <?php if ( have_rows( 'menu_de', 'option' ) ) : ?>


        <ul id="menu-main-menu" class="bottom-header__nav-list">
            <?php while ( have_rows( 'menu_de', 'option'  ) ) : the_row(); ?>

                <?php if ( get_sub_field('mane_title')) : ?>
                    <li class="bottom-header__nav-item bottom-header__nav-arrow menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children bottom-header__nav-item bottom-header__nav-item bottom-header__nav-arrow">

                        <a href="#"><?php the_sub_field( 'mane_title' ); ?></a>

                        <?php

                        $column_count = 0;

                        // Сначала считаем количество колонок
                        if (have_rows('column')) {
                            while (have_rows('column')) {
                                the_row();
                                $column_count++;
                            }
                        }

                        // Определяем CSS-класс
                        $column_class = ($column_count > 1) ? 'multiple-columns' : 'columns';
                        $single_column = ($column_count > 1) ? 'single-column' : '';
                        ?>

                        <?php if ( have_rows( 'column' ) ) : ?>
                            <ul class="bottom-header__nav-second <?php echo $column_class; ?>">

                                <?php while ( have_rows( 'column' ) ) : the_row(); ?>


                                    <div class="<?php echo $single_column; ?>">

                                        <?php if ( have_rows( 'icon_title' ) ) : ?>

                                            <?php while ( have_rows( 'icon_title' ) ) : the_row(); ?>
                                                <div class="flex-row icon_title">
                                                    <?php $icon = get_sub_field( 'icon' ); ?>
                                                    <?php if ( $icon ) : ?>
                                                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="icon" />
                                                    <?php endif; ?>
                                                    <span><?php the_sub_field( 'title' ); ?></span>
                                                </div>
                                            <?php endwhile; ?>

                                        <?php endif; ?>

                                        <?php if ( have_rows( 'page_url' ) ) : ?>

                                            <?php while ( have_rows( 'page_url' ) ) : the_row(); ?>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page bottom-header__nav-item">
                                                    <?php $url = get_sub_field( 'url' ); ?>
                                                    <?php if ( $url ) : ?>
                                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                                           class="dropdown-item">
                                                            <?php echo esc_html( $url['title'] ); ?>
                                                            <?php if (get_sub_field('text_under_url' )) : ?>
                                                                <span><?php the_sub_field( 'text_under_url' ); ?></span>
                                                            <?php endif; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endwhile; ?>

                                        <?php else : ?>
                                            <?php // No rows found ?>
                                        <?php endif; ?>

                                        <?php $url_to_mane_page_of_column = get_sub_field( 'url_to_mane_page_of_column' ); ?>
                                        <?php if ( $url_to_mane_page_of_column ) : ?>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page bottom-header__nav-item">
                                                <a href="<?php echo esc_url( $url_to_mane_page_of_column['url'] ); ?>"
                                                   class="dropdown-item link-icon">
                                                    <?php echo esc_html( $url_to_mane_page_of_column['title'] ); ?>

                                                    <span><img src="<?php echo get_template_directory_uri() ?>/assets/img/Chevron-right.svg"
                                                               alt="right"></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                    </div>
                                <?php endwhile; ?>
                            </ul>

                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>


                <?php $regular_link = get_sub_field( 'regular_link' ); ?>
                <?php if ( $regular_link ) : ?>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page bottom-header__nav-item">
                        <a href="<?php echo esc_url( $regular_link['url'] ); ?>"
                           class="nav-link">
                            <?php echo esc_html( $regular_link['title'] ); ?>
                        </a>
                    </li>
                <?php endif; ?>


            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <?php // No rows found ?>
    <?php endif; ?>

</div>