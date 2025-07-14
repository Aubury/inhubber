<?php
/**
 * Block template file: templates/blocks/table/simple-information-block.php
 *
 * Table Two Columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'table-two-columns-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-table-two-columns';
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

<section id="<?php echo esc_attr( $id ); ?>" class="software block-software <?php echo esc_attr( $classes ); ?>">
    <div class="container standard-block-gap">
        <div class="section-header full-width">
            <?php if (get_field('title')) : ?>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php the_field( 'title' ); ?>
                </h2>
            <?php endif; ?>
        </div>

        <div class="table-wrapper table-two-columns">
            <table>
                <thead>

                    <?php if ( have_rows( 'table_header' ) ) : ?>
                        <tr>
                            <?php while ( have_rows( 'table_header' ) ) : the_row(); ?>
                                <th>
                                    <?php the_sub_field( 'column_1' ); ?>
                                </th>
                                <th>
                                    <?php the_sub_field( 'column_2' ); ?>
                                </th>
                            <?php endwhile; ?>
                        </tr>
                    <?php endif; ?>

                </thead>
                <tbody>
                    <?php if ( have_rows( 'row' ) ) : ?>
                        <?php while ( have_rows( 'row' ) ) : the_row(); ?>
                           <tr>
                                <?php if ( have_rows( 'column_1' ) ) : ?>
                                    <td>
                                        <?php while ( have_rows( 'column_1' ) ) : the_row(); ?>
                                            <?php $icon = get_sub_field( 'icon' ); ?>
                                            <?php if ( $icon ) : ?>
                                                <img class="icon" src="<?php echo esc_url( $icon['url'] ); ?>" alt="icon" />
                                            <?php endif; ?>
                                            <?php the_sub_field( 'text' ); ?>
                                        <?php endwhile; ?>
                                    </td>
                                <?php endif; ?>

                                <td>
                                    <?php the_sub_field( 'column_2' ); ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</section>