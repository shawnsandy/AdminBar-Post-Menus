=== Adminbar Post Menus ===
Contributors: shawnsandy.com
Donate link: http://autoloadmanager.shawnsandy.com/
Tags: adminbar, menu, quickjump
Requires at least: 3.3.2
Tested up to: 3.3.4
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds menu list of post by status to your WP admin bar, quickly jump to and and from post, easily from the admin menu.

== Description ==

Features

**REQUIRES: Autoload Manager -  http://wordpress.org/extend/plugins/al-manager/**

* Simple and easy to use
* No complicated options menu(s)
* Plugabble
* Easy to customize in your theme functions
* Modular

I really tried to keep this plugin simple and modular, no plugin options; roll your own if thats you thing or modify it in your theme functions file.


Customize your Adminbar Post Menus drop this code in your functions.php file or the now popular way in you own "theme plugin". Don't forget to modify the post_type array to match your custom post types. More documentation will be coming soon.

`/**
 * Customize your Adminbar Post Menus
 *
 */
function apm_menus() {
    //create an post_type array(post_type, menu_title);
    $post_types  =  array('post' => 'Posts', 'page' => 'Pages','cwp_article' => 'Articles','cwp_faq' => "FAQ(s)");

    //load and run the class
    $apmmenus = AdminbarPostMenus::add_menus()->set_post_types($post_types)->nodes();
}
// run the function on init;
add_action('init', 'apm_menus');`


== Installation ==

1. Upload plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== How do I modify/change the list of menus ==

= You add/change menu in you theme functions file =


== Screenshots ==

Coming Soon.

== Changelog ==

= 0.1 =
Beta release version.

== Arbitrary section ==

***
