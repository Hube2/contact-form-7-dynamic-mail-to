<?php 
	
	/*
			This file contains and example filter and an example shortcode
			to use with Contact Form 7 - Dynamic Mail To
			You will need to edit this file to get it to work
			the email addresses in this file are not real email addresses (as far as I know)
			after changing this file to include valid email addresses follow the instructions
			in readme.txt for setting up either the filter or the shortcode example
			
	*/
	
	// If this file is called directly, abort.
	if (!defined('WPINC')) { die; }
	
	new wpcf7_dynamic_mail_to_examples();
	
	class wpcf7_dynamic_mail_to_examples {
		
		// these are the email addresses to be used to for setting the recipient email address in cf7
		private $email_address_1 = 'hube02@earthlink.net';
		private $email_address_2 = 'johnhuebner@site-seeker.com';
		private $email_address_3 = '';
		
		public function __construct() {
			add_filter('wpcf7-dynamic-mail-to-example-filter', array($this, 'filter'), 10, 2);
		} // end public function __construct
		
		public function filter($recipient, $args=array()) {
			//echo '(',$recipient,')';
			//print_r($args); die;
			if (isset($args['select-email'])) {
				if ($args['select-email'] == 'send to email 1') {
					$recipient = $this->email_address_1;
				} elseif ($args['select-email'] == 'send to email 2') {
					$recipient = $this->email_address_2;
				} elseif ($args['select-email'] == 'sent to email 3') {
					$recipient = $this->email_address_3;
				}
			}
			return $recipient;
		} // end public function filter
		
	} // end class wpcf7_dynamic_mail_to_examples
	
	/*
	function wpcf7_dynamic_to_filter_example($recipient, $args=array()) {
		if (isset($args['select-email'])) {
			if ($args['select-email'] == 'send to email 1') {
				$recipient = 'email-01@email.com';
			} elseif ($args['select-email'] == 'send to email 2') {
				$recipient = 'email-02@email.com';
			} elseif ($args['select-email'] == 'send to email 3') {
				$recipient = 'email-03@email.com';
			}
		}
		return $recipient;
	} // end function wpcf7_dynamic_to_filter_example
	add_filter('wpcf7-dynamic-recipient-example-filter', 'wpcf7_dynamic_to_filter_example', 10, 2);
	*/
	
	
?>