<?php



defined('ABSPATH') || exit;



add_action('after_setup_theme', 'crb_load');

function crb_load()
{

   require_once(get_template_directory() . '/vendor/autoload.php');

   \Carbon_Fields\Carbon_Fields::boot();
}



require_once(__DIR__ . '/settings.php');
require_once(__DIR__ . '/front-page.php');
require_once(__DIR__ . '/gutenberg-library.php');
require_once(__DIR__ . '/events.php');
require_once(__DIR__ . '/compare-page.php');
require_once(__DIR__ . '/dictionary-single-page.php');
require_once(__DIR__ . '/related-terms.php');
require_once(__DIR__ . '/integrations-page.php');
