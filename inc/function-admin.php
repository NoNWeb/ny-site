<?php

/*

@package namaste-yoga
  ==========================
    ADMIN PAGE
  ==========================
*/

function ny_add_admin_page(){

// Generate Namaste-Yoga Page
  add_menu_page( 'Namaste-Yoga Theme Options', 'Namaste-Yoga', 'manage_options', 'ny', 'ny_theme_create_page', 'dashicons-universal-access-alt', 62);

// Generate Namaste-Yoga Sub Pages
  add_submenu_page('ny', 'Namaste-Yoga Sidebar Options', 'Sidebar', 'manage_options', 'ny', 'ny_theme_create_page');
  add_submenu_page('ny', 'Namaste-Yoga Theme Options', 'Theme Options', 'manage_options', 'ny_theme', 'ny_theme_support_page');
  add_submenu_page('ny', 'Namaste-Yoga CSS Options', 'Custom CSS', 'manage_options', 'ny_css', 'ny_theme_settings_page');

// Activate custom settings
  add_action('admin_init', 'ny_custom_settings');

}
add_action('admin_menu', 'ny_add_admin_page');

function ny_custom_settings(){
  // Sidebar Options
  register_setting('ny-settings-group', 'profile_picture');
  register_setting('ny-settings-group', 'first_name');
  register_setting('ny-settings-group', 'last_name');
  register_setting('ny-settings-group', 'description');
  register_setting('ny-settings-group', 'twitter_handler', 'ny_sanitize_twitter_handler');
  register_setting('ny-settings-group', 'facebook_handler');

  add_settings_section('ny-sidebar-options','Sidebar Options', 'ny_sidebar_options','ny');

  add_settings_field('sidebar-profile-picture', 'Profile Picture', 'ny_sidebar_profile', 'ny', 'ny-sidebar-options');
  add_settings_field('sidebar-name', 'Full Name', 'ny_sidebar_name', 'ny', 'ny-sidebar-options');
  add_settings_field('sidebar-description', 'Description', 'ny_sidebar_description', 'ny', 'ny-sidebar-options');
  add_settings_field('sidebar-twitter', 'Twitter Handler', 'ny_sidebar_twitter', 'ny', 'ny-sidebar-options');
  add_settings_field('sidebar-facebook', 'Facebook Handler', 'ny_sidebar_facebook', 'ny', 'ny-sidebar-options');

  // Theme Support Options
  register_setting('ny-theme-support', 'post_formats');
  register_setting('ny-theme-support', 'custom_header');
  register_setting('ny-theme-support', 'custom_background');

  add_settings_section('ny-theme-options', 'Theme Options', 'ny_theme_options', 'ny_theme');

  add_settings_field('post-formats', 'Post Formats', 'ny_post_formats', 'ny_theme', 'ny-theme-options');
  add_settings_field('custom-header', 'Custom Header', 'ny_custom_header', 'ny_theme', 'ny-theme-options');
  add_settings_field('custom_background', 'Custom Background', 'ny_custom_background', 'ny_theme', 'ny-theme-options');


  // Contact Form Options
  //register_setting('ny-contact-options', 'activate');


}


function ny_theme_options(){
  echo 'Activate and deactivate specific Theme Options';
}

function ny_post_formats(){
  $options = get_option('post_formats');
  $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
  $output = '';
  foreach ($formats as $format) {
    $checked = ( @$options[$format] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> ' .$format.'</label><br>';
  }
  echo $output;
}

function ny_custom_header(){
  $options = get_option('custom_header');
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the custom header </label>';
}

function ny_custom_background(){
  $options = get_option('custom_background');
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the custom background </label>';
}

// Sidebar Options Functions
function ny_sidebar_options(){
  echo "Customise your sidebar information";
}

function ny_sidebar_profile(){
  $picture = esc_attr(get_option('profile_picture'));
  echo '<input type="button" class="button button-secondary" value="Upload a Profile Picture" id="upload-button" /> <input type="hidden" name="profile_picture" value="'.$picture.'" />';
}

function ny_sidebar_name(){
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function ny_sidebar_description(){
  $description = esc_attr(get_option('description'));
  echo '<input type="text" name="description" value="'.$description.'" placeholder="Description" />';
}

function ny_sidebar_twitter(){
  $twitter = esc_attr(get_option('twitter_handler'));
  echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Handler" /><p class="description">Twitter name without the @ character !</p>';
}

function ny_sidebar_facebook(){
  $facebook = esc_attr(get_option('facebook_handler'));
  echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Handler" />';
}

// Sanitization Settings
function ny_sanitize_twitter_handler( $input ){
  // sanitize_text_field is a wp function that checks invalid utf characters
  $output = sanitize_text_field( $input );
  $output = str_replace('@', '', $output);
  return $output;
}

// Template submenu functions
function ny_theme_create_page() {
  require_once(get_template_directory() . '/inc/templates/ny-admin.php');
}

function ny_theme_support_page() {
  require_once(get_template_directory() . '/inc/templates/ny_theme_support.php');
}

function ny_theme_settings_page() {
  echo '<h1>Namaste-Yoga Custom CSS</h1>';
}
