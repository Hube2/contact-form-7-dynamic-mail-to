# contact-form-7-dynamic-mail-to

1. Add a hidden field to your form. This hidden field can be added using my other plugin [Hidden Field for Contact Form 7](https://wordpress.org/plugins/contact-form-7-simple-hidden-field/). I believe that there are other plugins available that will let you do this. The name of this hidden field should be `dynamic-mail-to-filter` and the value of this hidden field should be the filter hook that this plugin should use to get your dynamic value. For example, if this is the code used to set up the filter and function: ```add_filter('my_dynamic_mailto_hook', 'my_dynamic_mailto_function', 10, 2);``` the the value of this hidden field should be `my_dynamic_mailto_hook'.
2. test
