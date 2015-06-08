<?php
/**
 * The template for displaying all single posts.
 *
 * @package UnderBoot
 */

get_header(); ?>

                <main id="main" class="site-main col-sm-8" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'single' ); ?>

                    <?php the_post_navigation(); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>

                <?php endwhile; // End of the loop. ?>

                </main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
