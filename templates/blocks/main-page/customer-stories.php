<?php
/**
 * Block template file: templates/blocks/main-page/customer-stories.php
 *
 * Main Page   Customer Stories Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-page-customer-stories-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-main-page-customer-stories';
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

<section id="<?php echo esc_attr( $id ); ?>" class="benefits <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="flex-column-align-start">
            <div class="header-align-left">
                <div class="title-wrap-block">
                    <?php if (get_field('over_title')) : ?>
                        <div class="over-title">
                            <?php the_field( 'over_title' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('title')) : ?>
                        <h2>
                            <?php the_field( 'title' ); ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ( have_rows( 'customer_storie' ) ) : ?>
                <div class="stories-wrapper">
                    <div class="stories-slider swiper">
                        <div class="swiper-wrapper">
                            <?php while ( have_rows( 'customer_storie' ) ) : the_row(); ?>
                                <div class="stories-slide swiper-slide">
                                    <?php
                                        get_sub_field( 'display_image_or_video' ) === 'Image'
                                            ? $type = 'image' : $type = 'video';

                                        $link_video = get_sub_field('video');

                                        $link_video
                                            ? $begin_block = '<a href="' . $link_video . '" class="videoModal">'
                                            : $begin_block = '';

                                        $link_video
                                            ? $end_block = '</a>'
                                            : $end_block = '';

                                        $link_video
                                            ? $video_button = '<div class="stories__slide-play">
                                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M25 40.382V23.618C25 22.8747 25.7823 22.3912 26.4472 22.7236L43.2111 31.1056C43.9482 31.4741 43.9482 32.5259 43.2111 32.8944L26.4472 41.2764C25.7823 41.6088 25 41.1253 25 40.382Z"
                                                            fill="white"/>
                                                    <rect x="1" y="1" width="62" height="62" rx="31" stroke="white"
                                                          stroke-width="2"/>
                                                </svg>
                                            </div>'
                                            : $video_button = '';

                                    ?>
                                    <div class="stories-image-wrap">
                                        <?php echo $begin_block; ?>
                                        <?php echo $video_button; ?>

                                                <?php $image = get_sub_field( 'image' ); ?>
                                                <?php if ( $image ) : ?>
                                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                                <?php endif; ?>

                                                <div class="stories-image-overlay">
                                                    <?php if (get_sub_field('name_author')) : ?>
                                                        <div class="stories-slide-name">
                                                            <?php the_sub_field( 'name_author' ); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (get_sub_field('name_company')) : ?>
                                                        <div class="stories-slide-work">
                                                            <?php the_sub_field( 'name_company' ); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                        <?php echo $end_block; ?>
                                    </div>

                                    <div class="stories-information-wrap">
                                        <?php $icon = get_sub_field( 'icon' ); ?>
                                        <?php if ( $icon ) : ?>
                                            <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                        <?php endif; ?>

                                        <?php if (get_sub_field( 'text')) : ?>
                                            <div class="stories-text-wrap">
                                                <p>“<?php the_sub_field( 'text' ); ?>”</p>
                                            </div>
                                        <?php endif; ?>


                                        <?php if ( have_rows( 'benefits' ) ) : ?>
                                        <div class="store-benefits-wrap">
                                            <?php while ( have_rows( 'benefits' ) ) : the_row(); ?>
                                                <div class="store-benefits">
                                                    <?php if (get_sub_field('number')) : ?>
                                                        <div class="benefits__number">
                                                            <span data-number=" <?php the_sub_field( 'number' ); ?>">0</span>%
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (get_sub_field( 'text' )) : ?>
                                                        <p>
                                                            <?php the_sub_field( 'text' ); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                        <?php else : ?>
                                            <?php // No rows found ?>
                                        <?php endif; ?>


                                        <?php $link_to_story = get_sub_field( 'link_to_story' ); ?>
                                        <?php if ( $link_to_story ) : ?>
                                            <a href="<?php echo esc_url( $link_to_story['url'] ); ?>"
                                               class="store-link"
                                               target="<?php echo esc_attr( $link_to_story['target'] ); ?>">
                                                <?php echo esc_html( $link_to_story['title'] ); ?>
                                                →
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="stories-nav">
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M14.4157 5.24108L8.457 11.4601C8.31156 11.6106 8.23935 11.8057 8.23935 12C8.23935 12.1943 8.31156 12.3895 8.457 12.5399L14.4157 18.7589C14.7135 19.0712 15.2078 19.0813 15.5189 18.7823C15.8321 18.4854 15.8423 17.9889 15.5423 17.6788L10.075 11.9707L15.5414 6.32119C15.8414 6.01203 15.8312 5.51477 15.518 5.21765C15.2068 4.91857 14.7118 4.92899 14.4157 5.24108Z" fill="#ABA9B8"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M9.58432 5.24108L15.543 11.4601C15.6884 11.6106 15.7607 11.8057 15.7607 12C15.7607 12.1943 15.6884 12.3895 15.543 12.5399L9.58432 18.7589C9.28648 19.0712 8.79221 19.0813 8.4811 18.7823C8.16787 18.4854 8.15768 17.9889 8.4577 17.6788L13.925 11.9707L8.45864 6.32119C8.15863 6.01203 8.16881 5.51477 8.48204 5.21765C8.79319 4.91857 9.28817 4.92899 9.58432 5.24108Z" fill="#ABA9B8"/>
                            </svg>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </div>
</section>