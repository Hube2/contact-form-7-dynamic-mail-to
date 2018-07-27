=== Dynamic Recipient for Contact Form 7 ===
Contributors: Hube2
Tags: adopt-me, contact form 7, dynamic, mail to, recipient
Requires at least: 4.0
Tested up to: 4.9
Stable tag: 1.0.0
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=hube02%40earthlink%2enet&lc=US&item_name=Donation%20for%20WP%20Plugins%20I%20Use&no_note=0&cn=Add%20special%20instructions%20to%20the%20seller%3a&no_shipping=1&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Set recipient email dynamically by useing a filter


== Description ==

Addopt this plugin. [Please see details on Github](https://github.com/Hube2/contact-form-7-dynamic-mail-to).

Dynamically set recipitent of mail using a filter.

How To Use
----------

Create a filter that will return the recipient of mail. For more information see the example filter in
cf7-dynamic-mail-to-examples.php included with the plugin.

`function wpcf7_dynamic_to_filter_example($recipient, $args=array()) {
  if (isset($args['select-email'])) {
    if ($args['select-email'] == 'send to email 1') {
      $recipient = 'email-01@email.com';
    } elseif ($args['select-email'] == 'send to email 2') {
      $recipient = 'email-01@email.com';
    } elseif ($args['select-email'] == 'sent to email 3') {
      $recipient = 'email-01@email.com';
    }
  }
  return $recipient;
} // end function wpcf7_dynamic_to_filter_example
add_filter('wpcf7-dynamic-recipient-example-filter', 'wpcf7_dynamic_to_filter_example', 10, 2);`

Add special fields to your form, see screenshot of example fields.

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

1. Special Fields in CF7 Example

== Frequently Asked Questions ==

= Tell me how to use this thing again =
It seems that my instructions in the description are not exactly clear, so here's a step by step

1. Add a hidden field to your form. This hidden field can be added using my other plugin [Hidden Field for Contact Form 7](https://wordpress.org/plugins/contact-form-7-simple-hidden-field/). I believe that there are other plugins available that will let you do this.
The name of this hidden field must be `dynamic-mail-to-filter` and the value of this hidden field should be the filter hook that this plugin should use to get your dynamic value. For example, if this is the code used to set up the filter and function:
```

add_filter('my_dynamic_mailto_hook', 'my_dynamic_mailto_function', 10, 2);

```
then the value of this hidden field should be `my_dynamic_mailto_hook`.

2. Set up optional parameters. This allows you to pass the values of other fields in your form to your filter function so that they can be used in determining the mailto address to return.  

For example, you could pass the post ID value of the current page. First set up a hidden field that contains the post ID. This can also be done with my hidden field plugin and with other plugins. Let's say for example that you name this field `post-id`. To pass the value of this field to your filter you would then create another hidden field. The name of this hidden field must be `dynamic-mail-to-fields`. The value of this field would be `post-id`. The value of this field should be a comma seperated list of all the other field names that you want to pass to your filter. For example if we wanted to use 2 fields named `post-id` and `user-id` then the value of the hidden field named `dynamic-mail-to-fields` would be `post-id,user-id`. Now let's assume that this is the code of your function
```

function my_dynamic_mailto_function($recipient, $args) {
  // the code of your function here
}

```
and we have set up the `dynamic-mail-to-fields` field to have the value of `post-id,user-id`, in this case the value of `$args` would be
```

Array (
  'post-id' => '10', // assuming the post id was 10
  'user-id' => '5',  // assuming the user id was 5
)

```

3. Complete your function that determines who the recipient (or recipients) of your form should be. You can return a single email address or a comma separated list of email addresses. For example
 * someone@somewhere.com
 * John Doe <johndoe@google.com>
 * someone@somewhere.com, John Doe <johndoe@google.com>


= Why Filters? =

Many other plugins of this type use shortcodes. I'm not a real fan of shortcodes, but that's not the only
reason. 

Filters are much more flexible that shortcodes. 

For example, a shortcode cannot return an array. A shortcode pretty much requires that only a text value is returned.


== Changelog ==

= 1.0.0 =

* initial release