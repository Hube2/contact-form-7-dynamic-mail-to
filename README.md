# contact-form-7-dynamic-mail-to


== Frequently Asked Questions ==

= Tell me how to use this thing again =
It seems that my instructions in the description are not exactly clear, so here's a step by step

1. Add a hidden field to your form. This hidden field can be added using my other plugin [Hidden Field for Contact Form 7](https://wordpress.org/plugins/contact-form-7-simple-hidden-field/). I believe that there are other plugins available that will let you do this. The name of this hidden field must be `dynamic-mail-to-filter` and the value of this hidden field should be the filter hook that this plugin should use to get your dynamic value. For example, if this is the code used to set up the filter and function: <br />```
add_filter('my_dynamic_mailto_hook', 'my_dynamic_mailto_function', 10, 2);
```<br /> then the value of this hidden field should be `my_dynamic_mailto_hook`.
2. Set up optional parameters. This allows you to pass the values of other fields in your form to your filter function so that they can be used in determining the mailto address to return. For example, you could pass the post ID value of the current page. First set up a hidden field that contains the post ID. This can also be done with my hidden field plugin and with other plugins. Let's say for example that you name this field `post-id`. To pass the value of this field to your filter you would then create another hidden field. The name of this hidden field must be `dynamic-mail-to-fields`. The value of this field would be `post-id`. The value of this field should be a comma seperated list of all the other field names that you want to pass to your filter. For example if we wanted to use 2 fields named `post-id` and `user-id` then the value of the hidden field named `dynamic-mail-to-fields` would be `post-id,user-id`. Now let's assume that this is the code of your function <br />```lkdsafljas```