<?php get_header(); ?>

<?php if ( is_home() && is_front_page() ) : ?>

  <!-- Hero section -->
  <div class="hero_container clear">
    <div class="hero_caption">
      <h1>Text d'accroche</h1>
      <h3>Sous text d'accroche</h3>
    </div>
  </div>
  <!-- End of Hero section -->

  <!-- Display all Namaste-Yoga activities -->
  <section class="activities_container">
    <!-- <?php get_template_part( '/inc/parts/activities' ); ?> -->
    <?php
      $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'include' => '27,29,31,40,42,44',
        'post_type' => 'page',
        'post_status' => 'publish',
      );
      $pages = get_pages($args);

      foreach ( $pages as $page ) {
        $page_link = get_page_link($page->ID);
        $page_tittle = get_the_title($page->ID);
        $page_excerpt = $page->post_excerpt;
        echo '<div class="box">';
        echo '<h4>' . $page_tittle .'</h4>';
        echo '<div>' . $page_excerpt .'</div>';
        echo '<a href="' . $page_link . '">Plus de details -></a>';
        echo '</div>';
      }
    ?>
  </section>
  <!-- End of Display all Namaste-Yoga activities -->

  <!-- A propos -->
  <section class="a-propos_container">
    <img src="<?php bloginfo('template_directory'); ?>/img/header_img.jpg" alt="Image de Namaste-Yoga" />
    <div class="a-propos">
      <?php $apropos = '13'; ?>
      <h1><?php echo get_the_title($apropos); ?></h1>
      <p>
        <?php echo get_the_excerpt($apropos); ?>
      </p>
      <a href="<?php echo get_page_link($apropos); ?>">Plus de details -></a>
    </div>
  </section>
  <!-- End of A propos -->

  <!-- Contact form -->
  <section class="contact_container">
    <address class="address_farges">
      <h4>salle polyvalente in Farges</h4>
      <p>
        Farges
      </p>
    </address>
    <address class="address_home">
      <h4>home place</h4>
      <p>
        387 Route du 19 Aout 1944
      </p>
    </address>
    <div class="email_form">
      CONTACT FORM GOES HERE
    </div>
  </section>
  <!-- End of Contact form -->
<?php endif; ?>

<?php get_footer(); ?>
