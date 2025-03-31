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
        ))

        ->add_tab( __('Transform your retail contract','inhubber'), array(

            Field::make( 'text', 'crb_retail_contract_title', __( 'Title','inhubber' ) )
                ->set_default_value('Optimize Your Contract Management Today')
                ->set_width( 100 ),

            Field::make( 'textarea', 'crb_retail_contract_text', __( 'Text','inhubber' ) )
                ->set_default_value(' Streamline your business operations with our advanced contract management platform. Inhubber’s solution empowers you to identify cost-saving opportunities, strengthen supplier relationships, improve efficiency, and mitigate risks. Unlock the full potential of your operations with smarter contract management.')
                ->set_width( 100 ),

            Field::make( 'text', 'crb_retail_contract_button_title', __( 'Text button','inhubber' ) )
                ->set_default_value('Explore Inhubber')
                ->set_width( 50 ),

            Field::make( 'text', 'crb_retail_contract_button_link', __( 'Link','inhubber' ) )
                ->set_width( 50 ),

        ))



;


}
