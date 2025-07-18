<?php
/**
 * Block template file: templates/blocks/main/reminders-circle.php
 *
 * Reminders Circle Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'reminders-circle-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-reminders-circle';
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

<section id="<?php echo esc_attr( $id ); ?>" class="features overwiew-features-white software <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="section-header full-width">
            <?php if (get_field('over_title' )) : ?>
                <div class="section-header__overtitle">
                    <?php the_field( 'over_title' ); ?>
                </div>
            <?php endif; ?>

            <?php if (get_field('title')) : ?>
                <div class="section-header__title">
                    <?php the_field( 'title' ); ?>
                </div>
            <?php endif; ?>

            <?php if (get_field('under_title')) : ?>
                <div class="section-header__undertitle">
                    <?php the_field( 'under_title' ); ?>
                </div>
            <?php endif; ?>

        </div> <!-- end .section-header -->


        <div class="flex-row max-display-tablet">
            <div class="circle-process">

               <div class="circle-diagram">
                   <?php if ( have_rows( 'information_inside_the_circle' ) ) : ?>
                       <?php while ( have_rows( 'information_inside_the_circle' ) ) : the_row(); ?>
                           <div class="circle-center">
                               <div class="information_inside_the_circle">
                                   <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                   <div class="subtitle"><?php the_sub_field( 'subtitle' ); ?></div>
                               </div>
                           </div>
                       <?php endwhile; ?>
                   <?php endif; ?>
               </div>


                <?php if ( have_rows( 'information_outside_of_circle' ) ) : ?>
                    <ul class="steps">
                        <?php

                            $total = count(get_field('information_outside_of_circle'));
                            $angle_step = 360 / $total;
                            $radius = 300; // фиксируем под .circle-diagram

                            $index = 0;
                            $i = 1;
                        ?>

                        <?php while ( have_rows( 'information_outside_of_circle' ) ) : the_row(); ?>

                        <?php
                            $angle = (360 / $total) * $index - 90; // первый шаг сверху
                            $rad = deg2rad($angle);

                            // округлим до 2 знаков (точность + пиксель влево может съехать)
                            $x = round($radius * cos($rad), 2);
                            $y = round($radius * sin($rad), 2);

                        ?>
                        <li class="step step-<?php echo $i; ?>"style="--x: <?= $x ?>px; --y: <?= $y ?>px;">
                            <?php $icon = get_sub_field( 'icon' ); ?>
                            <?php if ( $icon ) : ?>
                                <img class="icon"
                                     src="<?php echo esc_url( $icon['url'] ); ?>"
                                     alt="<?php echo esc_attr('icon' ); ?>" />
                            <?php endif; ?>

                            <div class="step-info">
                                <?php if (get_sub_field('title')) : ?>
                                    <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                <?php endif; ?>

                                <?php if (get_sub_field('under_title')) : ?>
                                    <div class="subtitle"><?php the_sub_field( 'under_title' ); ?></div>
                                <?php endif; ?>
                            </div>
                        </li>

                            <?php $index++; $i++; ?>
                        <?php endwhile; ?>
                    </ul>

                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>

            </div> <!-- end .circle-process -->

        </div>

        <div class="max-display-mobile">
            <div class="flex-column">
                <div class="center-label">
                    <?php if ( have_rows( 'information_inside_the_circle' ) ) : ?>
                        <?php while ( have_rows( 'information_inside_the_circle' ) ) : the_row(); ?>

                                <div class="information_inside_the_circle">
                                    <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                    <div class="subtitle"><?php the_sub_field( 'subtitle' ); ?></div>
                                </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="flex-row">
                    <div class="vertical-steps"></div>
                    <div class="flex-column information_outside_of_circle">
                        <?php if ( have_rows( 'information_outside_of_circle' ) ) : ?>
                            <?php $index = 1; ?>
                            <?php while ( have_rows( 'information_outside_of_circle' ) ) : the_row(); ?>
                            <div class="step-block">
                                <div class="step-number"><?php echo $index; ?></div>
                                    <div class="step-content">
                                    <?php $icon = get_sub_field( 'icon' ); ?>
                                    <?php if ( $icon ) : ?>
                                        <img class="icon"
                                             src="<?php echo esc_url( $icon['url'] ); ?>"
                                             alt="<?php echo esc_attr('icon' ); ?>" />
                                    <?php endif; ?>

                                    <div class="step-info">
                                        <?php if (get_sub_field('title')) : ?>
                                            <div class="title"><?php the_sub_field( 'title' ); ?></div>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('under_title')) : ?>
                                            <div class="subtitle"><?php the_sub_field( 'under_title' ); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <?php $index++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end .container -->

</section>

<script>

    function positionSteps() {
        const parent = document.querySelector('.circle-process');
        const container = document.querySelector('.circle-diagram');
        const steps = document.querySelectorAll('.step');

        if (steps.length === 0) return;

        const totalSteps = steps.length;
        const containerWidth = container.offsetWidth;
        const containerHeight = container.offsetHeight;
        const stepSize = steps[0].offsetWidth; // предполагаем, что все .step одинаковой ширины
        const radius = container.offsetWidth / 2 + stepSize / 2 + 24;
        const parentHeight = radius * 2 + steps[2].offsetHeight;

        parent.style.height = `${parentHeight}px`;


        steps.forEach((step, index) => {
            const angle = (360 / totalSteps) * index - 90; // -90 = чтобы первый шаг был сверху
            const rad = angle * (Math.PI / 180); // deg2rad

            const x = Math.round(radius * Math.cos(rad) * 100) / 100;
            const y = Math.round(radius * Math.sin(rad) * 100) / 100;

            step.style.position = 'absolute';
            step.style.left = `${x}px`;
            step.style.top = `${y}px`;
            step.style.transform = 'translate(-50%, -50%)';
        });

    }

    // запуск
    window.addEventListener('load', positionSteps);
    window.addEventListener('resize', positionSteps);





</script>