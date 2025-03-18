<?php
/*
Template Name:test page
Template Post Type: page
*/

get_header();
?>

<?php  if ( have_posts() ) :?>

<?php while ( have_posts() ) : the_post(); 

$to = '	alexsk8888@gmail.com';
$subject = 'The subject';
$message = 'The message.';

// удалим фильтры, которые могут изменять заголовок $headers
// remove_all_filters( 'wp_mail_from' );
// remove_all_filters( 'wp_mail_from_name' );

$headers = array(
	'From: Me Myself <info@inhubber.com>',
	'content-type: text/html',
	'cc: John Q Codex <jqc@wordpress.org>',
	'cc: John2 Codex <j2qc@wordpress.org>',
	'bcc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
);

wp_mail( $to, $subject, $message, $headers );
?>
<section class="offer">
        <div class="container">
            <div class="offer__wrapper">
                <div class="offer__header">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
       </section>
       <section class="impressum-decription">
        <div class="container">
            <div class="impressum-decription__wrapper">
            <?php if ( have_rows( 'information' ) ) : ?>
                <div class="impressum-decription__descr">
                <?php while ( have_rows( 'information' ) ) : the_row(); ?>
                    <div class="impressum-decription__descr-item">
                        <h3>
                        <?php the_sub_field( 'title' ); ?>
                        </h3>
                        <?php the_sub_field( 'text' ); ?>
                    </div>
                    <?php endwhile; ?>

                    <div class="impressum-decription__descr-item _copyright">
                    <?php the_field( 'copyright' ); ?>
                    </div>
                </div>

                <?php endif; ?>

                <?php if ( have_rows( 'information_sd' ) ) : ?>
                <div class="impressum-decription__info">
                <?php while ( have_rows( 'information_sd' ) ) : the_row(); ?>
                    <div class="impressum-decription__info-item">
                        <div class="impressum-decription__info-title">
                        <?php the_sub_field( 'title' ); ?>
                        </div>
                        <div class="impressum-decription__info-text">
                        <?php the_sub_field( 'text' ); ?>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
       </section>


<?php endwhile; ?>


<?php endif; ?>



<?php get_footer(); ?>