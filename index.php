<?php
/**
 * @package WordPress
 * @subpackage Berry
 */

get_header(); ?>

<?php $categoryID =  get_query_var('cat'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<ul class="products">
				<?php
					$args = array( 'post_type' => 'product', 'orderby' => 'rand' );
					$rand_posts = get_posts( $args );
					$i = 0;
					foreach ( $rand_posts as $post ) :
						setup_postdata( $post );
						if (in_category( $categoryID, $post ) || $categoryID == 0) {
							?>
							<li class="product-item four columns <?php if ($i % 3 == 0) { echo 'first-col'; } ?>">
								<?php
									$product_url = get_post_meta( $post->ID, '_product_url', true );
									$product_price = get_post_meta( $post->ID, '_product_price', true );
									$product_image = get_the_content();
								?>
								<a href="<?php echo $product_url ?>" class="product-item__button button">
									<p class="product-item__name"><?php the_title(); ?></p>
									<?php
									if ($product_image) {
										echo $product_image;
									} else {
										echo '<img src="http://dummyimage.com/300x300/ccc/fff.png&amp;text=+" alt="" />';
									}
									?>
									<?php if($product_price) { ?>
										<p class="product-item__price">&pound;<?php echo $product_price ?></p>
									<?php } ?>
								</a>
							</li>
						<?php
							$i++;
						}
					endforeach;
					wp_reset_postdata(); ?>
				</ul>

				<?php
				if ($i <= 0) {
					echo '
						<div class="two columns">&nbsp;</div>
						<h4 class="seven columns">Sorry but we do not have any products for this category at the moment</h4>
					';
				}
				?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
