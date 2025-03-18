<?php

// 1. Настройка пути к ACF
add_filter('acf/settings/path', 'my_acf_settings_path'); 
function my_acf_settings_path( $path ) { 
    // обновить путь
    $path = get_stylesheet_directory() . '/inc/admin/fields/acf/';    
    // вернуть путь
    return $path;
    
}
 

// 2. Настройка пути до настроек
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) { 
    // обновить путь
    $dir = get_stylesheet_directory_uri() . '/inc/admin/fields/acf/';
    // вернуть путь
    return $dir;
    
}
 

// 3. Скрыть ACF в админке
// add_filter('acf/settings/show_admin', '__return_false');

// 4. Подключить ACF
include_once( get_stylesheet_directory() . '/inc/admin/fields/acf/acf.php' );