=== Simple Blog Card ===
Contributors: Katsushi Kawamori
Donate link: https://shop.riverforest-wp.info/donate/
Tags: block, blogcard, card, external link, internal link, linkcard
Requires at least: 4.7
Requires PHP: 8.0
Tested up to: 6.4
Stable tag: 1.41
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Get OGP and display blog card.

== Description ==

= Blog card =
* Generated with shortcode
* Generated with block
* Can specify the number of characters displayed in the description.
* Displays an ogp image.
* Can specify the size of the displayed ogp image.
* Can change the title and description.

= How it works =
[youtube https://youtu.be/iFhQkANSN_w]

== Installation ==

1. Upload `simple-blog-card` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

none

== Screenshots ==

1. View
2. Block
3. Settings

== Changelog ==

= [1.41] 2024/02/09 =
* Fix - Error that occurs when the title or description cannot be retrieved.

= [1.40] 2024/02/04 =
* Added - Added 'encoding' option. Can specify the character encoding of site.

= [1.39] 2024/01/19 =
* Fix - Deprecated error in php8.2. mb_convert_encoding => mb_encode_numericentity.
* Fix - Deprecated error in php8.2. Dynamic Property Issues.

= 1.38 =
Fixed an error that occurred when the URL was a file.

= 1.37 =
Site information retrieval was changed from cURL to wp_remote_get.

= 1.36 =
Rebuild blocks.

= 1.35 =
Rebuild blocks.

= 1.34 =
Rebuild blocks.

= 1.33 =
Supported WordPress 6.4.
PHP 8.0 is now required.

= 1.32 =
Fixed an issue where protected content could be retrieved with subscriber user. Thanks[Bob](https://wpscan.com/).

= 1.31 =
Fixed problem of XSS via shortcode. Thanks[Dmitrii Ignatyev](https://cleantalk.org/).

= 1.30 =
Fixed a ratio problem with portrait images.

= 1.29 =
Fixed problem with sites without description.

= 1.28 =
Fixed problem with sites without thumbnails.

= 1.27 =
Fixed the display of thumbnails in the same host.

= 1.26 =
Host names are now hidden within the same host.

= 1.25 =
Host name is now displayed.

= 1.24 =
Added escaping of html special characters.

= 1.23 =
Fixed a problem in which the site name was not displayed on some sites.
Fixed a problem with insufficient string retrieval at some sites.
The maximum length of the description in the settings has been changed to 300.

= 1.22 =
Fixed a translation issue.

= 1.21 =
WordPress 6.1 is now supported.

= 1.20 =
Fixed a problem with parameters.

= 1.19 =
Supported WordPress 6.0.

= 1.18 =
Fixed a problem with parameters.
Rebuilt the block.

= 1.17 =
Supported WordPress 5.7.

= 1.16 =
Added the ability to modify CSS in the admin panel.

= 1.15 =
Separated some style CSS for cards as files.

= 1.14 =
Added the ability to change the line height of the title, the line height of the description, and the width of the vertical line color.

= 1.13 =
Supported WordPress 5.6.

= 1.12 =
Added description of shortcode.

= 1.11 =
Fixed a translation issue.

= 1.10 =
The block now supports ESNext.

= 1.09 =
Fixed block loading error.

= 1.08 =
Supported open new tab.

= 1.07 =
Cache interval change.
Fixed problem of timeout.

= 1.06 =
Add cache removal option.
Add timeout change option.

= 1.05 =
Changing the timeout value.

= 1.04 =
Added cache function.

= 1.03 =
Added input place of URL.

= 1.02 =
Changed the parsing method.

= 1.01 =
Fixed OGP acquisition issue.

= 1.00 =
Initial release.

== Upgrade Notice ==

= 1.32 =
Security measures.

= 1.31 =
Security measures.

= 1.00 =

