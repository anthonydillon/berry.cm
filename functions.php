<?php
/**
 * @package WordPress
 * @subpackage Berry
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

function add_products_metaboxes() {
  add_meta_box('product_details', 'Product Details', 'product_details', 'product', 'normal', 'default');
}

add_action( 'admin_init', 'add_products_metaboxes' );

function product_details() {
	global $post;
	$product_url = get_post_meta( $post->ID, '_product_url', true );
	echo '<label for="_product_url">URL: </label>';
	echo '<input type="text" name="_product_url" value="' . $product_url . '" required />';

	echo '<br /><br />';

	$product_price = get_post_meta( $post->ID, '_product_price', true );
	echo '<label for="_product_price">Price: </label>';
	echo '<input type="text" name"_product_price" value="' . $product_price . '" />';
}

?>
