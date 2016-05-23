<?php

/*

@package Namaste-Yoga
  ==========================
    THEME SUPPORT FUNCTION
  ==========================
*/

/* Activate Post Formats */
$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format) {
  $output[] = ( @$options[$format] == 1 ? $format : '' );
}
if(!empty($options)){
  add_theme_support('post-formats', $output);
}

/* Activate Header customisation */
$header = get_option('custom_header');
if(@$header == 1){
  add_theme_support('custom-header');
}

/* Activate Background customisation */
$background = get_option('custom_background');
if(@$background == 1){
  add_theme_support('custom-background');
}

/* Activate Nav Menu Option */
function ny_register_nav_menu(){
  register_nav_menu('primary', 'Menu Principal');
  register_nav_menu('secondary', 'Menu du footer');
}
add_action('after_setup_theme', 'ny_register_nav_menu');

/* Add Excerpts to pages */
function ny_add_excerpts_to_pages(){
  add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', 'ny_add_excerpts_to_pages');

/* Register Taxonomies */
// function ny_register_taxonomies(){
//   register_taxonomy('acivities', 'post', array(
//     'label' => 'Activites'
//   ));
// }
// add_action('after_setup_theme', 'ny_register_taxonomies');
