// SVG to PNG, older browsers
// source: http://dbushell.com/2013/02/04/a-primer-to-front-end-svg-hacking/
// license: unknown
if (!Modernizr.svg) {
  $('img[src$=".svg"]').each(function () {
    $(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
  });
}

// add responsive class to images within post
$('.entry-content img').addClass('img-responsive');