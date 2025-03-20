<?php


add_action( 'acf/init', 'register_example_block' );

function register_example_block() {

   if ( function_exists( 'acf_register_block_type' ) ) { 

      acf_register_block_type( array(

			'name' 					=> 'security-one-block',

			'title' 				=>    'First block Security',

			'description' 			=> 'First block Security',

			'category' 				=> 'category-security',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'security' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/security/security-one-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


      acf_register_block_type( array(

			'name' 					=> 'security-protecting-block',

			'title' 				=>    'Protecting Security',

			'description' 			=> 'Protecting Security',

			'category' 				=> 'category-security',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'security' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/security/security-protecting-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

      //Our advantages

      acf_register_block_type( array(

			'name' 					=> 'security-our-advantages-block',

			'title' 				=>    'Our advantages',

			'description' 			=> 'Our advantages',

			'category' 				=> 'category-security',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'security' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/security/security-our-advantages-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


      //Our customers

      
      acf_register_block_type( array(

			'name' 					=> 'security-our-customers-block',

			'title' 				=>    'Our customers',

			'description' 			=> 'Our customers',

			'category' 				=> 'category-security',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'security' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/security/security-our-customers-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

      //FAQ Security

      acf_register_block_type( array(

			'name' 					=> 'security-faq',

			'title' 				=>    'FAQ Security',

			'description' 			=> 'FAQ Security',

			'category' 				=> 'category-security',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'security' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/security/security-faq.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

      //Everything you need to work more effectively with contracts
      acf_register_block_type( array(

			'name' 					=> 'security-everything',

			'title' 				=>    'Everything Security',

			'description' 			=> 'Everything Security',

			'category' 				=> 'category-security',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'security' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/security/security-everything.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//overwiew
		acf_register_block_type( array(

			'name' 					=> 'overwiew-one-block',

			'title' 				=>  'First block Overwiew',

			'description' 			=> 'First block Overwiew',

			'category' 				=> 'category-overwiew',

			'icon'					=> 'align-full-width',

			'keywords'				=> array( 'overwiew' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/overwiew/overwiew-one-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//Trusted by over

		acf_register_block_type( array(

			'name' 					=> 'overwiew-trusted-by-over',

			'title' 				=>  'Slider Logo',

			'description' 			=> 'Slider Logo',

			'category' 				=> 'category-inhubber',

			'icon'					=> 'align-full-width',

			'keywords'				=> array( 'inhubber' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/overwiew/overwiew-trusted-by-over.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//Repository //repository


		acf_register_block_type( array(

			'name' 					=> 'overwiew-information',

			'title' 				=>    'Overwiew Information',

			'description' 			=> 'Overwiew Information',

			'category' 				=> 'category-overwiew',

			'icon'					=> 'align-full-width',

			'keywords'				=> array( 'overwiew' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/overwiew/overwiew-information.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//Customer stories

		acf_register_block_type( array(

			'name' 					=> 'customer-stories',

			'title' 				=>    'Customer stories',

			'description' 			=> 'Customer stories',

			'category' 				=> 'category-inhubber',

			'icon'					=> 'embed-photo',

			'keywords'				=> array( 'inhubber' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/main/customer-stories.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//software

		acf_register_block_type( array(

			'name' 					=> 'software',

			'title' 				=>    'Software',

			'description' 			=> 'Software',

			'category' 				=> 'category-inhubber',

			'icon'					=> 'embed-photo',

			'keywords'				=> array( 'inhubber' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/main/software.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//FAQ


		acf_register_block_type( array(

			'name' 					=> 'faq',

			'title' 				=>    'FAQ',

			'description' 			=> 'FAQ',

			'category' 				=> 'category-inhubber',

			'icon'					=> 'embed-photo',

			'keywords'				=> array( 'inhubber' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/main/faq.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//contracts

		acf_register_block_type( array(

			'name' 					=> 'contracts',

			'title' 				=>    'Contracts',

			'description' 			=> 'Contracts',

			'category' 				=> 'category-inhubber',

			'icon'					=> 'embed-photo',

			'keywords'				=> array( 'inhubber' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/main/contracts.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//Solutions


		acf_register_block_type( array(

			'name' 					=> 'solutions-one-block',

			'title' 				=>    'First block Solutions',

			'description' 			=> 'First block Solutions',

			'category' 				=> 'category-solutions',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'solutions' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/solutions/solutions-one-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//Solutions Information
		acf_register_block_type( array(

			'name' 					=> 'solutions-information',

			'title' 				=>    'Solutions Information',

			'description' 			=> 'Solutions Information',

			'category' 				=> 'category-solutions',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'solutions' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/solutions/solutions-information.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//Transform

		acf_register_block_type( array(

			'name' 					=> 'solutions-transform',

			'title' 				=>    'Solutions Transform',

			'description' 			=> 'Solutions Transform',

			'category' 				=> 'category-solutions',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'solutions' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/solutions/solutions-transform.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//About US 
		acf_register_block_type( array(

			'name' 					=> 'about-us-one-block',

			'title' 				=>    'First block About US ',

			'description' 			=> 'First block About US ',

			'category' 				=> 'category-about-us',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'About US' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/about-us/about-us-one-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//Our core values
		acf_register_block_type( array(

			'name' 					=> 'about-us-one-core',

			'title' 				=>    'Our core values',

			'description' 			=> 'Our core values',

			'category' 				=> 'category-about-us',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'About US' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/about-us/about-us-one-core.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//Our partners our-partners


		acf_register_block_type( array(

			'name' 					=> 'about-us-our-partners',

			'title' 				=>    'Our partners',

			'description' 			=> 'Our partners',

			'category' 				=> 'category-about-us',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'About US' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/about-us/about-us-our-partners.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));

		//News

		acf_register_block_type( array(

			'name' 					=> 'about-us-news',

			'title' 				=>    'News',

			'description' 			=> 'News',

			'category' 				=> 'category-about-us',

			'icon'					=> 'admin-page',

			'keywords'				=> array( 'About US' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/about-us/about-us-news.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//customers
		acf_register_block_type( array(

			'name' 					=> 'customers-one-block',

			'title' 				=>    'First block Customers',

			'description' 			=> 'First block Customers',

			'category' 				=> 'category-customers',

			'icon'					=> 'format-status',

			'keywords'				=> array( 'customers' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/customers/customers-one-block.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


		//Video review


		acf_register_block_type( array(

			'name' 					=> 'customers-video-review',

			'title' 				=>    'Review',

			'description' 			=> 'Review',

			'category' 				=> 'category-customers',

			'icon'					=> 'format-status',

			'keywords'				=> array( 'customers' ),

			'post_types'			=> array( 'page' ),

			'mode'					=> 'auto',

			// 'align'				=> 'wide',

			'render_template'		=> 'templates/blocks/customers/customers-video-review.php',

			// 'render_callback'	=> 'example_block_render_callback',

			 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',

			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',

			// 'enqueue_assets' 	=> 'example_block_enqueue_assets',

		));


				//Single review


				acf_register_block_type( array(

					'name' 					=> 'customers-single-one-block',
		
					'title' 				=>    'Main block Single Customers',
		
					'description' 			=> 'Main block Single Customers',
		
					'category' 				=> 'category-customers-single',
		
					'icon'					=> 'format-status',
		
					'keywords'				=> array( 'customers-single' ),
		
					'post_types'			=> array( 'page' ),
		
					'mode'					=> 'auto',
		
					// 'align'				=> 'wide',
		
					'render_template'		=> 'templates/blocks/customers-single/customers-single-one-block.php',
		
					// 'render_callback'	=> 'example_block_render_callback',
		
					 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',
		
					// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',
		
					// 'enqueue_assets' 	=> 'example_block_enqueue_assets',
		
				));
		
				//content

				
				acf_register_block_type( array(

					'name' 					=> 'customers-single-content',
		
					'title' 				=>  'Content Single Customers',
		
					'description' 			=> 'Content block Single Customers',
		
					'category' 				=> 'category-customers-single',
		
					'icon'					=> 'format-status',
		
					'keywords'				=> array( 'customers-single' ),
		
					'post_types'			=> array( 'page' ),
		
					'mode'					=> 'auto',
		
					// 'align'				=> 'wide',
		
					'render_template'		=> 'templates/blocks/customers-single/customers-single-content.php',
		
					// 'render_callback'	=> 'example_block_render_callback',
		
					 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',
		
					// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',
		
					// 'enqueue_assets' 	=> 'example_block_enqueue_assets',
		
				));



				acf_register_block_type( array(

					'name' 					=> 'Video',
		
					'title' 				=>    'Video',
		
					'description' 			=> 'Video',
		
					'category' 				=> 'category-inhubber',
		
					'icon'					=> 'format-video',
		
					'keywords'				=> array( 'inhubber' ),
		
					'post_types'			=> array( 'page' ),
		
					'mode'					=> 'auto',
		
					// 'align'				=> 'wide',
		
					'render_template'		=> 'templates/blocks/main/video.php',
		
					// 'render_callback'	=> 'example_block_render_callback',
		
					 'enqueue_style' 		=> get_template_directory_uri() . '/templates/blocks/block.css',
		
					// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/example/example.js',
		
					// 'enqueue_assets' 	=> 'example_block_enqueue_assets',
		
				));

       //customers
       acf_register_block_type(
           array(
               'name' 					=> 'compare-header-block',
               'title' 				    => 'Customers single header rating',
               'description' 			=> 'Customers single header rating',
               'category' 				=> 'category-customers',
               'icon'					=> 'format-status',
               'keywords'				=> array( 'customers' ),
               'post_types'			    => array( 'page' ),
               'mode'					=> 'auto',
               'render_template'		=> 'templates/blocks/customers/customers-header-rating.php',
               'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
           )
       );


       //customers
       acf_register_block_type(
           array(
               'name' 					=> 'customer table',
               'title' 				    => 'Customers table',
               'description' 			=> 'Customers table',
               'category' 				=> 'category-customers',
               'icon'					=> 'format-status',
               'keywords'				=> array( 'customers' ),
               'post_types'			    => array( 'page' ),
               'mode'					=> 'auto',
               'render_template'		=> 'templates/blocks/customers/customers-table.php',
               'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
           )
       );

       acf_register_block_type(
           array(
               'name' 					=> 'сase study blogs',
               'title' 				    => 'Case study blogs',
               'description' 			=> 'Case study blogs',
               'category' 				=> 'category-customers',
               'icon'					=> 'format-status',
               'keywords'				=> array( 'customers' ),
               'post_types'			    => array( 'page' ),
               'mode'					=> 'auto',
               'render_template'		=> 'templates/blocks/customers/customer-case-study-blogs.php',
               'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
           )
       );

       acf_register_block_type(
           array(
               'name' 					=> 'glossary single page',
               'title' 				    => 'Glossary single page',
               'description' 			=> 'Glossary single page',
               'category' 				=> 'category-customers',
               'icon'					=> 'format-status',
               'keywords'				=> array( 'customers' ),
               'post_types'			    => array( 'post' ),
               'mode'					=> 'auto',
               'render_template'		=> 'templates/blocks/customers/dictionary-single-blog.php',
               'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
           )
       );

       acf_register_block_type(
           array(
               'name' 					=> 'glossary header',
               'title' 				    => 'Glossary header',
               'description' 			=> 'Glossary header',
               'category' 				=> 'category-customers',
               'icon'					=> 'format-status',
               'keywords'				=> array( 'customers' ),
               'post_types'			    => array( 'page' ),
               'mode'					=> 'auto',
               'render_template'		=> 'templates/blocks/glossary/glossary-header.php',
               'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
           )
       );

       acf_register_block_type(
           array(
               'name' 					=> 'related terms',
               'title' 				    => 'Related terms',
               'description' 			=> 'Related terms',
               'category' 				=> 'category-customers',
               'icon'					=> 'format-status',
               'keywords'				=> array( 'customers' ),
               'post_types'			    => array( 'page', 'post' ),
               'mode'					=> 'auto',
               'render_template'		=> 'templates/blocks/glossary/related-terms.php',
               'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
           )
       );

	   // integrations
       acf_register_block_type(
		array(
			'name' 					=> 'integrations',
			'title' 				    => 'Platform integrations search',
			'description' 			=> 'Platform integrations search',
			'category' 				=> 'category-integrations',
			'icon'					=> 'format-status',
			'keywords'				=> array( 'integrations' ),
			'post_types'			    => array( 'page', 'post' ),
			'mode'					=> 'auto',
			'render_template'		=> 'templates/blocks/integrations/platform-integrations-search.php',
			'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
		)
	);

	// customers menu
	acf_register_block_type(
		array(
			'name' 					=> 'mane manu en',
			'title' 				    => 'Mane manu - EN',
			'description' 			=> 'Mane manu - EN',
			'category' 				=> 'category-inhubber',
			'icon'					=> 'format-status',
			'keywords'				=> array( 'inhubber' ),
			'post_types'			    => array( 'page'),
			'mode'					=> 'auto',
			'render_template'		=> 'templates/blocks/main/mane_menu_en.php',
			'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
		)
	);

	// customers menu
	acf_register_block_type(
		array(
			'name' 					=> 'mane manu de',
			'title' 				    => 'Mane manu - DE',
			'description' 			=> 'Mane manu - DE',
			'category' 				=> 'category-inhubber',
			'icon'					=> 'format-status',
			'keywords'				=> array( 'inhubber' ),
			'post_types'			    => array( 'page'),
			'mode'					=> 'auto',
			'render_template'		=> 'templates/blocks/main/mane_menu_de.php',
			'enqueue_style' 		    => get_template_directory_uri() . '/templates/blocks/block.css',
		)
	);
		


   }

}