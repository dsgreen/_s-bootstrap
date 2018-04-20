<?php
/**
 *
 * Template Name: Custom
 * Example custom page.
 *
 * @package _s
 */

get_header();
//get_header('custom');
?>

                <main class="col-md-9 site-main" id="main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'template-parts/content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    <?php endwhile; // End of the loop. ?>

                </main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer();
//get_footer('custom');
?>
