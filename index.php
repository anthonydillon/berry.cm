<?php
/**
 * @package WordPress
 * @subpackage Sherpa
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
			<h3 class="question">Who are you shopping for?</h3>
			<div class="row">
				<div class="two columns">&nbsp;</div>
				<div class="eight columns">
					<ul class="float-list">
						<?php
						$categories = get_categories();
						foreach ($categories as $category) {
							$listitem = '<li class="list-item">';
							$listitem .= '<a class="button"  href="/sherpa/'.$category->slug.'">';
							$listitem .= $category->cat_name;
							$listitem .= '</a>';
							$listitem .= '</li>';
							echo $listitem;
						}
						?>
					</ul>
				</div>
				<div class="two columns">&nbsp;</div>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
