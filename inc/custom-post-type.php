<?php

/*

@package Namaste-Yoga
  ==========================
    THEME CUSTOM POST TYPES
  ==========================
*/

/* Activate Header customisation */
$contact = get_option('activate_contact');
if(@$contact == 1){
  add_action('init', 'ny_contact_custom_post_type');

  add_filter('manage_ny-contact_posts_columns', 'ny_set_contact_columns');
  add_action('manage_ny-contact_posts_custom_column', 'ny_contact_custom_column', 10, 2);
  add_action('add_meta_boxes', 'ny_contact_add_meta_box');
  add_action('save_post', 'ny_save_contact_email_data');
}

/* Contact CPT (Contact Post Type) */
function ny_contact_custom_post_type(){
  $labels = array(
    'name'            => 'Messages',
    'singular_name'   => 'Message',
    'menu_name'       => 'Messages',
    'name_admin_bar'  => 'Message'
  );

  $args = array(
    'labels'           => $labels,
    'show_ui'          => true,
    'capability_type'  => 'post',
    'hierarchical'     => false,
    'menu_position'    => 26,
    'menu_icon'        => 'dashicons-email-alt',
    'supports'         => array('title', 'editor', 'author')
  );

  register_post_type('ny-contact', $args);
}

function ny_set_contact_columns($columns){
  $newColumns = array();
  $newColumns['title'] = 'Full Name';
  $newColumns['message'] = 'Messages';
  $newColumns['email'] = 'Email';
  $newColumns['date'] = 'Date';
  return $newColumns;
}

function ny_contact_custom_column($column, $post_id){
  switch ($column) {
    case 'message':
      # message column
      echo get_the_excerpt();
      break;

    case 'email':
      # email column
      $email = get_post_meta($post_id, '_contact_email_value_key', true);
      echo '<a href="mailto:' . $email .'">' . $email . '</a>';
      break;
  }
}


/* Contact Meta Boxes */
function ny_contact_add_meta_box(){
  add_meta_box('contact_email', 'User Email', 'ny_contact_email_callback', 'ny-contact', 'side', 'high');
}

function ny_contact_email_callback($post){
  wp_nonce_field('ny_save_contact_email_data', 'ny_contact_email_meta_box_nonce');

  $value = get_post_meta($post->ID, '_contact_email_value_key', true);
  echo '<label for="ny_contact_email_field" >User Email Address: </label>';
  echo '<input type="email" id="ny_contact_email_field" name="ny_contact_email_field" value="' . esc_attr($value) . '" size="25" />';
}

function ny_save_contact_email_data($post_id){
  // Check if the meta box exists
  if(!isset($_POST['ny_contact_email_meta_box_nonce'])){
    return;
  }
  // Check if nonce saved
  if(!wp_verify_nonce($_POST['ny_contact_email_meta_box_nonce'], 'ny_save_contact_email_data')){
    return;
  }
  // dont keep the wordpress autosave
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
    return;
  }
  // Check if the user has the permissions
  if(!current_user_can('edit_post', $post_id)){
    return;
  }
  // Check if the valu actually exists
  if(!isset($_POST['ny_contact_email_field'])){
    return;
  }

  $my_data = sanitize_text_field($_POST['ny_contact_email_field']);

  update_post_meta($post_id, '_contact_email_value_key', $my_data);

}
