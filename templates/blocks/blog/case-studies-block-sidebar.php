<?php

/**
 * Block template file: templates/blocks/blog/case-studies-block-sidebar.php
 *
 * Case Studies Block Sidebar Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'case-studies-block-sidebar-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-case-studies-block-sidebar';
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

<section id="<?php echo esc_attr( $id ); ?>" class="main-content-blog-sidebar <?php echo esc_attr( $classes ); ?>">
    <div class="main-content-blog">
        <?php if ( have_rows( 'main_information_block' ) ) : ?>
            <?php while ( have_rows( 'main_information_block' ) ) : the_row(); ?>

                <?php $main_image = get_sub_field( 'main_image' ); ?>
                <?php if ( $main_image ) : ?>
                    <div class="stories__slide">
                        <div class="stories__slide-video">
                            <div class="stories__slide-img no-before">
                                <?php
                                    $dimensionsBig = inhubber_get_image_dimensions(
                                        array(
                                            'ID' => $main_image['id'],
                                        )
                                    );
                                ?>
                                <img src="<?php echo esc_url( $main_image['url'] ); ?>"
                                     width="<?php echo esc_attr( $dimensionsBig['width'] ); ?>"
                                     height="<?php echo esc_attr( $dimensionsBig['height'] ); ?>"
                                     alt="<?php echo esc_attr( $main_image['alt'] ); ?>"
                                     loading="lazy"
                                     decoding="async"/>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( have_rows( 'main_video' ) ) : ?>
                    <?php while ( have_rows( 'main_video' ) ) : the_row(); ?>
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php if ( $image ) : ?>
                            <div class="stories__slide">
                                <a href="<?php the_sub_field( 'link_video' ); ?>" class="stories__slide-video videoModal">
                                    <div class="stories__slide-img">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                    </div>
                                    <div class="stories__slide-play">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M25 40.382V23.618C25 22.8747 25.7823 22.3912 26.4472 22.7236L43.2111 31.1056C43.9482 31.4741 43.9482 32.5259 43.2111 32.8944L26.4472 41.2764C25.7823 41.6088 25 41.1253 25 40.382Z" fill="white"/>
                                            <rect x="1" y="1" width="62" height="62" rx="31" stroke="white" stroke-width="2"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if ( have_rows( 'benefits_counter' ) ) : ?>
                    <div class="benefits__items_blog">
                        <?php while ( have_rows( 'benefits_counter' ) ) : the_row(); ?>
                            <div class="benefits__item">
                                <div class="benefits__wrapp">
                                    <div class="benefits__undertext">
                                        <?php the_sub_field( 'over_counter_text' ); ?>
                                    </div>
                                    <div class="benefits__number">
                                        <span data-number="<?php the_sub_field( 'number' ); ?>">0</span>%
                                    </div>
                                    <div class="benefits__title">
                                        <?php the_sub_field( 'title' ); ?>
                                    </div>
                                    <div class="benefits__overtext">
                                        <?php the_sub_field( 'description' ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
                <?php if ( have_rows( 'information_block' ) ) : ?>
                    <?php while ( have_rows( 'information_block' ) ) : the_row(); ?>
                        <div class="information_block">
                            <div class="information-block-title">
                                <?php the_sub_field( 'title' ); ?>
                            </div>
                            <div class="information-block-text">
                                <?php the_sub_field( 'text' ); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="blog-sidebar">
        <?php if ( have_rows( 'sidebar' ) ) : ?>
        <?php while ( have_rows( 'sidebar' ) ) : the_row(); ?>

            <?php $logo_image = get_sub_field( 'logo_image' ); ?>
            <?php if ( $logo_image ) : ?>
                <div class="sidebar-logo">
                    <img src="<?php echo esc_url( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_image['alt'] ); ?>" />
                </div>
            <?php endif; ?>

            <?php if ( have_rows( 'title_and_description' ) ) : ?>
                <?php while ( have_rows( 'title_and_description' ) ) : the_row(); ?>

                    <?php if (get_sub_field('title')
                        || get_sub_field('description')
                        || get_sub_field( 'link' )
                    ) : ?>
                        <div class="sidebar-info-section">
                            <?php if ( get_sub_field('title')) : ?>
                                <h4><?php the_sub_field( 'title' ); ?></h4>
                            <?php endif; ?>

                            <?php if ( get_sub_field('description')) : ?>
                                <div class="description"><?php the_sub_field( 'description' ); ?></div>
                            <?php endif; ?>

                            <?php $link = get_sub_field( 'link' ); ?>
                            <?php if ( $link ) : ?>
                                <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'speaker_information' ) ) : ?>
                <?php while ( have_rows( 'speaker_information' ) ) : the_row(); ?>

                    <?php if ( get_sub_field('title')
                        || get_sub_field('image')
                        || get_sub_field('speaker_name')
                        || get_sub_field('speaker_position')
                    ) : ?>

                        <div class="sidebar-info-section">
                            <?php if ( get_sub_field('title')) : ?>
                                <h4><?php the_sub_field( 'title' ); ?></h4>
                            <?php endif; ?>

                            <div class="sidebar-speaker-info-section">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                                <div class="speaker-info">
                                    <?php if ( get_sub_field('speaker_name')) : ?>
                                        <div class="speaker-name">
                                            <?php the_sub_field( 'speaker_name' ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( get_sub_field( 'speaker_position' )) : ?>
                                        <div class="speaker-position">
                                            <?php the_sub_field( 'speaker_position' ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found ?>
    <?php endif; ?>
    </div>
</section>
<script>
    function numberIndex(selectorItem, stop = false) {
        const numberItem = document.querySelectorAll(selectorItem);

        if (numberItem.length > 0) {
            if (stop === false) {
                for (let index = 0; index < numberItem.length; index++) {
                    const element = numberItem[index];
                    const dataNum = Number(element.dataset.number);
                    const dataNumProcent = Math.round(dataNum * 0.1);
                    let i = dataNumProcent;

                    let timer = setInterval(() => {
                        if (i <= dataNum) {
                            element.textContent = i++;
                        }
                        if (i === (dataNum + 1)) {
                            clearInterval(timer);
                        }
                    }, 80);
                }
            }
        }
    }

    function animatedNumbersIndex() {
        const realize = document.querySelector('.benefits__items_blog');

        if (realize) {
            const elementPositionRealize = realize.offsetTop;
            const windowHeight = document.documentElement.clientHeight;
            let number = windowHeight / 100 * 20;

            window.addEventListener('scroll', () => {

                let position = window.pageYOffset + number;

                if (windowHeight + position >= elementPositionRealize) {
                    if (!realize.classList.contains('_stop')) {
                        numberIndex('.benefits__number span');
                    }
                    realize.classList.add('_stop');
                } else {
                    realize.classList.remove('_stop');
                }
            }
        );
        }
    }
    animatedNumbersIndex();
</script>