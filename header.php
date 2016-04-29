<?php
  /*
    This is the template for the header

    @package Namaste-Yoga
  */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if(is_singular() && pings_open(get_queried_object())): ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >

  <!-- header section -->
  <header class="header_container">

    <!-- LOGO -->
    <div class="logo_container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php bloginfo('template_directory'); ?>/img/logo.jpg" alt="Namaste-Yoga.fr">
      </a>
    </div>
    <!-- End LOGO -->

    <!-- NAVIGATION -->
    <nav class="navigation_container">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'navbar'
        ));
      ?>
    </nav>
    <!-- End NAVIGATION -->

  </header><!-- END header section -->
