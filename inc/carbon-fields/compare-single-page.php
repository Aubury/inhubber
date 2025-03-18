<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_compare_single_page' );

function crb_attach_theme_compare_single_page() {
    Container::make( 'post_meta', __('Compare single page','inhubber') )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/compare-single-page.php' )
        ->add_tab(__('Side-by-Side feature comparison'), array(
            Field::make( 'text', 'crb_feature_comparison_text', __( 'Text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Side-by-Side feature comparison'),

        ) );


}