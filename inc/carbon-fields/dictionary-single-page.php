<?php
use Carbon_Fields\Container;
use Carbon_Fields\Block;
use Carbon_Fields\Field;

//add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
    $category_id = get_cat_ID( 'glossary' );

        Container::make( 'post_meta', 'Custom Fields for Dictionary' )
            ->where('post_type', '=', 'post')
            ->where( 'post_term', '=', array(
                'field' => 'term_id',
                'value' => $category_id,
                'taxonomy' => 'category',
            ))
            ->add_fields( array(

                Field::make( 'complex', 'menu', __('Menu') )
                    ->set_layout( 'tabbed-horizontal' )
                    ->set_width(40)
                    ->add_fields( 'Menu', array(
                        Field::make( 'text', 'title', __('Mane Title') ),
                        Field::make( 'text', 'link', __('Enter the ID of block from \'Information Block\'') ),

                        Field::make( 'complex', 'submenu', __('Set submenu') )
                            ->set_layout( 'tabbed-horizontal' )
                            ->add_fields( 'Submenu', array(
                                Field::make( 'text', 'title', __('Mane Title') ),
                                Field::make( 'text', 'link', __('Enter the ID of block') ),
                    ) )
                ) ),

                Field::make( 'complex', 'information', __('Information Block') )
                    ->set_layout( 'tabbed-horizontal' )
                    ->set_width(60)
                    ->add_fields( 'Block', array(
                        Field::make( 'text', 'big-title', __('Mane Title of block') ),
                        Field::make( 'text', 'title', __('Small Title') ),
                        Field::make( 'text', 'id', __('Enter the ID of block if necessary') ),
                        Field::make( 'rich_text', 'text', __('Text') ),

                    ) )
            ));

}

