<?php 



use Carbon_Fields\Container;
use Carbon_Fields\Field;



add_action( 'carbon_fields_register_fields', 'crb_attach_theme_event' );

function crb_attach_theme_event() { 

	     Container::make( 'post_meta', 'Event' )

    ->where( 'post_type', '=', 'events' )

     ->add_tab( __('Main','inhubber'), array(

        Field::make( 'date', 'crb_event_start_date', __( 'Event Start Date','inhubber' ) )->set_required( true )->set_storage_format( 'Y-M-d' )->set_width( 33 ),
        Field::make( 'textarea', 'crb_event_desk', __( 'Description','inhubber' ) )->set_required( true )->set_rows( 3 )->set_width( 33 ),
        Field::make( 'text', 'crb_event_link', __( 'Link','inhubber' ) )->set_required( true )->set_default_value('#')->set_width( 33 ),

    ) )

     ->add_tab( __('Speaker','inhubber'), array(

        Field::make( 'complex', 'crb_event_slider', __( 'Photo','inhubber' ) )
    ->add_fields( array(
        Field::make( 'image', 'photo', __( 'Photo','inhubber' ) ),
    ) )->set_layout('tabbed-horizontal')

    ) )

      ->add_tab( __('Register','inhubber'), array(

        Field::make( 'text', 'crb_event_register', __( 'Register','inhubber' ) )->set_required( true )->set_default_value('#')

    ) );

}