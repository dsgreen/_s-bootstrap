<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderBoot
 */
?>

            </div><!-- #content -->

            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="site-info container-fluid">
                    <p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'under-boot' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'under-boot' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'under-boot' ), 'UnderBoot', '<a href="http://douglasgreen.com" rel="designer">Douglas Green</a>' ); ?></p>
                </div><!-- .site-info -->
            </footer><!-- #colophon -->
        </div><!-- #page -->

<?php wp_footer(); ?>

    </body>
</html>
