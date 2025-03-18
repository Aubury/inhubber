<?php
/**
 * Block template file: templates/blocks/customers/dictionary-single-page.php
 *
 * Dictionary single blog Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id_home = pll_get_post(get_option('page_on_front'));
// Create id attribute allowing for custom "anchor" value.
$id = 'dictionary-single-blog-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'dictionary-single-blog';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="features overwiew-features-white pb-0 <?php echo esc_attr($classes); ?>">
    <div class="container flex-row">
          <div class="menu-content">
                <div class="menu-top-title" href="#">
                    <?php echo pll_e('On this page')?>
                </div>
                <?php if ( have_rows( 'menu' ) ) : ?>
                    <?php while ( have_rows( 'menu' ) ) : the_row(); ?>
                        <a href="#<?php the_sub_field( 'id_of_information_block' ); ?>">
                            <?php the_sub_field( 'title_of_information_block' ); ?>
                        </a>
                        <?php if ( have_rows( 'submenu' ) ) : ?>
                           <div class="submenu">
                               <?php while ( have_rows( 'submenu' ) ) : the_row(); ?>
                                   <?php if (!empty(get_sub_field('id_of_information_block'))
                                        && (!empty(get_sub_field('title_of_information_block')))) : ?>
                                       <a href="#<?php the_sub_field( 'id_of_information_block' ); ?>">
                                           <?php the_sub_field( 'title_of_information_block' ); ?>
                                       </a>
                                   <?php else: ?>
                                       <?php // No rows found ?>
                                   <?php endif; ?>
                               <?php endwhile; ?>
                           </div>

                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>

            <div class="dictionary-single-content__wrapper">
                <?php if (!empty(get_field('mane_title'))) : ?>
                    <div class="glossary-section-header blog-offer ">
                        <h1 class=""><?php the_field( 'mane_title' ); ?></h1>
                    </div>
                <?php else : ?>
                    <div class="glossary-section-header">
                        <h1 class="section-header__title"><?php the_title() ?></h1>
                    </div>
                <?php endif; ?>

                <?php if (!empty(get_field('description'))) :  ?>
                    <div class="text-gray offer__text"><?php the_field( 'description' ); ?></div>
                <?php else : ?>
                    <div class="text-gray offer__text"><?php the_excerpt(); ?></div>
                <?php endif; ?>

                <?php if ( have_rows( 'content' ) ) : ?>
                    <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                        <?php if (!empty(get_sub_field('big_title'))) : ?>
                            <h2 class="glossary-big-title" id="<?php the_sub_field( 'id_for_a_title' ); ?>">
                                <?php the_sub_field( 'big_title' ); ?>
                            </h2>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if (!empty(get_sub_field('small_title'))) : ?>
                            <h4 class="features__title" id="<?php the_sub_field( 'id_for_a_title' ); ?>">
                                <?php the_sub_field( 'small_title' ); ?>
                            </h4>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if (!empty(get_sub_field('information'))) : ?>
                            <p><?php the_sub_field( 'information' ); ?></p>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>

    </div>
</section>
