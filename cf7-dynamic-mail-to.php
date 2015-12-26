<?php 

	/*
		Plugin Name: Dynamic Recipient for Contact Form 7
		Plugin URI: https://github.com/Hube2/contact-form-7-dynamic-mail-to
		Description: Alter the to email address of mail in Contact Form 7 dynamically. Requires Contact Form 7
		Version: 1.0.0
		Author: John A. Huebner II
		Author URI: https://github.com/Hube2/
		License: GPL
	*/
	
	// If this file is called directly, abort.
	if (!defined('WPINC')) { die; }
	
	//include(dirname(__FILE__).'/cf7-dynamic-mail-to-examples.php');
	
	new wpcf7_dynamic_mail_to();
	
	class wpcf7_dynamic_mail_to {
		
		public function __construct() {
			add_action('wpcf7_before_send_mail', array($this, 'wpcf7_before_send_mail'));
		} // end public function __construct
		
		public function wpcf7_before_send_mail($form) {
			$mail = $form->properties;
			$properites = $form->get_properties();
			//echo '<pre>'; print_r($_POST); die;
			//echo '<pre>'; print_r($properites); die;
			if (!isset($_POST['dynamic-mail-to-filter'])) {
				return;
			}
			$filter = $_POST['dynamic-mail-to-filter'];
			$args = array();
			if (isset($_POST['dynamic-mail-to-fields'])) {
				$fields = $_POST['dynamic-mail-to-fields'];
				$fields = str_replace(' ', '', $fields);
				if ($fields != '') {
					$fields = explode(',', $fields);
					foreach ($fields as $field) {
						$value = '';
						if (isset($_POST[$field])) {
							$value = $_POST[$field];
						}
						$args[$field] = $value;
					} // end foreach $fields
				} // end in fields
			} // end if fields
			$recipient = $properites['mail']['recipient'];
			$new_recipient = apply_filters($filter, $recipient, $args);
			$properites['mail']['recipient'] = $new_recipient;
			$form->set_properties($properites);
		} // end public function wpcf7_before_send_mail
	} // end class wpcf7_dynamic_mail_to
	
?>