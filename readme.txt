=== Case-Insensitive Passwords ===
Contributors: layotte
Tags: password, case, strtolower, insensitive
Requires at least: 2.8
Tested up to: 3.0.2
Stable tag: 0.0.1

Enables case-insensitive authentication for new passwords created on your WordPress website.

== Description ==

The basic premise of my plugin is that it takes the password given to it and forces it to lowercase before hashing it and storing it in the database. When a user logs in, it will take the password input and force it to lowercase, hash it, and compare it to what is stored in the database. This produces the affect of case-insensitivity. The case-insensitivity only works for newly generated passwords, so I built the plugin to check the password submitted without forcing to lowercase, if it fails it will force it to lowercase and check again.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `case-insensitive-passwords` directory to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Where can I find additional help or make suggestions? =

Although I do not really plan on doing much with this plugin, feel free contact me using my [contact form](http://lewayotte.com/contact) and I will respond as soon as possible.

== Changelog ==
= 0.0.1 =
* Initial release -- tested on WordPress 3.0.x, but should work from 2.8.x and above.