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

function save_meta( $post_id, $post ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
    return;

  if ( !current_user_can( 'edit_post', $post->ID ) )
    return;

  $meta_data['_product_url'] = $_POST['_product_url'];
  $meta_data['_product_price'] = $_POST['_product_price'];

  foreach ( $meta_data as $key => $value ) {
    if ( $post->post_type == 'revision' ) return;
    $value = implode( ',', (array)$value );
    if ( get_post_meta( $post->ID, $key, FALSE ) ) {
      update_post_meta( $post->ID, $key, $value );
    } else {
      add_post_meta( $post->ID, $key, $value );
    }
    if ( !$value ) delete_post_meta( $post->ID, $key );
  }
}

add_action( 'save_post', 'save_meta', 1, 2 );

?>
