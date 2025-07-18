<?php
/**
 * Block template file: templates/blocks/main/clm-circle-nine-point.php
 *
 * Clm Circle Nine Point Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'clm-circle-nine-point-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-clm-circle-nine-point';
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

                <div class="circle-diagram-with-icon">
                    <?php if ( have_rows( 'information_outside_of_circle' ) ) : ?>
                        <ul class="steps-icons">
                            <?php

                            $total = count(get_field('information_outside_of_circle'));
                            $angle_step = 360 / $total;
                            $radius = 348 / 2; // фиксируем под .circle-diagram
                            $index = 0;
                            $i = 1;
                            ?>

                            <?php while ( have_rows( 'information_outside_of_circle' ) ) : the_row(); ?>

                                <?php

                                /**  steps icons */

                                $angle = (360 / $total) * $index - 90; // первый шаг сверху
                                $rad = deg2rad($angle);
                                // округлим до 2 знаков (точность + пиксель влево может съехать)
                                $x = round($radius * cos($rad), 2);
                                $y = round($radius * sin($rad), 2);


                                /** arrows on circle */
                                $offset = 24 + 4; // сколько пикселей вперёд вдоль круга
                                $angle_offset = rad2deg($offset / $radius); // угол смещения
                                $adjusted_angle = $angle - $angle_offset;
                                $arrow_rad = deg2rad($adjusted_angle);

                                $ax = round($radius * cos($arrow_rad), 2);
                                $ay = round($radius * sin($arrow_rad), 2);
                                $rotation = $adjusted_angle;
                                ?>

                                <div class="arrow-point" style="left: <?= $ax?>px; top: <?= $ay ?>px; transform: translate(-50%, -50%) rotate(<?= $rotation?>deg);"></div>
                                <li class="step step-icon step-<?php echo $i; ?>"style="--x: <?= $x ?>px; --y: <?= $y ?>px;">

                                    <?php $icon = get_sub_field( 'icon' ); ?>
                                    <?php if ( $icon ) : ?>
                                        <img class="icon"
                                             src="<?php echo esc_url( $icon['url'] ); ?>"
                                             alt="<?php echo esc_attr('icon' ); ?>" />
                                    <?php endif; ?>

                                </li>

                                <?php $index++; $i++; ?>
                            <?php endwhile; ?>
                        </ul>

                    <?php else : ?>
                        <?php // No rows found ?>
                    <?php endif; ?>


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
                        $radius = 316; // фиксируем под .circle-diagram

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
                            <li class="step steps-content step-<?php echo $i; ?>"style="--x: <?= $x ?>px; --y: <?= $y ?>px;">

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
                                    <div class="step-number">
                                        <?php $icon = get_sub_field( 'icon' ); ?>
                                        <?php if ( $icon ) : ?>
                                            <img class="icon"
                                                 src="<?php echo esc_url( $icon['url'] ); ?>"
                                                 alt="<?php echo esc_attr('icon' ); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="step-content">

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
        const container = document.querySelector('.circle-diagram-with-icon');
        const steps = document.querySelectorAll('.step-icon');
        const steps_content = document.querySelectorAll('.steps-content');
        const arrows = document.querySelectorAll('.arrow-point');

        if (steps.length === 0) return;

        const totalSteps = steps.length;
        const containerWidth = container.offsetWidth;
        const containerHeight = container.offsetHeight;
        // const parentHeight = containerHeight + steps_content[0].offsetHeight * 2 + 100;

        const centerX = container.offsetWidth / 2;
        const centerY = container.offsetHeight / 2;

        // parent.style.height = `${parentHeight}px`;

        console.log('totalSteps = ' + totalSteps);
        console.log('containerWidth = ' + containerWidth);
        console.log('containerHeight = ' + containerHeight);
        console.log('centerX = ' + centerX);
        console.log('centerY = ' + centerY);


        const radius = containerWidth / 2;
        console.log('radius = ' + radius);

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

        const radius_arrow = container.offsetWidth / 2; // чуть меньше радиуса иконок
        console.log('radius_arrow = ' + radius_arrow);

        arrows.forEach((arrow, i) => {
            const offset = 24 + 4;
            const angle_offset = (offset / radius) * (180 / Math.PI);
            const angle = ((360 / arrows.length) * i - 90) - angle_offset;
            const rad = angle * (Math.PI / 180);

            const x = Math.round(radius_arrow * Math.cos(rad) * 100) / 100;
            const y = Math.round(radius_arrow * Math.sin(rad) * 100) / 100;
            const rotation = angle;

            arrow.style.left = `${x}px`;
            arrow.style.top = `${y}px`;
            arrow.style.transform = `translate(-50%, -50%) rotate(${rotation}deg)`;
        });



        const stepSize = steps_content[0].offsetWidth; // предполагаем, что все .step одинаковой ширины
        const radius_content = container.offsetWidth / 2 + stepSize / 2 + 50;
        const parentHeight = radius_content * 2 + steps_content[0].offsetHeight;

        console.log('radius_content = ' + radius_content);
        console.log(steps_content);

        parent.style.height = `${parentHeight}px`;

        steps_content.forEach((step_content, index) => {
            const angle = (360 / totalSteps) * index - 90; // -90 = чтобы первый шаг был сверху
            const rad = angle * (Math.PI / 180); // deg2rad

            const x = Math.round(radius_content * Math.cos(rad) * 100) / 100;
            const y = Math.round(radius_content * Math.sin(rad) * 100) / 100;

            step_content.style.position = 'absolute';
            step_content.style.left = `${x}px`;
            step_content.style.top = `${y}px`;
            step_content.style.transform = 'translate(-50%, -50%)';
        });

    }


    // запуск
    window.addEventListener('load', positionSteps);
    window.addEventListener('resize', positionSteps);





</script>