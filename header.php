<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderBoot
 */
?><!DOCTYPE html>
<!--[if lt IE 8]>  <html class="no-js lte-ie9 lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lte-ie9 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>     <html class="no-js lte-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'under-boot' ); ?></a>

            <header id="masthead" class="site-header" role="banner">
                <nav id="site-navigation" class="main-navigation navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="primary-menu" aria-expanded="false">
                                <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'under-boot' ); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <?php wp_nav_menu(array(
                                    // note, primary menu must be set in admin panel or 'container => false' is ignored
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'items_wrap' => '%3$s'
                                )); ?>
                            </ul>
                        </div>
                    </div>
                </nav><!-- #site-navigation -->
            </header><!-- #masthead -->

            <div class="container-fluid">
                <h2 class="lead site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>

            <div id="content" class="site-content">
