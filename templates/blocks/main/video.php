<?php
/**
 * Block template file: templates/blocks/main/video.php
 *
 * Video Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-video';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>


<section id="<?php echo esc_attr( $id ); ?>" class="offer about-us-offer <?php echo esc_attr( $classes ); ?>">
   <div class="container">
      <div class="offer__wrapper">

         <?php $image_video = get_field( 'image_video' ); ?>

         <div class="about-us-offer__video">
            <a href="<?php the_field( 'link' ); ?>" class="stories__slide-video videoModal">
               <div class="stories__slide-img">
                  <img src="<?php echo esc_url( $image_video['url'] ); ?>"
                     alt="<?php echo esc_attr( $image_video['alt'] ); ?>" />
               </div>
               <div class="stories__slide-play">
                  <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M25 40.382V23.618C25 22.8747 25.7823 22.3912 26.4472 22.7236L43.2111 31.1056C43.9482 31.4741 43.9482 32.5259 43.2111 32.8944L26.4472 41.2764C25.7823 41.6088 25 41.1253 25 40.382Z"
                        fill="white" />
                     <rect x="1" y="1" width="62" height="62" rx="31" stroke="white" stroke-width="2" />
                  </svg>
               </div>
            </a>
         </div>
      </div>
   </div>
</section>