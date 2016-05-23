<h1>Namaste-Yoga Contact Form</h1>
<?php settings_errors(); ?>


<form method="post" class="ny-general-form" action="options.php">
  <?php settings_fields('ny-contact-options'); ?>
  <?php do_settings_sections('ny_theme_contact') ?>
  <?php submit_button(); ?>
</form>
