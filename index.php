<?php
/**
 * @package WordPress
 * @subpackage Sherpa
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<ul class="products">
				<?php
					$args = array( 'post_type' => 'product', 'orderby' => 'rand' );
					$rand_posts = get_posts( $args );
					$i = 0;
					foreach ( $rand_posts as $post ) :
						setup_postdata( $post ); ?>
						<li class="product-item four columns <?php if ($i % 3 == 0) { echo 'first-col'; } ?>">
							<a href="<?php the_permalink(); ?>" class="product-item__button button">
								<p class="product-item__name"><?php the_title(); ?></p>
								<img src="http://dummyimage.com/300x100/ccc/fff.png&amp;text=+" alt="" class="product-item__image" />
								<p class="product-item__price">&pound;32.99</p>
							</a>
						</li>
						<?php
						$i++;
					endforeach;
					wp_reset_postdata(); ?>
				</ul>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
