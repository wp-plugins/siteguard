=== SiteGuard WP Plugin ===
Contributors: jp-secure
Donate link: -
Tags: security, waf
Requires at least: 3.9
Tested up to: 4.0
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

SiteGurad WP Plugin is the plugin specialized for the protection against the attack to the management page and login.

== Description ==

Simply install the SiteGuard WP Plugin, WordPress security is improved. 
This plugin is a security plugin that specializes in the login attack of brute force, such as protection and management capabilities.

Notes

* It does not support the multisite function of WordPress.
* It only supports Apache 2.x for Web servers.
* To use the CAPTCHA function, the expansion library “mbstring” and “gd” should be installed on php.
* To use the management page filter function and login page change function, “mod_rewrite” should be loaded on Apache.
* To use the WAF Tuning Support, WAF ( SiteGuard Lite ) should be installed on Apache. 

There are the following functions. 

* Admin Page IP Filter

It is the function for the protection against the attack to the management page (under wp-admin.)
To the access from the connection source IP address which does not login to the management page, 404 (Not Found) is returned.
At the login, the connection source IP address is recorded and the access to that page is allowed.
The connection source IP address which does not login for more than 24 hours is sequentially deleted.
The URL (under wp-admin) where this function is excluded can be specified.

* Rename Login

It is the function to decrease the vulnerability against an illegal login attempt attack such as a brute force attack or a password list attack.
The login page name (wp-login.php) is changed. The initial value is “login_<5 random digits>” but it can be changed to a favorite name.

* CAPTCHA 

It is the function to decrease the vulnerability against an illegal login attempt attack such as a brute force attack or a password list attack,
or to receive less comment spam. For the character of CAPTCHA, hiragana and alphanumeric characters can be selected.

* Login Lock

It is the function to decrease the vulnerability against an illegal login attempt attack such as a brute force attack or a password list attack.
Especially, it is the function to prevent an automated attack. The connection source IP address the number of login failure of which reaches
the specified number within the specified period is blocked for the specified time.
Each user account is not locked.

* Disable Pingback

The pingback function is disabled and its abuse is prevented.

* WAF Tuning Support

It is the function to create the rule to avoid the false detection in WordPress (including 403 error occurrence with normal access,)
if WAF ( SiteGuard Lite ) by JP-Secure is installed on a Web server. WAF prevents the attack from the outside against the Web server,
but for some WordPress or plugin functions, WAF may detect the attack which is actually not attack and block the function.
By creating the WAF exclude rule, the WAF protection function can be activated while the false detection for the specified function is prevented. 

== Installation ==

* WordPress dashboard
1. Please search and install "SiteGuard WP Plugin" from 'Plugins' menu of WordPress dashboard
2. Activate the plugin through the 'Plugins' menu of WordPress dashboard

* WordPress.org plugin directory
1. Please search and download "SiteGuard WP Plugin"
2. Please upload and install a ZIP file that you downloaded through 'Plugins' menu of WordPress dashboard
3. Activate the plugin through the 'Plugins' menu of WordPress dashboard

== Screenshots ==

* SiteGuard WP Plugin - Dashboard -

== Frequently Asked Questions ==

http://www.jp-secure.com/cont/products/siteguard_wp_plugin/faq_en.html

== Changelog ==
= 1.0.4 =
* Fix bug that fails to update .htaccess, if there is no WordPress settings in .htaccess
= 1.0.3 =
* Fix a problem that "Rename Login" does not work, if you change Permalink settings
* Fix the collision of class name of Really Simple CAPTCHA
= 1.0.2 =
* Fix a minor html escape leakage
* Reduced the problem of affinity with other plugin [WordPress HTTPS (SSL)]
= 1.0.1 =
* Supported with WP 4.0
= 1.0.0 =
* First release
