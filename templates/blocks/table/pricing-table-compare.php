<?php
/**
 * Block template file: templates/blocks/table/pricing-table-compare.php
 *
 * Pricing Table Compare Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pricing-table-compare-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-pricing-table-compare';
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

<section id="<?php echo esc_attr($id); ?>" class="software block-software <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="section-header full-width">
            <?php if ( have_rows( 'main_title' ) ) : ?>
                <?php while ( have_rows( 'main_title' ) ) : the_row(); ?>
                    <?php if (get_sub_field('over_title')) : ?>
                        <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                            <?php the_sub_field( 'over_title' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field('title')) : ?>
                        <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                            <?php the_sub_field( 'title' ); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (get_sub_field('under_title')) : ?>
                        <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                            <?php the_sub_field( 'under_title' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="table-toggle-wrapper">
                       <span id="table-label-month" class="label">
                           <?php pll_e('Monthly'); ?>
                       </span>
                        <label class="switch">
                            <input type="checkbox" id="table-billing-toggle" checked>
                            <span class="slider"></span>
                        </label>

                        <span id="table-label-annual" class="label active">
                               <?php pll_e('Annually'); ?>
                           </span>
                        <span id="table-save-badge" class="save-label active">
                               <?php the_sub_field( 'text_save_%' ); ?>
                           </span>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div id="table-pricing-boxes" class="table-wrapper table-pricing-mode-annual">
            <table>
                <theader>
                <?php if ( have_rows( 'table_header' ) ) : ?>
                    <tr>
                        <?php while ( have_rows( 'table_header' ) ) : the_row(); ?>

                            <th>
                                <?php if (get_sub_field('column_1')) : ?>
                                    <?php the_sub_field( 'column_1' ); ?>
                               <?php endif; ?>
                            </th>

                            <th>
                                <div class="payment-card">
                                    <?php if ( have_rows( 'column_2' ) ) : ?>

                                        <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>

                                            <?php if ( get_sub_field( 'most_popular' ) == 1 ) : ?>
                                                <div class="before-card">
                                                    <?php pll_e('Most popular'); ?>
                                                </div>
                                            <?php else : ?>
                                                <?php // echo 'false'; ?>
                                            <?php endif; ?>

                                            <div class="title_card">
                                                <?php the_sub_field( 'pricing_plan' ); ?>
                                            </div>

                                            <?php if ( have_rows( 'monthly' ) ) : ?>
                                                <?php while ( have_rows( 'monthly' ) ) : the_row(); ?>

                                                    <div class="table-monthly">
                                                        <div class="card-price">
                                                            <?php the_sub_field( 'price' ); ?>
                                                        </div>
                                                        <div class="card-under-price">
                                                            <?php the_sub_field( 'under_price_text' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php if ( have_rows( 'annually' ) ) : ?>
                                                <?php while ( have_rows( 'annually' ) ) : the_row(); ?>
                                                    <div class="table-annually">
                                                        <div class="card-price">
                                                            <?php the_sub_field( 'price' ); ?>
                                                        </div>
                                                        <div class="card-under-price">
                                                            <?php the_sub_field( 'under_price_text' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php $button = get_sub_field( 'button' ); ?>
                                            <?php if ( $button ) : ?>
                                                <?php get_sub_field( 'most_popular' ) == 1 ? $class = '' : $class = 'white';?>

                                                    <a href=""
                                                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                                                       class="btn-fill full-width <?php echo esc_attr( $class ); ?>">
                                                        <?php echo esc_html( $button['title'] ); ?></a>

                                            <?php endif; ?>

                                        <?php endwhile; ?>

                                    <?php endif; ?>
                                </div>
                            </th>

                            <th class="bg-gray">
                                <div class="payment-card bg-gray">
                                    <?php if ( have_rows( 'column_3' ) ) : ?>

                                        <?php while ( have_rows( 'column_3' ) ) : the_row(); ?>
                                            <?php if ( get_sub_field( 'most_popular' ) == 1 ) : ?>
                                                <div class="before-card">
                                                    <?php pll_e('Most popular'); ?>
                                                </div>
                                            <?php else : ?>
                                                <?php // echo 'false'; ?>
                                            <?php endif; ?>

                                            <div class="title_card">
                                                <?php the_sub_field( 'pricing_plan' ); ?>
                                            </div>

                                            <?php if ( have_rows( 'monthly' ) ) : ?>
                                                <?php while ( have_rows( 'monthly' ) ) : the_row(); ?>
                                                    <div class="table-monthly">
                                                        <div class="card-price">
                                                            <?php the_sub_field( 'price' ); ?>
                                                        </div>
                                                        <div class="card-under-price">
                                                            <?php the_sub_field( 'under_price_text' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php if ( have_rows( 'annually' ) ) : ?>
                                                <?php while ( have_rows( 'annually' ) ) : the_row(); ?>
                                                    <div class="table-annually">
                                                        <div class="card-price">
                                                            <?php the_sub_field( 'price' ); ?>
                                                        </div>
                                                        <div class="card-under-price">
                                                            <?php the_sub_field( 'under_price_text' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php $button = get_sub_field( 'button' ); ?>
                                            <?php if ( $button ) : ?>
                                                <?php get_sub_field( 'most_popular' ) == 1 ? $class = '' : $class = 'white';?>

                                                    <a href=""
                                                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                                                       class="btn-fill full-width <?php echo esc_attr( $class ); ?>">
                                                        <?php echo esc_html( $button['title'] ); ?></a>

                                            <?php endif; ?>
                                        <?php endwhile; ?>

                                    <?php endif; ?>
                                </div>
                            </th>

                            <th>
                                <div class="payment-card">
                                    <?php if ( have_rows( 'column_4' ) ) : ?>

                                        <?php while ( have_rows( 'column_4' ) ) : the_row(); ?>
                                            <?php if ( get_sub_field( 'most_popular' ) == 1 ) : ?>
                                                <div class="before-card">
                                                    <?php pll_e('Most popular'); ?>
                                                </div>
                                            <?php else : ?>
                                                <?php // echo 'false'; ?>
                                            <?php endif; ?>

                                            <div class="title_card">
                                                <?php the_sub_field( 'pricing_plan' ); ?>
                                            </div>

                                            <?php if ( have_rows( 'monthly' ) ) : ?>
                                                <?php while ( have_rows( 'monthly' ) ) : the_row(); ?>
                                                    <div class="table-monthly">
                                                        <div class="card-price">
                                                            <?php the_sub_field( 'price' ); ?>
                                                        </div>
                                                        <div class="card-under-price">
                                                            <?php the_sub_field( 'under_price_text' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php if ( have_rows( 'annually' ) ) : ?>
                                                <?php while ( have_rows( 'annually' ) ) : the_row(); ?>
                                                    <div class="table-annually">
                                                        <div class="card-price">
                                                            <?php the_sub_field( 'price' ); ?>
                                                        </div>
                                                        <div class="card-under-price">
                                                            <?php the_sub_field( 'under_price_text' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php $button = get_sub_field( 'button' ); ?>
                                            <?php if ( $button ) : ?>
                                                <?php get_sub_field( 'most_popular' ) == 1 ? $class = '' : $class = 'white';?>

                                                    <a href=""
                                                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;"
                                                       class="btn-fill full-width <?php echo esc_attr( $class ); ?>">
                                                        <?php echo esc_html( $button['title'] ); ?></a>

                                            <?php endif; ?>
                                        <?php endwhile; ?>

                                    <?php endif; ?>
                                </div>
                            </th>
                        <?php endwhile; ?>
                    </tr>
                <?php endif; ?>
            </theader>

                <tbody>
                    <?php if ( have_rows( 'subtable' ) ) : ?>
                            <?php while ( have_rows( 'subtable' ) ) : the_row(); ?>
                                <tr>
                                    <td colspan="4" class="table-title"><?php the_sub_field( 'title' ); ?></td>
                                </tr>

                                <?php if ( have_rows( 'row' ) ) : ?>

                                    <?php while ( have_rows( 'row' ) ) : the_row(); ?>
                                        <tr class="bg-hover">
                                            <td>
                                                <div class="justify-space-between">
                                                    <?php if ( have_rows( 'column_1' ) ) : ?>
                                                        <?php while ( have_rows( 'column_1' ) ) : the_row(); ?>

                                                            <?php if (get_sub_field( 'title' )) : ?>
                                                                <?php the_sub_field( 'title' ); ?>
                                                            <?php endif; ?>

                                                            <?php if (get_sub_field('information_text')) : ?>
                                                                <div class="tooltip-container">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                        <path d="M8 1C4.13359 1 1 4.13359 1 8C1 11.8664 4.13359 15 8 15C11.8664 15 15 11.8664 15 8C15 4.13359 11.8664 1 8 1ZM8 4.5C8.48316 4.5 8.875 4.89184 8.875 5.375C8.875 5.85816 8.48316 6.25 8 6.25C7.51684 6.25 7.125 5.85898 7.125 5.375C7.125 4.89102 7.51602 4.5 8 4.5ZM9.09375 11.5H6.90625C6.54531 11.5 6.25 11.2074 6.25 10.8438C6.25 10.4801 6.54395 10.1875 6.90625 10.1875H7.34375V8.4375H7.125C6.7627 8.4375 6.46875 8.14355 6.46875 7.78125C6.46875 7.41895 6.76406 7.125 7.125 7.125H8C8.3623 7.125 8.65625 7.41895 8.65625 7.78125V10.1875H9.09375C9.45605 10.1875 9.75 10.4814 9.75 10.8438C9.75 11.2061 9.45742 11.5 9.09375 11.5Z"/>
                                                                    </svg>
                                                                    <span class="tooltip-text">
                                                                        <?php the_sub_field( 'information_text' ); ?>
                                                                    </span>
                                                                </div>
                                                            <?php endif; ?>

                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php if ( have_rows( 'column_2' ) ) : ?>
                                                        <?php while ( have_rows( 'column_2' ) ) : the_row(); ?>

                                                            <?php if ( get_sub_field( 'image' ) ) : ?>
                                                                <img src="<?php the_sub_field( 'image' ); ?>" />
                                                            <?php endif ?>

                                                            <?php if ( get_sub_field( 'text' ) ) : ?>
                                                                <?php the_sub_field( 'text' ); ?>
                                                            <?php endif; ?>

                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td class="bg-gray">
                                                <div>
                                                    <?php if ( have_rows( 'column_3' ) ) : ?>
                                                        <?php while ( have_rows( 'column_3' ) ) : the_row(); ?>

                                                            <?php if ( get_sub_field( 'image' ) ) : ?>
                                                                <img src="<?php the_sub_field( 'image' ); ?>" />
                                                            <?php endif ?>

                                                            <?php if ( get_sub_field( 'text' ) ) : ?>
                                                                <?php the_sub_field( 'text' ); ?>
                                                            <?php endif; ?>

                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php if ( have_rows( 'column_4' ) ) : ?>
                                                        <?php while ( have_rows( 'column_4' ) ) : the_row(); ?>

                                                            <?php if ( get_sub_field( 'image' ) ) : ?>
                                                                <img src="<?php the_sub_field( 'image' ); ?>" />
                                                            <?php endif ?>

                                                            <?php if ( get_sub_field( 'text' ) ) : ?>
                                                                <?php the_sub_field( 'text' ); ?>
                                                            <?php endif; ?>

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
    </div>
</section>
<script>
    const _toggle = document.getElementById("table-billing-toggle");
    const _labelMonth = document.getElementById("table-label-month");
    const _labelAnnual = document.getElementById("table-label-annual");
    const _saveBadge = document.getElementById("table-save-badge");
    const _pricingBoxes = document.getElementById('table-pricing-boxes');
    const _annually = document.getElementsByClassName('table-annually');
    const _monthly = document.getElementsByClassName('table-monthly');


    _toggle.addEventListener("change", () => {
        const isAnnual = _toggle.checked;

        _labelMonth.classList.toggle("active", !isAnnual);
        _labelAnnual.classList.toggle("active", isAnnual);
        _saveBadge.classList.toggle("active", isAnnual);

        _pricingBoxes.classList.toggle('table-pricing-mode-annual', isAnnual);
        _pricingBoxes.classList.toggle('table-pricing-mode-monthly', !isAnnual);
    });
</script>
