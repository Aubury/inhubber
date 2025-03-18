<?php
/**
 * Block template file: templates/blocks/customers/glossary-header.php
 *
 * Glossary Header Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'glossary-header-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-glossary-header';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($id); ?>" class="single-offer <?php echo esc_attr($classes); ?>">
    <div class="container">
        <div class="single-offer__wrapper">
            <?php if ( get_field( 'image' ) ) : ?>
                <img class="mb-48" src="<?php the_field( 'image' ); ?>" />
            <?php endif ?>
            <?php if (get_field('over_title')): ?>
                <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php the_field('over_title'); ?>
                </div>
            <?php endif; ?>
            <?php if (get_field('title')): ?>
                <h1 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php the_field('title'); ?>
                </h1>
            <?php endif; ?>
            <?php if (get_field('under_title')): ?>
                <div class="offer__text">
                    <?php the_field('under_title'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="glossary-search-container">
            <input type="text"
                   id="glossary-search"
                   placeholder='Search' />
        </div>

        <div class="alphabet-row">
            <a href="#A">A</a>
            <a href="#B">B</a>
            <a href="#C">C</a>
            <a href="#D">D</a>
            <a href="#E">E</a>
            <a href="#F">F</a>
            <a href="#G">G</a>
            <a href="#H">H</a>
            <a href="#I">I</a>
            <a href="#J">J</a>
            <a href="#K">K</a>
            <a href="#L">L</a>
            <a href="#M">M</a>
            <a href="#N">N</a>
            <a href="#O">O</a>
            <a href="#P">P</a>
            <a href="#Q">Q</a>
            <a href="#R">R</a>
            <a href="#S">S</a>
            <a href="#T">T</a>
            <a href="#U">U</a>
            <a href="#V">V</a>
            <a href="#W">W</a>
            <a href="#X">X</a>
            <a href="#Y">Y</a>
            <a href="#Z">Z</a>
            <a href="#">#</a>
        </div>
    </div>

</section>