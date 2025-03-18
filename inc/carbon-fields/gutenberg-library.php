<?php


use Carbon_Fields\Block;

use Carbon_Fields\Field;

add_action('after_setup_theme', 'crb_block_gutenber_library');

function crb_block_gutenber_library()
{


    Block::make('library-block-text', __('Library Block Text', 'inhubber'))
        ->add_fields(array(

            Field::make('rich_text', 'library_text', __('Text', 'inhubber'))->set_width(100),
            Field::make('rich_text', 'library_text_results', __('Block results', 'inhubber'))->set_width(50),
            Field::make('rich_text', 'library_short_text', __('Short Text', 'inhubber'))->set_width(50)

        ))
        ->set_category('library')
        ->set_icon('book')
        ->set_description(__('Library Block Text', 'inhubber'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {


            ?>

            <div class="library-single-content__info">
                <?php if ($fields['library_text']): ?>
                    <div class="library-single-content__text">
                        <?php echo wpautop($fields['library_text']); ?>
                    </div>
                <?php endif; ?>

                <div class="library-single-content__descr">
                    <?php if ($fields['library_text_results']): ?>
                        <?php echo wpautop($fields['library_text_results']); ?>
                    <?php endif; ?>
                    <?php if ($fields['library_short_text']): ?>
                        <div class="library-single-content__text">
                            <?php echo wpautop($fields['library_short_text']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <?php

        });


    Block::make('library-block-file', __('Library Download File', 'inhubber'))
        ->add_fields(array(

            Field::make('image', 'library_file_img', __('Image', 'inhubber'))->set_width(50),
            Field::make('text', 'hubspot_form_shortcode', __('Hubspot form shortcode', 'inhubber'))->set_required(false)->set_width(200),
            Field::make('text', 'library_file', __('Library Download File', 'inhubber'))->set_required(false)->set_width(50),

        ))
        ->set_category('library')
        ->set_icon('book')
        ->set_description(__('Library Download File', 'inhubber'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            if (get_the_ID()) {
                $library_id = get_the_ID();
            } else {
                $library_id = null;
            }

            ?>

            <div class="library-single-content__image">
                <?php if ($fields['library_file_img']): ?>
                    <?php echo wp_get_attachment_image($fields['library_file_img'], 'full',); ?>
                <?php else: ?>
                    <?php echo get_the_post_thumbnail($library_id, 'full') ?>
                <?php endif; ?>
                <?php if ($fields['hubspot_form_shortcode']): ?>
                    <?php echo $fields['hubspot_form_shortcode'] ?>
                <?php endif; ?>
                <?php if ($fields['library_file']): ?>
                    <a href="<?php echo $fields['library_file'] ?>" download
                       class="btn-fill"><?php pll_e('Download free eBook'); ?></a>
                <?php endif; ?>
            </div>

            <?php

        });


}
   