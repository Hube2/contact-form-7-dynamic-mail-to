=== Contact Form 7 - Dynamic Mail To ===
Contributors: Hube2
Tags: contact form 7, dynamic, mail to, recipient
Requires at least: 4.0
Tested up to: 4.2
Stable tag: 1.0.0
Donate link:
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Set recipient email dynamically by useing a filter


== Description ==

Dynamically set recipitent of mail using a filter.

How To Use
----------

Create a filter that will return the recipient of mail. For more information see the example filter in
cf7-dynamic-mail-to-examples.php included with the plugin.

Add a field to you form with the name "dynamic-mail-to-filter". This can be any type of field that holds
a single value. I would suggest trying out my other plugin
[Contact Form 7 - Simple Hidden Field](https://wordpress.org/plugins/contact-form-7-simple-hidden-field/). 
You can also use another hidden field extension for CF7. Set the value of this field to the name of your
filter hook.

If you would like the values of other fields sent to your filter as arguments, add a field with the name of
"dynamic-mail-to-fields." Set the value of this field to a comma separated list of the fields values you 
want sent to your filter. Again, see the example filter supplied with this plugin.

== Installation ==

1. Upload the files to the plugin folder of your site
2. Activate it from the Plugins Page


== Screenshots ==


== Frequently Asked Questions ==


== Changelog ==

= 1.0.0 =

* initial release