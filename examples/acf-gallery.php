<?php
/**
 * ACF Pro examples
 *
 * Example code for the gallery field type.
 * Formatted for the RoyalSlider plugin.
 *
 * @package UnderBoot
 */

get_header(); ?>

<div class="sliderContainer">
	<div class="royalSlider rsMinW" id="rs">
		<?php
		$images = get_field('gallery');
		//print_r($images);
		if( $images ):
			foreach( $images as $image ):
			?>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] != '' ? $image['alt'] : $image['title']; ?>" class="rsImg" data-rsw="1500" data-rsh="1015">
			<?php
			endforeach;
		endif;
		?>
	</div>
</div>

<?php get_footer(); ?>
