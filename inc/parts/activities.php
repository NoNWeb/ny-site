
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
