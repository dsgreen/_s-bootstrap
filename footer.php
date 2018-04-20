<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
        </div><!--/row--><?php // from header.php ?>
	</div><!--/#content-->

    <footer class="site-footer" role="contentinfo">
        <div class="container-fluid site-info">
            <p class="small float-left">&copy; Copyright 2018 <?php bloginfo( 'name' ); ?></p>
            <p class="small float-right"><a href="#top"><i class="fa fa-angle-up"></i> <?php esc_html_e( 'Back to top', '_s' ); ?></a></p>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
