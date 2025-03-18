<?php
## styles and scripts
function form_handler_styles() {
    wp_register_style('form-handler-css', get_stylesheet_directory_uri() . '/assets/css/form-handler.css');
    wp_enqueue_style('form-handler-css');

    // Обрабтка полей формы
    wp_enqueue_script( 'jquery-form' );

    // Подключаем файл скрипта
    wp_enqueue_script(
        'form-handler',
        get_stylesheet_directory_uri() . '/assets/js/form-handler.js',
        array( 'jquery' )
    );

    // Задаем данные обьекта ajax
    wp_localize_script(
        'form-handler',
        'form_handler_object',
        array(
            'url'   => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'form-handler-nonce' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'form_handler_styles' );

##AJAX
add_action( 'wp_ajax_feedback_action', 'ajax_action_callback' );
add_action( 'wp_ajax_nopriv_feedback_action', 'ajax_action_callback' );


function ajax_action_callback() {

}