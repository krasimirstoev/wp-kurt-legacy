=== Kurt Vonnegut HTTP header ===
Contributors: krasimirstoev
Tags: kurt vonnegut, http, headers
Requires at least: 2.8
Tested up to: 6.6.1
Stable tag: 0.3
License: GPLv3

Add an X-Kurt-Legacy header.

== Description ==

This plugin just adds additional http header to pages. 

== Installation ==

1. Unzip and upload the `wp-kurt-legacy` folder to your `/wp-content/plugins/` directory.
2. Activate the plugin on the WordPress 'Plugins' page.

There is no settings page.

== Changelog ==

= 0.1 =
* Initial commit. First version of plugin.
= 0.2 = 
* Adding the legacy as a mail header.
= 0.2.1 =
* A few improvements: prevent direct access to the plugin file, clear and consistent PHPDoc comments for each function and implified the logic for handling mail headers to ensure the header always added correctly.
= 0.3 =
* Added enhanced error logging to track HTTP header, meta tag, and email header additions.
