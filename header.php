<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Sherpa
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title>Berry.co: The personal shopper for amazon</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/normalize.css">
  	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/skeleton.css">
  	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/custom.css">
  	<link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container">
	<div id="content" class="site-content">
		<header role="banner">
			<div class="eight columns">
				<a href="/" class="brand">
					<span class="logo"></span>
					<h5 class="name"><?php bloginfo( 'name' ); ?></h5>
				</a>
			</div>
			<div class="four columns">
				<p class="tag u-pull-right">The personal shopper for amazon</p>
			</div>

			<nav role="navigation">
				<h3 class="question">I'm looking for a gift for </h3>
				<select class="gift-for">
					<option value="">everyone</option>
					<?php
					$categories = get_categories();
					foreach ($categories as $category) {
						echo '<option value="'.$category->slug.'">'.$category->cat_name.'</option>';
					}
					?>
				</select>
			</nav>
		</header>
