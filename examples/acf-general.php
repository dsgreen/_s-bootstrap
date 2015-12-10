<?php
/**
 * ACF Pro examples
 *
 * Example code for a basic field type (text/textarea).
 *
 * @package _s
 */

get_header(); ?>

    <div id="primary" class="content-area container-fluid">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

            <div class="row">
                <?php
                $the_field = get_field('the_field') != '' ? get_field('the_field') : '';
                ?>
                <div class="col-sm-12">
                    <?php echo $the_field; ?>
                </div>
            </div>

            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
