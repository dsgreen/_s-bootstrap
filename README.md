[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

_s-bootstrap
============

This is a blank starter theme based on the `underscores` theme (http://underscores.me). It adds a few Bootstrap classes to the theme markup but is designed to be a starter theme for a custom design rather than a complete theme. Customize as you see fit.

Some things have been added to the default `underscores` theme, including:

* The `container-fluid` class to the main content container
* The `no-js` class to the HTML tag
* HTML5 Shiv and IE media query polyfill
* The main navigation menu uses the Bootstrap navbar component and the Bootstrap navwalker
* Example code for custom post thumbnail sizes
* Loads Bootstrap and jQuery assets via their respective CDNs
* Includes a customized version of the Modernizr library
* Includes a `main.js` placeholder file
* `underscores` CSS overridden by Bootstrap is commented out
* A `_custom.scss` file with Bootstrap overrides

Getting Started
---------------

If you want to set things up manually, download this repo from GitHub. The first thing you want to do is copy the `_s-bootstrap` directory and change the name to something else (like, say, `megatherium`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in style.css.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
5. Search for `_s-` to capture prefixed handles.

OR

* Search for: `'_s'` and replace with: `'megatherium'`
* Search for: `_s_` and replace with: `megatherium_`
* Search for: `Text Domain: _s` and replace with: `Text Domain: megatherium` in style.css.
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `_s-` and replace with: `megatherium-`

Then, update the stylesheet header in `style.scss` with your own information. Next, update or delete this readme.

Notes
-----
* For the `_s` repo, see https://github.com/Automattic/_s.
* Bootstrap navwalker source: https://github.com/twittem/wp-bootstrap-navwalker