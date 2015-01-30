<?php
/**
 * @package WordPress
 * @subpackage Sherpa
 */
?>

<?php
add_action( 'init', 'product_post_type' );

function product_post_type() {
  register_post_type( 'product', array(
    'labels' => array(
      'name' => __( 'Products' ),
      'singular_name' => __( 'Product' )
    ),
    'taxonomies' => array('category'),
    'public' => true,
    'has_archive' => true,
    'supports' => array( 'title', 'editor' ),
    'register_meta_box_cb' => 'add_events_metaboxes' )
  );
}

function add_events_metaboxes() {
  add_meta_box('wpt_events_location', 'Event Location', 'wpt_events_location', 'events', 'side', 'default');
}

?>