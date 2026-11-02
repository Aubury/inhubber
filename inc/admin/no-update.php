<?php


add_filter( 'site_transient_update_plugins', 'filter_plugin_updates_wc' );

function filter_plugin_updates_wc( $value ) {
//	unset( $value->response['polylang/polylang.php'] );

    unset( $value->response['acf_theme_code_pro/acf_theme_code_pro.php'] );

	return $value;

}