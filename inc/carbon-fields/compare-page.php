<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_compare_page' );

function crb_attach_theme_compare_page() {

    Container::make( 'post_meta', __('Compare page','inhubber') )
        ->where( 'post_type', '=', 'page' )
        ->where('post_id', '=', 2523)
        ->or_where('post_id', '=', 2847)

        ->add_tab( __('Our solution','inhubber'), array(
            Field::make( 'text', 'crb_our_solution_text', __( 'Text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Our solution'),

            Field::make( 'text', 'crb_our_solution_title', __( 'Title','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('Optimize workflows, minimize risks, enhance efficiency'),

            Field::make( 'textarea', 'crb_our_solution_description', __( 'Description','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Inhubber offers maximum data security and transparency and with AI-based features, companies save valuable time and resources.'),

            Field::make( 'complex', 'crb_our_solution_cards', __( 'Cards' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->set_max(3)
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(20),
                    Field::make( 'text', 'title', __( 'Title' ) )->set_width(40),
                    Field::make( 'text', 'text', __( 'Text' ) )->set_width(40),
                ) )

            //

        ))

        ->add_tab( __('Key benefits', 'inhubber'), array(
            Field::make( 'text', 'crb_key_benefits_text', __( 'Text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Key benefits'),

            Field::make( 'text', 'crb_key_benefits_title', __( 'Title','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('What makes Inhubber unique?'),

            Field::make( 'complex', 'crb_key_benefits_cards', __( 'Cards' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(20),
                    Field::make( 'text', 'title', __( 'Title' ) )->set_width(40),
                    Field::make( 'textarea', 'text', __( 'Text' ) )->set_width(40),
                ) )
    ))

        ->add_tab( __('Comparison with alternatives', 'inhubber'), array(
            Field::make( 'text', 'crb_comparison_alternatives_text', __( 'Text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Key benefits'),

            Field::make( 'text', 'crb_comparison_alternatives_title', __( 'Title','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('What makes Inhubber unique?'),

            Field::make( 'complex', 'crb_comparison_alternatives_table', __( 'Table' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'features', __( 'Features' ) )->set_width(30),
                    Field::make( 'text', 'inhubber', __( 'Inhubber' ) )->set_width(30),
                    Field::make( 'text', 'competitors', __( 'Competitors' ) )->set_width(30),
                ) )

        ))

        ->add_tab( __('Comparison with solutions', 'inhubber'), array(

            Field::make( 'text', 'crb_comparison_solutions_title', __( 'Title','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('Compare Inhubber with other solutions'),

            Field::make( 'text', 'crb_comparison_solutions_text', __( 'Text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Discover how Inhubber stands out compared to other document and contract management solutions. Choose a provider from the list to view detailed comparisons.'),

            Field::make( 'complex', 'crb_comparison_solutions_cards', __( 'Cards' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'image', 'image', __( 'Image' ) )->set_width(10),
                    Field::make( 'text', 'title', __( 'Title' ) )->set_width(30),
                    Field::make( 'textarea', 'text', __( 'Short text' ) )->set_width(30),
                    Field::make( 'text', 'link', __( 'Link' ) )->set_width(30),
                ) )

        ))

        ->add_tab( __('Benefits', 'inhubber'), array(

            Field::make( 'text', 'crb_comparison_benefits_text', __( 'Text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('Benefits'),

            Field::make( 'text', 'crb_comparison_benefits_title', __( 'Title','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('How companies benefit from Inhubber'),


            Field::make( 'complex', 'crb_comparison_benefits_cards', __( 'Cards' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->set_max(3)
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon' ) )->set_width(10),
                    Field::make( 'text', 'title', __( 'Title' ) )->set_width(40),
                    Field::make( 'textarea', 'text', __( 'Text' ) )->set_width(40),
                ) )

        ))

        ->add_tab( __('comparison_faq','inhubber'), array(

            Field::make( 'text', 'crb_comparison_faq_title', __( 'Title','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value('FAQ'),

            Field::make( 'textarea', 'crb_comparison_faq_text', __( 'text','inhubber' ) )
                ->set_required( true )
                ->set_width( 50 )
                ->set_default_value("Can't find the answers to your questions?"),

            Field::make( 'text', 'crb_comparison_faq_link', __( 'Link Contact sales','inhubber' ) )
                ->set_required( true )
                ->set_width( 100 )
                ->set_default_value("#"),


            Field::make( 'complex', 'crb_comparison_faq', __( 'FAQ','inhubber' ) )
                ->add_fields( array(
                    Field::make( 'text', 'question', __( 'Question','inhubber' ) )
                        ->set_required( true )
                        ->set_width( 50 ),
                    Field::make( 'textarea', 'answer', __( 'Answer','inhubber' ) )
                        ->set_required( true )
                        ->set_width( 50 ),

                ) )->set_layout('tabbed-horizontal')
        ));

}