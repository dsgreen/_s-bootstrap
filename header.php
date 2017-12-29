<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and main content div and a grid row
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header id="top" class="site-header" role="banner">
		<nav class="navbar navbar-inverse main-navigation" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="primary-menu" aria-expanded="false">
						<span class="sr-only"><?php esc_html_e( 'Toggle navigation', '_s' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<?php wp_nav_menu( array(
						'theme_location'    => 'primary',
						'menu'              => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'menu_class'        => 'nav navbar-nav navbar-right',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
				); ?>
			</div>
		</nav>
	</header>

	<div class="container-fluid">
		<h2 class="lead"><?php bloginfo( 'description' ); ?></h2>
	</div>

	<div id="content" class="site-content container-fluid">
		<div class="row">