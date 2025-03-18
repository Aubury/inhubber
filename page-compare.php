<?php
/*
Template Name:Compare
Template Post Type: page
*/

global $post;
$id_home = pll_get_post(get_option('page_on_front'));


get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}

?>


<?php if ($crb_our_solution_title = carbon_get_post_meta($post->ID, 'crb_our_solution_title')): ?>
<section class="features overwiew-features">
    <div class="container">
        <div class="section-header">
            <?php if ($crb_our_solution_text = carbon_get_post_meta($post->ID, 'crb_our_solution_text')): ?>
            <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                <?php echo $crb_our_solution_text ?>
            </div>
            <?php endif; ?>

            <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                <?php echo $crb_our_solution_title ?>
            </h2>

            <?php if ($crb_our_solution_description = carbon_get_post_meta($post->ID, 'crb_our_solution_description')): ?>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo $crb_our_solution_description ?>
                </div>
            <?php endif; ?>
        </div>

    <?php if ($crb_our_solution_cards = carbon_get_post_meta($post->ID, 'crb_our_solution_cards')): ?>
        <div class="overwiew-features__items">
            <?php foreach ($crb_our_solution_cards as $card) :
                if (!empty($card)) : ?>
                    <div class="overwiew-features__item">
                        <div class="overwiew-features__icon">
                            <?php echo wp_get_attachment_image($card['icon'], 'post-thumbnail', 'true') ?>
                        </div>
                        <div class="overwiew-features__title">
                            <?php echo $card['title'] ?>
                        </div>
                        <div class="overwiew-features__text">
                            <?php echo $card['text'] ?>
                        </div>
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    <?php endif; ?>
    </div>

</section>

<?php endif; ?>

<?php if ($crb_key_benefits_title = carbon_get_post_meta($post->ID, 'crb_key_benefits_title')): ?>
    <section class="features overwiew-features overwiew-features-white">
        <div class="container">
            <div class="section-header">
                <?php if ($crb_key_benefits_text = carbon_get_post_meta($post->ID, 'crb_key_benefits_text')): ?>
                <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                    <?php echo $crb_key_benefits_text; ?>
                </div>
                <?php endif; ?>
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo $crb_key_benefits_title; ?>
                </h2>
            </div>

        <?php if ($crb_key_benefits_cards = carbon_get_post_meta($post->ID, 'crb_key_benefits_cards')): ?>
            <?php foreach ($crb_key_benefits_cards as $index => $card) :
                if (!empty($card)) :
                    if ($index % 2 == 0) : ?>
                        <div class="overwiew-features__items">
                            <div class="overwiew__item">
                                <div class="overwiew-features__icon">
                                    <?php echo wp_get_attachment_image($card['icon'], 'post-thumbnail', 'true') ?>
                                </div>
                                <div class="overwiew-features__title">
                                    <?php echo $card['title'] ?>
                                </div>
                                <div class="overwiew-features__text">
                                    <?php echo $card['text'] ?>
                                </div>
                            </div>
                    <?php else: ?>
                        <div class="overwiew__item">
                            <div class="overwiew-features__icon">
                                <?php echo wp_get_attachment_image($card['icon'], 'post-thumbnail', 'true') ?>
                            </div>
                            <div class="overwiew-features__title">
                                <?php echo $card['title'] ?>
                            </div>
                            <div class="overwiew-features__text">
                                <?php echo $card['text'] ?>
                            </div>
                        </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
       <div>
    </section>

<?php endif; ?>

