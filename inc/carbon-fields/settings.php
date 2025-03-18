<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
   Container::make('theme_options', __('Theme Options'))
      ->add_tab(__('Header Video', 'inhubber'), array(

         Field::make( 'text', 'crb_options_header_video_text'.carbon_lang_prefix(), __('Text', 'inhubber') )->set_default_value('Join a live product demo of the Inhubber platform with CEO Dr. Elena Mechik')->set_width( 50 ),

         Field::make( 'text', 'crb_options_header_video_register'.carbon_lang_prefix(), __('Register url', 'inhubber') )->set_default_value('#')->set_required( true )->set_width( 50 ),

      ))

      ->add_tab(__('Logo', 'inhubber'), array(

         Field::make( 'image', 'crb_options_logo'.carbon_lang_prefix(), __('Logo', 'inhubber') )->set_width( 50 ),


      ))

       ->add_tab(__('Menu links', 'inhubber'), array(

         Field::make( 'text', 'crb_options_menu_link_sign'.carbon_lang_prefix(), __('Sign In', 'inhubber') )->set_default_value('#')->set_required( true )->set_width( 50 ),
         Field::make( 'text', 'crb_options_menu_request'.carbon_lang_prefix(), __('Request a demo', 'inhubber') )->set_default_value('#')->set_required( true )->set_width( 50 ),

      ))

     ->add_tab(__('Social networks', 'inhubber'), array(

         Field::make( 'text', 'crb_options_soc_linkedin_link'.carbon_lang_prefix(), __('Linkedin', 'inhubber') )->set_default_value('#')->set_width( 50 ),
         Field::make( 'text', 'crb_options_soc_facebook_link'.carbon_lang_prefix(), __('Facebook', 'inhubber') )->set_default_value('#')->set_width( 50 ),
         Field::make( 'text', 'crb_options_soc_twitter_link'.carbon_lang_prefix(), __('Twitter', 'inhubber') )->set_default_value('#')->set_width( 50 ),
         Field::make( 'text', 'crb_options_soc_youtube_link'.carbon_lang_prefix(), __('Youtube', 'inhubber') )->set_default_value('#')->set_width( 50 ),
         Field::make( 'text', 'crb_options_soc_instagram_link'.carbon_lang_prefix(), __('Instagram', 'inhubber') )->set_default_value('#')->set_width( 50 ),
      ))

      ->add_tab(__('Footer Menu', 'inhubber'), array(

          Field::make( 'separator', 'crb_options_footer_separator', __( 'Information block in footer','inhubber' ) ),

         Field::make( 'text', 'crb_options_footer_info_block'.carbon_lang_prefix(), __( 'Title','inhubber' ) )->set_required( true )->set_width( 50 )->set_default_value('Everything you need to work more effectively with contracts'),
         Field::make( 'text', 'crb_options_footer_request'.carbon_lang_prefix(), __('Request a demo', 'inhubber') )->set_default_value('#')->set_required( true )->set_width( 50 ),

         Field::make( 'separator', 'crb_options_footer_separator_block', __( 'Footer Block','inhubber' ) ),

          Field::make( 'image', 'crb_options_foote_logo'.carbon_lang_prefix(), __('Footer Logo', 'inhubber') )->set_width( 33 ),
         Field::make( 'text', 'crb_options_footer_link_impressum'.carbon_lang_prefix(), __('Impressum', 'inhubber') )->set_default_value('#')->set_width( 33 ),
         Field::make( 'text', 'crb_options_footer_link_privacy'.carbon_lang_prefix(), __('Privacy Policy', 'inhubber') )->set_default_value('#')->set_width( 33 ),
         



         
      ));    
}