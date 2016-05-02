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
  /* CSS */
  wp_enqueue_style('foundation', get_template_directory_uri() . '/css/foundation.min.css', array(), '3.0.3', 'all' );
  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '4.1.1', 'all' );
  wp_enqueue_style('namaste-yoga', get_template_directory_uri() . '/css/ny.css', array(), '1.0.0', 'all' );

  /* JavaScript */
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '2.2.2', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '6.2.1', true );
}
add_action('wp_enqueue_scripts', 'ny_load_scripts');