<?php if ($crb_comparison_alternatives_title = carbon_get_post_meta($post->ID, 'crb_comparison_alternatives_title')): ?>
   <section class="features overwiew-features overwiew-features-white hr">
       <div class="container">
           <div class="section-header">
               <?php if ($crb_comparison_alternatives_text = carbon_get_post_meta($post->ID, 'crb_comparison_alternatives_text')): ?>
                   <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                       <?php echo $crb_comparison_alternatives_text; ?>
                   </div>
               <?php endif; ?>
               <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                   <?php echo $crb_comparison_alternatives_title; ?>
               </h2>
           </div>
            <?php if ($crb_comparison_alternatives_table = carbon_get_post_meta($post->ID, 'crb_comparison_alternatives_table')): ?>
            <div class="table-wrapper">
            <table>
                <theader>
                    <tr>
                        <th>Features</th>
                        <th class="bg-gray"><?php if (carbon_get_theme_option('crb_options_logo' . carbon_lang_prefix())): ?>
                                <?php echo wp_get_attachment_image(carbon_get_theme_option('crb_options_logo' . carbon_lang_prefix()), 'full',); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/Logo.svg" alt="Logo">
                            <?php endif; ?>
                        </th>
                        <th>Competitors</th>
                    </tr>
                </theader>
                <tbody>
                    <?php foreach ($crb_comparison_alternatives_table as $index => $item) :
                    if (!empty($item)) : ?>
                        <tr>
                            <td>
                                <div>
                                    <?php echo $item['features']?>
                                </div>
                            </td>
                            <td class="bg-gray">
                                <div>
                                    <span>
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_6448_62138)">
                                        <path d="M16.0587 2.68049C16.4232 3.0164 16.4232 3.55956 16.0587 3.8633L6.62483 13.2971C6.32109 13.6616 5.77793 13.6616 5.44203 13.2971L0.583207 8.43728C0.248306 8.13354 0.248306 7.59038 0.583207 7.25448C0.918073 6.92215 1.46123 6.92215 1.79606 7.25448L6.04951 11.5104L14.8759 2.68049C15.2118 2.34674 15.7549 2.34674 16.0587 2.68049Z" fill="#1DA364"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_6448_62138">
                                        <rect width="16" height="16" fill="white" transform="translate(0.332031 0.000244141)"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                    </span>
                                    <?php echo $item['inhubber']?>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span>
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.3729 12.4683C14.7243 12.8188 14.7243 13.3874 14.3729 13.7379C14.0215 14.0884 13.4515 14.0884 13.1 13.7379L8.66858 9.28504L4.20562 13.7364C3.85424 14.0869 3.28415 14.0869 2.93274 13.7364C2.58133 13.3859 2.58136 12.8173 2.93274 12.4668L7.3972 8.01697L2.9315 3.53194C2.58013 3.18148 2.58013 2.61287 2.9315 2.26237C3.28287 1.91187 3.85297 1.91191 4.20438 2.26237L8.66858 6.74889L13.1315 2.29753C13.4829 1.94707 14.053 1.94707 14.4044 2.29753C14.7558 2.64799 14.7558 3.21661 14.4044 3.5671L9.93996 8.01697L14.3729 12.4683Z" fill="#C74137"/>
                                        </svg>
                                    </span>
                                    <?php echo $item['competitors']?>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>
       </div>
   </section>
<?php endif; ?>
<?php if ($crb_comparison_solutions_title = carbon_get_post_meta($post->ID, 'crb_comparison_solutions_title')): ?>
    <section class="features overwiew-features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo $crb_comparison_solutions_title ?>
                </h2>
                <?php if ($crb_comparison_solutions_text = carbon_get_post_meta($post->ID, 'crb_comparison_solutions_text')): ?>
                    <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                        <?php echo $crb_comparison_solutions_text ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($crb_comparison_solutions_cards = carbon_get_post_meta($post->ID, 'crb_comparison_solutions_cards')): ?>
                <div class="overwiew-features__items">
                    <?php foreach ($crb_comparison_solutions_cards as $index => $card) :
                        if (!empty($card)) : ?>
                        <div class="overwiew__item">
                            <a href="<?php echo $card['link'] ?>" class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <?php echo wp_get_attachment_image($card['image'], 'post-thumbnail', 'true') ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="overwiew-features__title"><?php echo $card['title'] ?></div>
                                        <div class="overwiew-features__text"><?php echo $card['text'] ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>
