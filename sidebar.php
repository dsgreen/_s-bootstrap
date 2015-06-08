<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package UnderBoot
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

                <div id="secondary" role="complementary" class="col-sm-3">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div><!-- #secondary -->
