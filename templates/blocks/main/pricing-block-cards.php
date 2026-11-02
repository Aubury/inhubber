<?php
/**
 * Block template file: templates/blocks/main/pricing-block-cards.php
 *
 * Pricing Block Cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pricing-block-cards-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-pricing-block-cards';
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

<section id="<?php echo esc_attr( $id ); ?>" class="features <?php echo esc_attr( $classes ); ?>">
    <div class="container">
       <div class="payment_period">
           <div class="period-choose-container">
               <div class="toggle-wrapper">
                   <span id="label-month" class="label">
                       <?php pll_e('Monthly'); ?>
                   </span>
                   <label class="switch">
                       <input type="checkbox" id="billing-toggle" checked>
                       <span class="slider"></span>
                   </label>

                   <span id="label-annual" class="label active">
                       <?php pll_e('Annually'); ?>
                   </span>
                   <span id="save-badge" class="save-label active">
                       <?php the_field( 'title_save_%' ); ?>
                   </span>
               </div>
           </div>

           <?php if ( have_rows( 'pricing_card' ) ) : ?>
               <div id="pricing-boxes" class="payment-list-cards pricing-boxes pricing-mode-annual">
                   <?php $index = 0; ?>
                   <?php while ( have_rows( 'pricing_card' ) ) : the_row(); ?>

                       <div class="payment-card">
                           <?php if ( $index == 1 ) : ?>
                               <div class="before-card">
                                   <?php pll_e('Most popular'); ?>
                               </div>
                           <?php endif; ?>

                           <?php if (get_sub_field('title_card')) : ?>
                                <div class="title_card">
                                    <?php the_sub_field( 'title_card' ); ?>
                                </div>
                           <?php endif; ?>

                           <?php if ( have_rows( 'monthly' ) ) : ?>
                               <?php while ( have_rows( 'monthly' ) ) : the_row(); ?>
                                   <div class="monthly">
                                       <div class="card-price">
                                           <?php the_sub_field( 'price' ); ?>
                                       </div>
                                       <div class="card-under-price">
                                           <?php the_sub_field( 'under_price' ); ?>
                                       </div>
                                   </div>
                               <?php endwhile; ?>
                           <?php endif; ?>

                           <?php if ( have_rows( 'annually' ) ) : ?>
                               <?php while ( have_rows( 'annually' ) ) : the_row(); ?>
                               <div class="annually">
                                   <div class="card-price">
                                       <?php the_sub_field( 'price' ); ?>
                                   </div>
                                   <div class="card-under-price">
                                       <?php the_sub_field( 'under_price' ); ?>
                                   </div>
                               </div>
                               <?php endwhile; ?>
                           <?php endif; ?>

                           <?php $button = get_sub_field( 'button' ); ?>
                           <?php if ( $button ) : ?>
                               <?php
                                     $index == 1 ? $class = '' : $class = 'white';
                                     $url = '';
                                     $onclick = '';

                                     if ( $button['url'] !== '#' ) :
                                         $url = $button['url'];
                                     else:
                                         $onclick = "Calendly.initPopupWidget({url:'" .  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()) . "' });return false;";
                                     endif;


                               ?>

                                   <a href="<?php echo esc_url( $url ); ?>"
                                      onclick="<?php echo esc_attr( $onclick ); ?>"
                                      class="btn-fill full-width <?php echo esc_attr( $class ); ?>">
                                       <?php echo esc_html( $button['title'] ); ?>
                                   </a>

                           <?php endif; ?>
                           <div class="pricing-card-list">
                               <div class="title-list">
                                   <?php the_sub_field( 'title_list' ); ?>
                               </div>
                               <?php if ( have_rows( 'list' ) ) : ?>
                                   <ul>
                                       <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                                           <li>
                                               <span>
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M1 8C1 4.13359 4.13359 1 8 1C11.8664 1 15 4.13359 15 8C15 11.8664 11.8664 15 8 15C4.13359 15 1 11.8664 1 8ZM11.1664 6.79141C11.4645 6.49336 11.4645 6.00664 11.1664 5.70859C10.8684 5.41055 10.3816 5.41055 10.0836 5.70859L7.125 8.66719L5.91641 7.45859C5.61836 7.16055 5.13164 7.16055 4.83359 7.45859C4.53555 7.75664 4.53555 8.24336 4.83359 8.54141L6.58359 10.2914C6.88164 10.5895 7.36836 10.5895 7.66641 10.2914L11.1664 6.79141Z" fill="#1DA364"/>
                                                    </svg>
                                                </span>
                                                <?php the_sub_field( 'text' ); ?>
                                           </li>
                                       <?php endwhile; ?>
                                   </ul>
                               <?php else : ?>
                                   <?php // No rows found ?>
                               <?php endif; ?>
                           </div>

                       </div>
                   <?php $index++; ?>
                   <?php endwhile; ?>
               </div>
           <?php else : ?>
               <?php // No rows found ?>
           <?php endif; ?>

           <div class="title-block-info">
               <?php if (get_field('title')) : ?>
                   <h3><?php the_field( 'title' ); ?></h3>
               <?php endif; ?>

               <?php if ( get_field('under_title')) : ?>
                   <div class="under_title">
                   <?php the_field( 'under_title' ); ?>
                   </div>
               <?php endif; ?>

               <?php $button = get_field( 'button' ); ?>
               <?php if ( $button ) :
                   $url = '';
                   $onclick = '';

                   if ( $button['url'] !== '#' ) :
                       $url = $button['url'];
                   else:
                       $onclick = "Calendly.initPopupWidget({url:'" .  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()) . "' });return false;";
                   endif;

               ?>

                   <a href="<?php echo esc_url( $url ); ?>"
                      onclick="<?php echo esc_attr( $onclick ); ?>"
                      class="btn-fill">
                       <?php echo esc_html( $button['title'] ); ?>
                   </a>

               <?php endif; ?>
           </div>


       </div>
    </div>
</section>

<script>
    const toggle = document.getElementById("billing-toggle");
    const labelMonth = document.getElementById("label-month");
    const labelAnnual = document.getElementById("label-annual");
    const saveBadge = document.getElementById("save-badge");
    const pricingBoxes = document.getElementById('pricing-boxes');
    const annually = document.getElementsByClassName('annually');
    const monthly = document.getElementsByClassName('monthly');


    toggle.addEventListener("change", () => {
        const isAnnual = toggle.checked;

        labelMonth.classList.toggle("active", !isAnnual);
        labelAnnual.classList.toggle("active", isAnnual);
        saveBadge.classList.toggle("active", isAnnual);

        pricingBoxes.classList.toggle('pricing-mode-annual', isAnnual);
        pricingBoxes.classList.toggle('pricing-mode-monthly', !isAnnual);
    });
</script>