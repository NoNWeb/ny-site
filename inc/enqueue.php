<?php

/*

@package Namaste-Yoga
  ==========================
    ADMIN ENQUEUE FUNCTION
  ==========================
*/

function ny_load_admin_scripts($hook){

  if('toplevel_page_ny' != $hook){
    return;
  }

  wp_register_style('ny_admin', get_template_directory_uri() . '/css/ny.admin.css',array(), '1.0.0', 'all');
  wp_enqueue_style('ny_admin');

  wp_enqueue_media();

  wp_register_script('ny-admin-script', get_template_directory_uri() . '/js/ny.admin.js', array('jquery'), '1.0.0.', true);
  wp_enqueue_script('ny-admin-script');

}
add_action('admin_enqueue_scripts', 'ny_load_admin_scripts');


/*

  ==========================
    FRONT-END ENQUEUE FUNCTION
  ==========================
*/

function ny_load_scripts(){
  // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '4.1.1', 'all' );
  wp_enqueue_style('namaste-yoga', get_template_directory_uri() . '/css/ny.css', array(), '1.0.0', 'all' );

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.12.3', true);
  wp_enqueue_script('jquery');
  // wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
}
add_action('wp_enqueue_scripts', 'ny_load_scripts');
