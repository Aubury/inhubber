<?php 



use Carbon_Fields\Container;

use Carbon_Fields\Field;





add_action( 'carbon_fields_register_fields', 'crb_attach_theme_front_page' );

function crb_attach_theme_front_page() {

	$id_home = pll_get_post(get_option('page_on_front'));

	Container::make( 'post_meta', __('Home','inhubber') )

    ->where( 'post_id', '=', $id_home )

     ->add_tab( __('First block','inhubber'), array(

     		Field::make( 'text', 'crb_one_block_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Manage contracts fast and efficiently'),

     		Field::make( 'textarea', 'crb_one_block_text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Create, sign and store contracts securely. Automated document analysis by AI and deadline control. Free digital signature.'),

     		Field::make( 'text', 'crb_one_block_rating_stars', __( 'Rating Stars','inhubber' ) )
                ->set_required( true )->set_width( 50 )
                ->set_default_value('<span>4.9</span>/5'),

     		Field::make( 'media_gallery', 'crb_one_block_gallery', __( 'Images logo','inhubber' ) )
                ->set_required( false )->set_width( 50 )
                ->set_type( array( 'image' ) ),

     		//

     ))

      ->add_tab( __('Trusted by','inhubber'), array(

     		Field::make( 'text', 'crb_trusted_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Trusted by successful global companies'),


     		Field::make( 'media_gallery', 'crb_trusted_gallery', __( 'Images logo','inhubber' ) )->set_required( false )->set_width( 50 )->set_type( array( 'image' ) ),


     ))


      ->add_tab( __('Top features','inhubber'), array(

     		Field::make( 'text', 'crb_trusted_features_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Top features'),
     		Field::make( 'text', 'crb_trusted_features_subtitle', __( 'Subtitle','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Everything for successful contract management'),
     		Field::make( 'textarea', 'crb_trusted_features_text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 100 )->set_default_value('Inhubber brings together all the tools you need for storage, digital signatures, analysis, search, approval and more.'),

     		Field::make( 'complex', 'crb_trusted_features_info', __( 'Information','inhubber' ) )
				    ->add_fields( array(
				    	Field::make( 'select', 'size', __( 'Size block','inhubber' ) )
						->set_options( array(
							'big' => __('Big','inhubber' ),
							'small' => __('Small','inhubber' ),
							'width' => __('Full width','inhubber' )
						) )->set_required( true ),
				        Field::make( 'text', 'title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'textarea', 'text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'image', 'image', __( 'Image','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'image', 'image_table', __( 'Image Table','inhubber' ) )->set_required( true )->set_width( 50 ),
				    ) )->set_layout('tabbed-horizontal')

     		

     ))


            ->add_tab( __('Solutions','inhubber'), array(

     		Field::make( 'text', 'crb_trusted_solutions_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Solutions'),
     		Field::make( 'text', 'crb_trusted_solutions_subtitle', __( 'Subtitle','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Built for all types of teams and industries'),
     		

     		Field::make( 'complex', 'crb_trusted_solutions_info', __( 'Information','inhubber' ) )
				    ->add_fields( array(
				    	Field::make( 'separator', 'crb_separator_tab', __( 'Tab', 'inhubber' ) ),
				        Field::make( 'text', 'name', __( 'Name','inhubber' ) )->set_required( true )->set_width( 33 ),
				        Field::make( 'image', 'icon', __( 'Icon','inhubber' ) )->set_required( true )->set_width( 33 ),
				        Field::make( 'image', 'icon_active', __( 'Icon Active','inhubber' ) )->set_required( true )->set_width( 33 ),
				        Field::make( 'separator', 'crb_separator_desk', __( 'Description', 'inhubber' ) ),
				        Field::make( 'text', 'title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 33 ),
				        Field::make( 'image', 'image', __( 'Image','inhubber' ) )->set_required( true )->set_width( 33 ),
				        Field::make( 'text', 'url', __( 'Learn more url','inhubber' ) )->set_required( true )->set_default_value('#')->set_width( 33 ),
				        Field::make( 'rich_text', 'text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 100 ),
				    ) )->set_layout('tabbed-horizontal')

     		

     ))

      ->add_tab( __('Benefits','inhubber'), array(

     		Field::make( 'text', 'crb_trusted_benefits_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Benefits'),
     		Field::make( 'text', 'crb_trusted_benefits_subtitle', __( 'Subtitle','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Reduce costs, save time and minimize risks'),
     		
     		Field::make( 'complex', 'crb_trusted_benefits_info', __( 'Information','inhubber' ) )
				    ->add_fields( array(
				        Field::make( 'text', 'undertext', __( 'Undertext','inhubber' ) )->set_required( true )->set_width( 25 )->set_default_value('Up to'),
				        Field::make( 'number', 'number', __( 'Number','inhubber' ) )->set_required( true )->set_width( 25 )->set_default_value(0),
				        Field::make( 'text', 'title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'textarea', 'text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 100 ),
				        Field::make( 'text', 'overtext', __( 'Overtext','inhubber' ) )->set_required( false )->set_width( 100 ),
				    ) )->set_layout('tabbed-horizontal')

     		

     ))

        ->add_tab( __('Customer stories','inhubber'), array(

     		Field::make( 'text', 'crb_trusted_stories_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Customer stories'),
     		Field::make( 'text', 'crb_trusted_stories_subtitle', __( 'Subtitle','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('"Powerfully simple"'),

     		Field::make( 'textarea', 'crb_trusted_stories_text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 100 )->set_default_value('Our clients love how easy it is to manage contracts and improve the efficiency of their business.'),
     		
     		Field::make( 'complex', 'crb_trusted_stories_info', __( 'Stories','inhubber' ) )
				    ->add_fields( array(
				       Field::make( 'separator', 'crb_separator_author', __( 'Author', 'inhubber' ) ),
				        Field::make( 'text', 'author', __( 'Name Author','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'image', 'photo_authot', __( 'Photo Author','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'separator', 'crb_separator_company', __( 'Company', 'inhubber' ) ),
				        Field::make( 'text', 'company', __( 'Name Company','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'image', 'logo_company', __( 'Logo Company','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'separator', 'crb_separator_description', __( 'Description', 'inhubber' ) ),
				        Field::make( 'text', 'url', __( 'Link to history','inhubber' ) )->set_required( false )->set_default_value('')->set_width( 100 ),
				        Field::make( 'text', 'link_video', __( 'Link video','inhubber' ) )->set_width( 50 ),
				        Field::make( 'image', 'image', __( 'Image','inhubber' ) )->set_width( 50 ),
				        Field::make( 'textarea', 'text', __( 'Text','inhubber' ) )->set_required( false )->set_width( 100 ),

				    ) )->set_layout('tabbed-horizontal')

     		

     ))

        ->add_tab( __('Software','inhubber'), array(

     		Field::make( 'text', 'crb_software_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 100 )->set_default_value('Award winning CLM software'),
     		Field::make( 'textarea', 'crb_software_text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Inhubber is recognized as one of the best Contract Lifecycle Management tools.'),
     		
     		Field::make( 'media_gallery', 'crb_software_gallery', __( 'Images logo','inhubber' ) )->set_required( false )->set_width( 50 )->set_type( array( 'image' ) ),

     		

     ))

     ->add_tab( __('Resources','inhubber'), array(

     		Field::make( 'text', 'crb_resources_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Resources'),
     		Field::make( 'text', 'crb_resources_subtitle', __( 'Subtitle','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Get started easily'),

     		Field::make( 'textarea', 'crb_resources_text', __( 'Text','inhubber' ) )->set_required( true )->set_width( 100 )->set_default_value("Find the latest news, useful articles and e-books. Stay up to date with upcoming events or check out Inhubber's guides and features."),
     		

     		

     ))


     ->add_tab( __('faq','inhubber'), array(

     		Field::make( 'text', 'crb_faq_title', __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('FAQ'),
     		Field::make( 'textarea', 'crb_faq_text', __( 'text','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value("Can't find the answers to your questions?"),
     		Field::make( 'text', 'crb_faq_link', __( 'Link Contact sales','inhubber' ) )->set_required( true )->set_width( 100 )->set_default_value("#"),

     		
     		Field::make( 'complex', 'crb_faq', __( 'FAQ','inhubber' ) )
				    ->add_fields( array(
				        Field::make( 'text', 'question', __( 'Question','inhubber' ) )->set_required( true )->set_width( 50 ),
				        Field::make( 'textarea', 'answer', __( 'Answer','inhubber' ) )->set_required( true )->set_width( 50 ),

				    ) )->set_layout('tabbed-horizontal')

     		

     ));

      //Resources

}