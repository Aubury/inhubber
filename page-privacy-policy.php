<?php
/*
Template Name:Privacy Policy
Template Post Type: page
*/

get_header();
?>

<?php  if ( have_posts() ) :?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="offer">
        <div class="container">
            <div class="offer__wrapper">
                <div class="offer__header">
                    <h1><?php the_title(); ?></h1>
                    <div class="privacy-text">
                    <?php the_field( 'subtitle' ); ?>
                    </div>
                </div>
            </div>
        </div>
       </section>
       <section class="impressum-decription">
        <div class="container">
            <div class="impressum-decription__wrapper">
                <div class="impressum-decription__descr">
                    <div class="impressum-decription__descr-item _first">
                        <p>
                           <?php the_field( 'title_information' ); ?>                       

                        </p>
                    </div>
                    <?php if ( have_rows( 'information' ) ) : ?>
                     <?php while ( have_rows( 'information' ) ) : the_row(); ?>
                     <div class="impressum-decription__descr-item">
                     <?php the_sub_field( 'text' ); ?>
                     </div>
                     <?php endwhile; ?>
                     <?php endif; ?>

                  
                </div>
                <div class="impressum-decription__info">
                    <div class="impressum-decription__info-item">
                        <div class="impressum-decription__info-title">
                           <?php pll_e('Data Controller'); ?>
                        </div>
                        <div class="impressum-decription__info-text">
                        <?php the_field( 'data_controller' ); ?> <br>
                            <a href="malito:<?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section>

<?php endwhile; ?>


<?php endif; ?>



<?php get_footer(); ?>