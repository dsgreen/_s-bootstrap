jQuery(document).ready(function($) {

  // SVG to PNG, older browsers: http://dbushell.com/2013/02/04/a-primer-to-front-end-svg-hacking/
  if (!Modernizr.svg) {
    $('img[src$=".svg"]').each(function() {
      $(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
    });
  }

  // add responsive class to post thumbnails
  $('.attachment-post-thumbnail').addClass('img-responsive');

  /*
   * in page scrolling
   */
  $.localScroll.defaults.axis = "y";

  // Scroll initially if there's a hash (#something) in the url
  $.localScroll.hash({
    duration:500
  });

  $.localScroll({
    duration:500,
    hash:true
  });

});