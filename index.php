<?php get_header(); ?>

<?php if ( is_home() && is_front_page() ) : ?>

  <!-- Hero section -->
  <div class="hero_container">
    <!-- <div class="hero_caption">
      <h1>Text d'accroche</h1>
      <h3>Sous text d'accroche</h3>
    </div> -->
  </div>
  <!-- End of Hero section -->

  <!-- Display all Namaste-Yoga activities -->
  <section class="activities_container containers expanded row" id="activites">
    <h1>Activites</h1>
    <hr>
    <div class="wrapper">
      <h5>Magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute </h5>
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

          echo '<div class="large-4 columns box">';
          echo '<header>';
          // echo '<span></span>';
          // echo '<hr>';
          echo '<h2><a href="' . $page_link . '">' . $page_tittle .'</a></h2>';
          echo '</header>';
          echo '<p>' . $page_excerpt .'</p>';
          echo '<a href="' . $page_link . '">Plus de details</a>';
          echo '</div>';
        }
      ?>
    </div>
  </section>
  <!-- End of Display all Namaste-Yoga activities -->

  <!-- A propos -->
  <section class="a-propos_container expanded row" id="a_propos">
    <!-- <div class="columns left_section"> -->
      <!-- <img src="<?php bloginfo('template_directory'); ?>/img/header_img420.jpg" alt="Image de Namaste-Yoga" /> -->
    <!-- </div> -->
    <div class="apropos_txt">
      <?php $apropos = '13'; ?>
      <h1><?php echo get_the_title($apropos); ?></h1>
      <hr>
      <p>
        <?php echo get_the_excerpt($apropos); ?>
      </p>
      <a href="<?php echo get_page_link($apropos); ?>">Plus de details</a>
    </div>
  </section>
  <!-- End of A propos -->

  <!-- Contact form -->
  <section class="contact_container containers" id="contact">
    <h1>Contact</h1>
    <hr>
    <address class="address_farges">
      <div class="address">
        <h5>salle polyvalente in Farges</h5>
        <p>Allée Chamilles, 01270 Coligny, France</p>
        <a href="https://www.google.ch/maps/place/Salle+des+F%C3%AAtes/@46.3819265,5.3466777,17.57z/data=!4m6!1m3!3m2!1s0x478cb55ae0f1bdd7:0x62e422b49b2c59d3!2sSalle+des+F%C3%AAtes!3m1!1s0x478cb55ae0f1bdd7:0x62e422b49b2c59d3!6m1!1e1?hl=en" target="_blank">Google Maps</a>
      </div>
    </address>
    <address class="address_home">
      <div class="address">
        <h5>Home place</h5>
        <p>387 Route du 19 Aout 1944</p>
        <a href="https://www.google.ch/maps/place/387+Rue+du+19+Ao%C3%BBt+1944,+01550+Farges,+France/@46.1593979,5.9212751,18.13z/data=!4m2!3m1!1s0x478c8690700e3c8d:0xadb20976b5b5730?hl=en" target="_blank">Google Maps</a>
      </div>
    </address>
    <div class="email_form">
      Form goes here
    </div>
  </section>
  <!-- End of Contact form -->
<?php endif; ?>

<?php get_footer(); ?>
