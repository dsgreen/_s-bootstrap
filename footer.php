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
        <div class="site-info container-fluid">
            <p class="small pull-left">&copy; Copyright 2015 <i><?php bloginfo( 'name' ); ?></i></p>
            <p class="small pull-right"><a href="#top"><i class="glyphicon glyphicon-triangle-top"></i> <?php esc_html_e( 'back to top', '_s' ); ?></a></p>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
