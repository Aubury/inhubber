<?php
/**
 * Block template file: templates/blocks/customers-single/customers-single-content.php
 *
 * Customers Single Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'customers-single-content-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-customers-single-content';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr( $id ); ?>" class="customers-single-content <?php echo esc_attr( $classes ); ?>">
<?php $video_image = get_field( 'video_image' ); ?>
<?php $link_video = get_field( 'link_video' ); ?>
            <div class="container">
                <div class="customers-single-content__wrapper">
                    <div class="customers-single-content__body">
                        <a href="<?php echo esc_url( $link_video['url'] ); ?>" class="stories__slide-video" target="<?php echo esc_attr( $link_video['target'] ); ?>">
                            <div class="stories__slide-img">
                                <img src="<?php echo esc_url( $video_image['url'] ); ?>" alt="<?php echo esc_attr( $video_image['alt'] ); ?>" />
                               
                            </div>
                            <div class="stories__slide-play">
                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M25 40.382V23.618C25 22.8747 25.7823 22.3912 26.4472 22.7236L43.2111 31.1056C43.9482 31.4741 43.9482 32.5259 43.2111 32.8944L26.4472 41.2764C25.7823 41.6088 25 41.1253 25 40.382Z"
                                        fill="white" />
                                    <rect x="1" y="1" width="62" height="62" rx="31" stroke="white"
                                        stroke-width="2" />
                                </svg>
                            </div>
                        </a>
                        <?php if ( have_rows( 'indicators' ) ) : ?>
                        <div class="customers-single-content__adventages">
                            <div class="customers-single-content__adventages-wrapper">
                            <?php while ( have_rows( 'indicators' ) ) : the_row(); ?>
                                <div class="customers-single-content__adventages-item">
                                    <div class="customers-single-content__adventages-label">
                                    <?php the_sub_field( 'label' ); ?>
                                    </div>
                                    <div class="customers-single-content__adventages-number">
                                    <?php the_sub_field( 'number' ); ?>
                                    </div>
                                    <div class="customers-single-content__adventages-title">
                                    <?php the_sub_field( 'title' ); ?>
                                    </div>
                                    <div class="customers-single-content__adventages-text">
                                    <?php the_sub_field( 'text' ); ?>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="customers-single-content__informnation">
                            <?php the_field( 'informnation' ); ?>
                        </div>
                    </div>
                    <div class="customers-single-content__description">
                        <div class="customers-single-content__description-logo">
                            <?php $logo_image = get_field( 'logo_image' ); ?>
	                     <?php if ( $logo_image ) : ?>
		                     <img src="<?php echo esc_url( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_image['alt'] ); ?>" />
	                     <?php endif; ?>
                        </div>
                        <div class="customers-single-content__description-item">
                            <div class="customers-single-content__description-name">
                            <?php the_field( 'name_company' ); ?>
                            </div>
                            <div class="customers-single-content__description-value">
                            <?php the_field( 'description_company' ); ?>
                           </div>
                           <?php $site_company = get_field( 'site_company' ); ?>
	                        <?php if ( $site_company ) : ?>
		                        <a href="<?php echo esc_url( $site_company['url'] ); ?>" target="<?php echo esc_attr( $site_company['target'] ); ?>"><?php echo esc_html( $site_company['title'] ); ?></a>
	                        <?php endif; ?>
                        </div>
                        <?php if ( have_rows( 'company_information' ) ) : ?>
		<?php while ( have_rows( 'company_information' ) ) : the_row(); ?>
                        <div class="customers-single-content__description-item">
                            <div class="customers-single-content__description-name">
                            <?php the_sub_field( 'name' ); ?>
                            </div>
                            <div class="customers-single-content__description-value">
                            <?php the_sub_field( 'description' ); ?>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'conversation' ) ) : ?>
                           <?php while ( have_rows( 'conversation' ) ) : the_row(); ?>
                        <div class="customers-single-content__description-item">
                            <div class="customers-single-content__description-name">
                            <?php the_field( 'title_conversation' ); ?>
                            </div>
                            <div class="customers-single-content__description-value">
                                <div class="stories__slide-info">
                                    <div class="stories__slide-avatar">
                                    <?php $photo = get_sub_field( 'photo' ); ?>
                                    <?php if ( $photo ) : ?>
				<img src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" />
			<?php endif; ?>
                                    </div>
                                    <div class="stories__slide-desc">
                                        <div class="stories__slide-name">
                                        <?php the_sub_field( 'name' ); ?>
                                        </div>
                                        <div class="stories__slide-work">
                                        <?php the_sub_field( 'work' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>