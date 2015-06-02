jQuery(document).ready(function($) {

    // SVG to PNG, older browsers: http://dbushell.com/2013/02/04/a-primer-to-front-end-svg-hacking/
    /*
    if (!Modernizr.svg) {
        $('img[src$=".svg"]').each(function() {
            $(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
        });
    }
    */

    // add responsive class to images within post
    $('.entry-content img').attr('class','img-responsive');

});