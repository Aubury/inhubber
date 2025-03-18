<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_integrations_page' );

function crb_attach_theme_integrations_page() {

    Container::make( 'post_meta', __('Integrations page','inhubber') )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/integrations-page.php' )

        ->add_tab( __('Section header','inhubber'), array(
            Field::make( 'text', 'crb_integrations_title', __( 'Title','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Explore contract management platform integrations'),

            Field::make( 'text', 'crb_integrations_under_title', __( 'Under title','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('We’re continuously expanding our integrations.'),

        ))

        ->add_tab( __('Menu and cards block', 'inhubber'),
            array(
            Field::make( 'complex', 'crb_integrations_menu', __( 'Menu','inhubber' ) )
                ->add_fields( array(
                    Field::make( 'text', 'title', __( 'Menu Title' ) ),
                ) ),

            Field::make( 'complex', 'crb_integrations_cards', __( 'Cards' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(50),
                    Field::make( 'text', 'upcoming', __( 'Upcoming' ) )
                        ->set_default_value( __( 'Upcoming', 'inhubber' ) )
                        ->set_width(50),
                    Field::make( 'text', 'crm', __( 'CRM' ) )
                        ->set_default_value( __( 'CRM', 'inhubber' ) )
                        ->set_width(100),
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_default_value( __( 'HubSpot CPQ', 'inhubber' ) )
                        ->set_width(100),
                    Field::make( 'textarea', 'text', __( 'Text' ) )
                        ->set_default_value( __( 'Explore our smart document management', 'inhubber' ) )
                        ->set_width(100),
                    Field::make( 'text', 'text_button', __( 'Text for button' ) )
                        ->set_default_value( __( 'Book a demo', 'inhubber' ) )
                        ->set_width(40),
                    Field::make( 'text', 'text_link', __( 'Text for link' ) )
                        ->set_default_value( __( 'Read more', 'inhubber' ) )
                        ->set_width(40),
                    Field::make( 'text', 'link', __( 'Link for "Read more"' ) )
                        ->set_default_value( __( '#', 'inhubber' ) )
                        ->set_width(40),
                ) )
        ))

        ->add_tab( __('Section "Can\'t find your integration?"','inhubber'), array(
            Field::make( 'text', 'crb_integrations_find_your_integration_title', __( 'Title','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Can\'t find your integration? We’ll add it for you!'),

            Field::make( 'textarea', 'crb_integrations_find_your_integration_under_title', __( 'Under title','inhubber' ) )
                ->set_required( true )->set_width( 100 )
                ->set_default_value('We can build a custom integration just for you. Say goodbye to contract management chaos and enjoy a smoother, smarter workflow. Let’s discuss how we can support you. '),

            Field::make( 'image', 'crb_integrations_find_your_integration_under_image', __( 'Image' ) )->set_width(50),

        ))

        ;

}