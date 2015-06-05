<?php
/**
 * ACF Pro examples
 *
 * Example code for a repeater field type.
 *
 * @package UnderBoot
 */

get_header(); ?>

    <div id="primary" class="content-area container-fluid">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

            <?php
            // Example 1
            // Repeating columns contained within a row. Best for a known quantity of items.
            ?>
            <div class="row">
                <?php
                if( have_rows('repeater_field') ):
                    $i = 0;
                    while ( have_rows('repeater_field')) : the_row();
                        // In case of accidental empty row, fill with empty string to avoid error.
                        $name   = get_sub_field('name')  != '' ? get_sub_field('name') : '';
                        $image  = get_sub_field('image') != '' ? get_sub_field('image') : ['url'=>'','alt'=>''];
                        $link   = get_sub_field('link')  != '' ? get_sub_field('link') : '';
                ?>
                <div class="col-sm-5 item<?php if ($i == 0) { echo ' col-sm-offset-1';}; ?>">
                    <a href="<?php echo $link; ?>">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive">
                        <h2><?php echo $name; ?></h2>
                    </a>
                </div>
                <?php
                    $i++;
                    endwhile;
                else:
                    // No rows found.
                endif;
                ?>
            </div>

            <?php
            // Example 2
            // Repeating rows. A new row for each item.

            if( have_rows('repeater_field') ):
                $i = 0;
                while ( have_rows('repeater_field')) : the_row();
                    // In case of accidental empty row, fill with empty string to avoid error.
                    $name = get_sub_field('name')  != '' ? get_sub_field('name') : '';
                    $img  = get_sub_field('image') != '' ? get_sub_field('image') : ['url'=>'','alt'=>''];
                    $link = get_sub_field('link')  != '' ? get_sub_field('link') : '';
                    ?>
                    <div class="row item<?php if ($i == 0) { echo ' first';}; ?>">
                        <a href="<?php echo $link; ?>">
                            <div class="col-sm-6 col-sm-offset-1">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="500" height="250" class="img-responsive">
                            </div>
                            <div class="col-sm-5">
                                <h2><?php echo $name; ?></h2>
                            </div>
                        </a>
                    </div>
                    <?php
                    $i++;
                endwhile;
            else:
                // no rows found
            endif;
            ?>

            <?php
            // Example 3
            // Two column grid layout for an unknown number of items.

            if( have_rows('repeater_field') ):
                $i = 0;
                while ( have_rows('repeater_field')) : the_row();
                    // In case of accidental empty row, fill with empty string to avoid error.
                    $name = get_sub_field('name')  != '' ? get_sub_field('name') : '';
                    $img  = get_sub_field('image') != '' ? get_sub_field('image') : ['url'=>'','alt'=>''];
                    $link = get_sub_field('link')  != '' ? get_sub_field('link') : '';
            ?>
            <?php
                    // $i is 0 to begin with
                    if ($i % 2 == 0) { ?>
                    <div class="row">
                    <?php }; ?>
                        <div class="col-sm-5 item<?php if ($i % 2 == 0) { echo ' col-sm-offset-1';}; ?>">
                            <a href="<?php echo $link; ?>">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="img-responsive">
                                <h2><?php echo $name; ?></h2>
                            </a>
                        </div>
                    <?php
                    // close the row after 2nd column
                    if ($i % 2 !== 0) { ?>
                    </div>
                    <?php }; ?>
            <?php
                $i++;
                endwhile;
            else:
                // no rows found
            endif;
            ?>

            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
