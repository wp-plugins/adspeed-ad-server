=== AdSpeed Ad Server ===
Contributors: AdSpeed
Donate link: http://www.adspeed.com/
Tags: advertising, ad server, ad manager, adspeed, banner rotation, banner delivery, impression tracking
Requires at least: 2.9.1
Tested up to: 3.2.1
Stable tag: trunk

This plugin displays advertising on the sidebar and/or inside any blog post. The ads are hosted and managed at AdSpeed ad server. To use this plugin, you need an active account with AdSpeed Ad Server. To sign up for an ad management account, please visit this page: http://www.adspeed.com/Publishers/register.html

== Description ==

AdSpeed.com is a hosted ad server and ad manager. You enter your ads and targeting criteria into AdSpeed. We serve ads, track and report real-time statistics about ad impressions, clicks, revenue, and conversions. You manage your ad inventory through our online user-friendly interface. 

AdSpeed has released a plugin for WordPress, a popular publishing platform. This plugin displays advertising on the sidebar and inside any blog post. A publisher account with AdSpeed is required to manage advertisements. Ad styling can be customized via CSS class "AdSpeedWP".

Ads on the Sidebar
------------------
Click on menu Appearance/Widgets and drag AdSpeed Ad Server to the sidebar. For each ad placement, you need to specify a zone identification number. You can find the zone ID from the zone listing, do NOT use the zone name. This zone must exist within your AdSpeed account.

Ads in a Blog Entry
-------------------
To use it in a post, write this macro "{AdSpeed:Zone:1234}" to display a creative from zone #1234. In this example, #1234 is a zone identification number in your AdSpeed account. You can find the zone ID from the zone listing, do NOT use the zone name. This macro will be replaced with the actual serving code for the zone in the post.

== Installation ==

1. Download and copy the file AdSpeed.wp.php into folder wp-content/plugins/ of your working WordPress installation.
2. Sign into the administrator account and activate AdSpeed Ad Server from the menu Plugins.
3. The plugin is now activated! You can view instructions and settings under menu Settings/AdSpeed Ad Server.
4. Click on menu Appearance/Widgets and drag AdSpeed Ad Server to the sidebar.
5. Click to extend the widget and specify how many ad placements you want to display. Fill in the zone ID for each placement and click Save.
6. For ads within a blog entry, simply compose an entry as usual and write the macro {AdSpeed:Zone:XXX} where you want to serve ads for the zone number XXXX.
7. Each ad is within a DIV container with CSS class "AdSpeedWP" so that you can apply custom CSS styling to the ad.

== Frequently Asked Questions ==

See http://www.adspeed.com/Knowledges/1030/Serving_Code/AdSpeed_Plugin_WordPress.html

== Screenshots ==

See http://www.adspeed.com/Knowledges/1030/Serving_Code/AdSpeed_Plugin_WordPress.html

== Changelog ==

= 1.0 =
* First release (2009-07-16 15:07:42)
= 1.1 =
* Compatible with 2.9.1 (2010-01-12 09:16:40)
= 1.2 =
* Compatible with 3.2.1 (2011-07-26 14:15:30)

