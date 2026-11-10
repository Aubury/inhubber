<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_author_blog' );

function crb_author_blog() {

    Container::make( 'post_meta', __('Author Blog','inhubber') )
        ->where( 'post_term', '=', array(
            'field' => 'slug',
            'value' => 'news',
            'taxonomy' => 'category',
        ))
        ->add_fields( array(
            Field::make( 'complex', 'crb_author_blog', __( 'Author','inhubber' ) )
                ->set_max(10)
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(10),
                    Field::make( 'text', 'author_name', __( 'Author name' ) )->set_width(30),
                    Field::make( 'text', 'author_position', __( 'Author position' ) )->set_width(30),
                    Field::make( 'complex', 'url', __( 'URL' ) )
                        ->set_width(30)
                        ->set_max(1)
                        ->add_fields( array(
                            Field::make( 'image', 'icon', __( 'Icon for link' ) ),
                            Field::make( 'text', 'text', __( 'Text for link' ) ),
                            Field::make( 'text', 'link', __( 'link' ) ),
                        )),
                ) )
        ) );

    Container::make( 'post_meta', __('Author Blog','inhubber') )
        ->where( 'post_term', '=', array(
            'field' => 'slug',
            'value' => 'nachrichten',
            'taxonomy' => 'category',
        ))
        ->add_fields( array(
            Field::make( 'complex', 'crb_author_blog', __( 'Author','inhubber' ) )
                ->set_max(10)
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(10),
                    Field::make( 'text', 'author_name', __( 'Author name' ) )->set_width(30),
                    Field::make( 'text', 'author_position', __( 'Author position' ) )->set_width(30),
                    Field::make( 'complex', 'url', __( 'URL' ) )
                        ->set_width(30)
                        ->set_max(1)
                        ->add_fields( array(
                            Field::make( 'image', 'icon', __( 'Icon for link' ) ),
                            Field::make( 'text', 'text', __( 'Text for link' ) ),
                            Field::make( 'text', 'link', __( 'link' ) ),
                        )),
                ) )
        ) );

    Container::make( 'post_meta', __('Author Blog','inhubber') )
        ->where( 'post_term', '=', array(
            'field' => 'slug',
            'value' => 'case-studies',
            'taxonomy' => 'category',
        ))
        ->add_fields( array(
            Field::make( 'complex', 'crb_author_blog', __( 'Author','inhubber' ) )
                ->set_max(10)
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(10),
                    Field::make( 'text', 'author_name', __( 'Author name' ) )->set_width(30),
                    Field::make( 'text', 'author_position', __( 'Author position' ) )->set_width(30),
                    Field::make( 'complex', 'url', __( 'URL' ) )
                        ->set_width(30)
                        ->set_max(1)
                        ->add_fields( array(
                            Field::make( 'image', 'icon', __( 'Icon for link' ) ),
                            Field::make( 'text', 'text', __( 'Text for link' ) ),
                            Field::make( 'text', 'link', __( 'link' ) ),
                        )),
                ) )
        ) );

}
