<h1>Namaste-Yoga Sidebar Options</h1>
<?php settings_errors(); ?>

<?php
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  $fullName = $firstName . ' ' . $lastName;
  $description = esc_attr(get_option('description'));
?>

<div class="ny-sidebar-preview">
  <div class="ny-sidebar">
    <h1 class="ny-username"><?php print $fullName; ?></h1>
    <h2 class="ny-description"><?php print $description; ?></h2>
    <div class="icons-wrapper">

    </div>
  </div>
</div>

<form method="post" class="ny-general-form" action="options.php">
  <?php settings_fields('ny-settings-group'); ?>
  <?php do_settings_sections('ny') ?>
  <?php submit_button(); ?>
</form>