<?php if ($crb_comparison_benefits_title = carbon_get_post_meta($post->ID, 'crb_comparison_benefits_title')): ?>
     <div class="features overwiew-features  overwiew-features-white">
         <div class="container">
             <div class="section-header">
                 <?php if ($crb_comparison_benefits_text = carbon_get_post_meta($post->ID, 'crb_comparison_benefits_text')): ?>
                     <div class="section-header__overtitle wow animate__animated animate__fadeInUp">
                         <?php echo $crb_comparison_benefits_text; ?>
                     </div>
                 <?php endif; ?>
                 <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                     <?php echo $crb_comparison_benefits_title; ?>
                 </h2>
             </div>
         <?php if ($crb_comparison_benefits_cards = carbon_get_post_meta($post->ID, 'crb_comparison_benefits_cards')): ?>
             <div class="overwiew-features__items">
                 <?php foreach ($crb_comparison_benefits_cards as $card) :
                     if (!empty($card)) : ?>
                         <div class="overwiew-features__item">
                             <div class="overwiew-features__icon">
                                 <?php echo wp_get_attachment_image($card['icon'], 'post-thumbnail', 'true') ?>
                             </div>
                             <div class="overwiew-features__title">
                                 <?php echo $card['title'] ?>
                             </div>
                             <div class="overwiew-features__text">
                                 <?php echo $card['text'] ?>
                             </div>
                         </div>
                     <?php endif;
                 endforeach; ?>
             </div>
         <?php endif; ?>
         </div>
        </div>
     </section>
<?php endif; ?>
<?php if ($crb_software_gallery = carbon_get_post_meta($id_home, 'crb_software_gallery')): ?>
    <section class="software">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_software_title') ?>
                </h2>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($id_home, 'crb_software_text') ?>
                </div>
            </div>
            <div class="software__items wow animate__animated animate__fadeInUp">
                <?php foreach ($crb_software_gallery as $image): ?>
                    <div class="software__item">
                        <div class="software__wrapp">
                            <div class="software__img">
                                <?php echo wp_get_attachment_image($image, 'full',); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php if ($faqs = carbon_get_post_meta($post->ID, 'crb_comparison_faq')): ?>
    <section class="faq faq-owerview block-faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($post->ID, 'crb_comparison_faq_title'); ?>
                </h2>
                <div class="section-header__undertitle wow animate__animated animate__fadeInUp">
                    <?php echo carbon_get_post_meta($post->ID, 'crb_comparison_faq_text'); ?>
                    <a href=""
                       onclick="Calendly.initPopupWidget({url: '<?php echo  carbon_get_theme_option('crb_options_menu_request' . carbon_lang_prefix()); ?>' });return false;">
                        <?php pll_e('Contact sales'); ?> →
                    </a>
                </div>
            </div>
            <div class="faq__items">
                <?php foreach ($faqs as $item): ?>
                    <div class="faq__item wow animate__animated animate__fadeInUp">
                        <div class="faq__header">
                            <div class="faq__title">
                                <?php echo $item['question'] ?>
                            </div>
                            <div class="faq__icon">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 7C0 3.13359 3.13359 0 7 0C10.8664 0 14 3.13359 14 7C14 10.8664 10.8664 14 7 14C3.13359 14 0 10.8664 0 7ZM7 10.0625C7.36367 10.0625 7.65625 9.76992 7.65625 9.40625V7.65625H9.40625C9.76992 7.65625 10.0625 7.36367 10.0625 7C10.0625 6.63633 9.76992 6.34375 9.40625 6.34375H7.65625V4.59375C7.65625 4.23008 7.36367 3.9375 7 3.9375C6.63633 3.9375 6.34375 4.23008 6.34375 4.59375V6.34375H4.59375C4.23008 6.34375 3.9375 6.63633 3.9375 7C3.9375 7.36367 4.23008 7.65625 4.59375 7.65625H6.34375V9.40625C6.34375 9.76992 6.63633 10.0625 7 10.0625Z"
                                        fill="#ABA9B8"/>
                                </svg>
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 7C0 3.13359 3.13359 0 7 0C10.8664 0 14 3.13359 14 7C14 10.8664 10.8664 14 7 14C3.13359 14 0 10.8664 0 7ZM4.59375 6.34375C4.23008 6.34375 3.9375 6.63633 3.9375 7C3.9375 7.36367 4.23008 7.65625 4.59375 7.65625H9.40625C9.76992 7.65625 10.0625 7.36367 10.0625 7C10.0625 6.63633 9.76992 6.34375 9.40625 6.34375H4.59375Z"
                                        fill="#ABA9B8"/>
                                </svg>
                            </div>
                        </div>
                        <div class="faq__body">
                            <div class="faq__text">
                                <?php echo $item['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
    get_template_part('templates/footer-everything');
    get_footer();
?>