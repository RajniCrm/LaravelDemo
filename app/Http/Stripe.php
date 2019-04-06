<?php
	namespace App\Http;

	class Stripe
	{
		public $key, $app_name, $mail_driver;
		public function __construct($key, $app_name, $mail_driver)
		{
			// print_r($key); exit;
			$this->key = $key;
			$this->app_name = $app_name;
			$this->mail_driver = $mail_driver;
		}
	}


?>