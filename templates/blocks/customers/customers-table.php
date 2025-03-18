<?php
/**
 * Block template file: templates/blocks/customers/customers-table.php
 *
 * Compare Header Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id_home = pll_get_post(get_option('page_on_front'));
// Create id attribute allowing for custom "anchor" value.
$id = 'customers-table-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customers-table';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="features overwiew-features overwiew-features-white hr <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="section-header">

                <?php if ( have_rows( 'header_title' ) ) : ?>
                    <?php while ( have_rows( 'header_title' ) ) : the_row(); ?>
                        <?php if (get_sub_field('overtitle')): ?>
                            <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                                <?php the_sub_field('overtitle'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('title')): ?>
                            <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                                <?php the_sub_field('title'); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (get_sub_field('text')): ?>
                            <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                                <?php the_sub_field('text'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

        </div>

        <?php if (have_rows( 'table-header')): ?>
            <div class="table-wrapper">
                <table>
                    <theader>
                        <?php if ( have_rows( 'table-header' ) ) : ?>
                            <?php while ( have_rows( 'table-header' ) ) : the_row(); ?>
                               <th>
                                   <?php the_sub_field( 'column_1' ); ?>
                               </th>
                               <th class="bg-gray">
                                   <?php if (get_sub_field('column_2')): ?>
                                       <img src="<?php the_sub_field( 'column_2' ); ?>" />
                                   <?php else: ?>
                                       <?php if (carbon_get_theme_option('crb_options_logo' . carbon_lang_prefix())): ?>
                                           <?php echo wp_get_attachment_image(carbon_get_theme_option('crb_options_logo' . carbon_lang_prefix()), 'full',); ?>
                                       <?php else: ?>
                                           <img src="<?php echo get_template_directory_uri() ?>/assets/img/Logo.svg" alt="Logo">
                                       <?php endif; ?>
                                   <?php endif; ?>
                               </th>
                               <th>
                                   <?php the_sub_field( 'column_3' ); ?>
                               </th>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </theader>
                    <tbody>
                        <?php if ( have_rows( 'row' ) ) : ?>
                            <?php while ( have_rows( 'row' ) ) : the_row(); ?>
                            <tr>
                                <td><div><?php the_sub_field( 'column_1' ); ?></div></td>
                                <td class="bg-gray">
                                    <div>
                                        <?php if ( have_rows( 'column_2' ) ) : ?>
                                            <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>
                                                <?php if ( get_sub_field( 'image' ) ) : ?>
                                                    <span><img src="<?php the_sub_field( 'image' ); ?>" /></span>
                                                <?php endif ?>
                                                <?php the_sub_field( 'text' ); ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php if ( have_rows( 'column_3' ) ) : ?>
                                            <?php while ( have_rows( 'column_3' ) ) : the_row(); ?>
                                                <?php if ( get_sub_field( 'image' ) ) : ?>
                                                    <span><img src="<?php the_sub_field( 'image' ); ?>" /></span>
                                                <?php endif ?>
                                                <?php the_sub_field( 'text' ); ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'subtable' ) ) : ?>
                            <?php while ( have_rows( 'subtable' ) ) : the_row(); ?>
                               <tr><td colspan="3" class="table-title"><?php the_sub_field( 'title' ); ?></td></tr>
                                <?php if ( have_rows( 'row' ) ) : ?>
                                    <?php while ( have_rows( 'row' ) ) : the_row(); ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php the_sub_field( 'column_1' ); ?>
                                                </div>
                                            </td>
                                            <td class="bg-gray">
                                                <div>
                                                    <?php if ( have_rows( 'column_2' ) ) : ?>
                                                        <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>
                                                            <?php if ( get_sub_field( 'image' ) ) : ?>
                                                                <span><img src="<?php the_sub_field( 'image' ); ?>" /></span>
                                                            <?php endif ?>
                                                                <?php the_sub_field( 'text' ); ?>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php if ( have_rows( 'column_3' ) ) : ?>
                                                        <?php while ( have_rows( 'column_3' ) ) : the_row(); ?>
                                                            <?php if ( get_sub_field( 'image' ) ) : ?>
                                                                <span><img src="<?php the_sub_field( 'image' ); ?>" /></span>
                                                            <?php endif ?>
                                                            <?php the_sub_field( 'text' ); ?>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <?php // No rows found ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>
