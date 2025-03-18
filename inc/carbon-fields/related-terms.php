<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_related_terms' );

function crb_attach_theme_related_terms() {
    Container::make( 'post_meta', __('Related terms','inhubber') )
        ->where( 'post_type', '=', 'page' )
        ->where('post_id', '=', 2794)
        ->or_where('post_id', '=', 2826)

        ->add_tab( __('Related terms','inhubber'), array(
            Field::make( 'text', 'crb_related_terms_title', __( 'Title','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Related terms'),

            Field::make( 'association', 'crb_association', __( 'Association' ) )
                ->set_types( array(
                    array(
                        'type'      => 'post',
                        'post_type' => 'post',
                    )
                ) )
        ));
}
