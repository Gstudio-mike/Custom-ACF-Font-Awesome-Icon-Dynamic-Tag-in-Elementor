<?php
/**
 * Plugin Name: Elementor Dynamic Tag - ACF Font Awesome Icon
 * Description: Añade una etiqueta dinámica en Elementor para campos ACF de tipo Font Awesome Icon.
 * Version: 1.0
 * Author: Mike b
 */

// Asegurarse de que Elementor esté activo
add_action('plugins_loaded', function () {
    if (!defined('ELEMENTOR_PATH')) {
        return;
    }

    // Registrar la etiqueta dinámica personalizada
    add_action('elementor/dynamic_tags/register_tags', function ($dynamic_tags) {
        require_once plugin_dir_path(__FILE__) . 'class-acf-fontawesome-icon-tag.php';
        $dynamic_tags->register(new \Elementor\ACF_FontAwesome_Icon_Tag());
    });
});
