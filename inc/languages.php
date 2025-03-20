<?php 

//Защищаемся от несуществующих функций

if(!function_exists('pll__')) {
    function pll__($string) {
        return $string;
    }
}

if(!function_exists('pll_e')) {
    function pll_e($string) {
        echo $string;
    }
}


if(function_exists('pll_register_string')){
    pll_register_string('Register', 'Register', 'inhubber');
    pll_register_string('Sign_In', 'Sign In', 'inhubber');
    pll_register_string('Request_demo', 'Request a demo', 'inhubber');
    pll_register_string('Learn_more', 'Learn more', 'inhubber');
    pll_register_string('View_story', 'View story', 'inhubber');

    pll_register_string('Legal_validity_of_digital', 'Legal validity of digital signatures –...', 'inhubber');
    pll_register_string('Blog', 'Blog', 'inhubber');
    pll_register_string('News_Case_studies', 'News, Case studies', 'inhubber');

    pll_register_string('times_blog', '18 Jan, Wed at 12:00', 'inhubber');
    pll_register_string('blog_exp', 'Digitaler Mietvertrag – so einfach wie...', 'inhubber');
    pll_register_string('Events', 'Events', 'inhubber');
    pll_register_string('Our_upcoming_events', 'Our upcoming events', 'inhubber');


    pll_register_string('Library', 'Library', 'inhubber');
    pll_register_string('eBooks_Webinars', 'eBooks, Webinars', 'inhubber');
    pll_register_string('Contact_sales', 'Contact sales', 'inhubber');

    pll_register_string('Made_in_Germany', 'Made in Germany', 'inhubber');
    pll_register_string('GDPR_compliance', 'GDPR compliance', 'inhubber');

    pll_register_string('footer_menu_product', 'Product', 'inhubber');
    pll_register_string('footer_menu_solutions', 'Solutions', 'inhubber');
    pll_register_string('footer_menu_resources', 'Resources', 'inhubber');
    pll_register_string('footer_menu_compare', 'Compare', 'inhubber');
    pll_register_string('footer_menu_company', 'Company', 'inhubber');

    pll_register_string('Copyright', 'Copyright', 'inhubber');
    pll_register_string('Inhubber', 'Inhubber (key2contract GmbH)', 'inhubber');

    pll_register_string('Impressum', 'Impressum', 'inhubber');
    pll_register_string('Privacy_Policy', 'Privacy Policy', 'inhubber');


    pll_register_string('Library_Title', 'Library', 'inhubber');
    pll_register_string('Library_desk', 'Download our free eBooks and learn how to manage your contracts more efficiently, and replay online events with our webinars.', 'inhubber', true);
    pll_register_string('Library_eBook', 'eBook', 'inhubber');
    pll_register_string('Download_free_eBook', 'Download free eBook', 'inhubber');
    pll_register_string('Load_more', 'Load more', 'inhubber');
    pll_register_string('Loading', 'Loading', 'inhubber');
    pll_register_string('Share', 'Share', 'inhubber');
    pll_register_string('Related_articles', 'Related articles', 'inhubber');

    pll_register_string('Inhubber_Events', 'Inhubber Events', 'inhubber');
    pll_register_string('Inhubber_Events_text', "Learn the best practices for organizing your work, handling contracts, and stay focused on what's important.", 'inhubber', true);

    pll_register_string('All', 'All', 'inhubber');
    pll_register_string('Data_Controller', 'Data Controller', 'inhubber');
    pll_register_string('On this page', 'On this page', 'inhubber');
    pll_register_string('Categories', 'Categories', 'inhubber');
}



//pll_register_string('OUR_STARTUPS', 'НАШИ ПРЕИМУЩЕСТВА');
//pll_e('Data Controller');
//pll__('Loading');