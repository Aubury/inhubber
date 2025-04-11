<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_single_case_studies_fields' );

function crb_attach_theme_single_case_studies_fields() {

         Container::make( 'post_meta', __('Case studies - Sidebar','inhubber') )
             ->where( 'post_term', '=', array(
                 'field' => 'slug',
                 'value' => 'case-studies',
                 'taxonomy' => 'category',
             ))
            ->add_fields( array(
                Field::make( 'complex', 'crb_case_studies_sidebar', __( 'Sidebar','inhubber' ) )
                    ->set_max(10)
                    ->add_fields( array(
                        Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(10),
                        Field::make( 'textarea', 'title', __( 'Title' ) )->set_width(20),
                        Field::make( 'rich_text', 'text', __( 'Text' ) )->set_width(30),
                        Field::make( 'complex', 'url', __( 'URL' ) )
                            ->set_width(30)
                            ->set_max(1)
                            ->add_fields( array(
                                Field::make( 'text', 'text', __( 'Text for link' ) ),
                                Field::make( 'text', 'link', __( 'link' ) ),
                            )),
                    ) )
            ) );

}
