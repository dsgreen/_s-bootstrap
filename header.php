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
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to main content', '_s' ); ?></a>
	<header class="site-header" id="top" role="banner">
		<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
			<div class="container-fluid">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', '_s' ); ?>">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <?php wp_nav_menu( array(
            'theme_location'    => 'primary',
            'menu'              => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarNav',
            'menu_class'        => 'navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker())
        ); ?>
			</div>
		</nav>
	</header>

	<div class="container-fluid">
		<h2 class="lead"><?php bloginfo( 'description' ); ?></h2>
	</div>

	<div class="site-content container-fluid" id="content">
		<div class="row">