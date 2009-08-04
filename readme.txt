=== AdSpeed Ad Server ===
Contributors: AdSpeed
Donate link: http://www.adspeed.com/
Tags: advertising, ad server, ad manager, adspeed
Requires at least: 2.7
Tested up to: 2.7
Stable tag: trunk

Serve ads on the sidebar or within a post entry. The ads are hosted and managed at AdSpeed ad server.

== Description ==

AdSpeed has released a plugin for WordPress, a popular publishing platform. This plugin displays advertising on the sidebar and inside a blog post.

Ads on the Sidebar: Click on menu Appearance/Widgets and drag AdSpeed Ad Server to the sidebar. You can then choose how many ad placements to be serve on the sidebar. For each ad placement, you need to specify a zone identification. This zone must exist in your AdSpeed account.

Ads in a Blog Entry: To use it in a post, write this macro {AdSpeed:Zone:1234} (with 1234 to be a zone identification in your AdSpeed account) where you want the ad to display. The macro will be replaced with the serving code for the zone.

== Installation ==

1. Download and copy the file AdSpeed.wp.php into folder wp-content/plugins/ of your working WordPress installation.
2. Sign into the administrator account and activate AdSpeed Ad Server from the menu Plugins
3. The plugin is now activated! You can view instructions and settings under menu Settings/AdSpeed Ad Server
4. Click on menu Appearance/Widgets and drag AdSpeed Ad Server to the sidebar
5. Click to extend the widget and specify how many ad placements you want to display. Fill in the zone ID for each placement and click Save
6. For ads within a blog entry, simply compose an entry as usual and write the macro {AdSpeed:Zone:XXX} where you want to serve ads for the zone XXXX

== Frequently Asked Questions ==

See http://www.adspeed.com/Knowledges/1030/Serving_Code/AdSpeed_Plugin_WordPress.html

== Screenshots ==

See http://www.adspeed.com/Knowledges/1030/Serving_Code/AdSpeed_Plugin_WordPress.html

== Changelog ==

= 1.0 =
* First release (2009-07-16 15:07:42)