<?php

class Billing{
	
	// create customer
	public static function create_stripe_customer($email, $token){
		
		$stripe_customer = \Stripe\Customer::create(array(
			"email" 		=> $email,
			"description" 	=> "Customer for ".$email.".",
			"source"		=> $token 
		));

		$stripe_customer_id = $stripe_customer['id'];
		
		return $stripe_customer_id;
	}
	
	// charge for 0-50 monthly || curerntly using this funtion on main index.php
	public static function pkg_one_month($stripe_customer_id, $email, $token){
		
		$stripe_pkg_one_month = \Stripe\Subscription::create(array(
			"customer" => $stripe_customer_id,
			"source" => $token,
			"trial_period_days" => 14,
		  	"items" => array(
				array(
		  			"plan" => "1", 
				),
			)
		));
		
		// amount for the subscription 
		$amount = 15000;
		
		// charge the user for one month
		//Billing::charge_pkg_one_month($stripe_customer_id, $token, $amount);
		
		$pkg_db_id = 0;
		
		return $pkg_db_id;
	}
	
	public static function pkg_one_year($stripe_customer_id, $email, $token){
		
		$stripe_pkg_one_month = \Stripe\Subscription::create(array(
			"customer" => $stripe_customer_id,
			"source" => $token,
			"trial_period_days" => 14,
		  	"items" => array(
				array(
		  			"plan" => "2", 
				),
			)
		));
		
		$pkg_db_id = 1;
		
		return $pkg_db_id;
		
	}
	
	public static function pkg_two_month($stripe_customer_id, $email, $token){
		
		$stripe_pkg_one_month = \Stripe\Subscription::create(array(
			"customer" => $stripe_customer_id,
			"source" => $token,
			"trial_period_days" => 14,
		  	"items" => array(
				array(
		  			"plan" => "3", 
				),
			)
		));
		
		$pkg_db_id = 2;
		
		return $pkg_db_id;
		
	}
	
	public static function pkg_two_year($stripe_customer_id, $email, $token){
		
		$stripe_pkg_one_month = \Stripe\Subscription::create(array(
			"customer" => $stripe_customer_id,
			"source" => $token,
			"trial_period_days" => 14,
		  	"items" => array(
				array(
		  			"plan" => "4", 
				),
			)
		));
		
		$pkg_db_id = 3;
		
		return $pkg_db_id;
		
	}
	
	
	// create a card for the new user
	public static function create_card($customer_id, $token){
		
		
		
	}
	
	
	/**
	** EVERYTHING BELOW THIS COMMENT IS USED FOR THE BILLING PAGE. 
	** EVERYTHING ABOVE THIS COMMENT IS USED FOR THE REGISTRATION PAGE
	*/
	
	
	// charge pkg_one_month
	public static function charge_pkg_one_month($customer_id, $token, $amount){
		
		\Stripe\Charge::create(array(
			"customer"		=> $customer_id,
			"amount"		=> $amount,
			"currency"		=> 'usd',
			"source" 		=> $token,
			"description"	=> "Monthly charge"
		));
		
	}
	
	
	
	
	
	
	
	
	// charge for 0-50 monthly || currently this function is working on profile > billing & index
	public static function pkg_one_monthly($token, $email){
		$customer = \Stripe\Customer::create(array(
			"email"		=> $email,
			"card"		=> $token
		));

		$charge = \Stripe\Charge::create(array(
			"customer"	=> $customer->id,
			"amount"	=> 15000,
			"currency"	=> 'usd'
		));

		header("Location: https://careers.whitejuly.com/view/profile/index.php?action=success-billing");
	}
	
	// charge for 0-50 yearly
	public static function pkg_one_yearly($token, $email){
		$customer = \Stripe\Customer::create(array(
			"email"		=> $email,
			"card"		=> $token
		));

		$charge = \Stripe\Charge::create(array(
			"customer"	=> $customer->id,
			"amount"	=> 120000,
			"currency"	=> 'usd'
		));

		header("Location: https://careers.whitejuly.com/view/profile/index.php?action=success-billing");
	}
	
	// charge for 51-200 monthly
	public static function pkg_two_monthly($token, $email){
		$customer = \Stripe\Customer::create(array(
			"email"		=> $email,
			"card"		=> $token
		));

		$charge = \Stripe\Charge::create(array(
			"customer"	=> $customer->id,
			"amount"	=> 25000,
			"currency"	=> 'usd'
		));

		header("Location: https://careers.whitejuly.com/view/profile/index.php?action=success-billing");
	}
	
	// charge for 51-200 yearly
	public static function pkg_two_yearly($token, $email){
		$customer = \Stripe\Customer::create(array(
			"email"		=> $email,
			"card"		=> $token
		));

		$charge = \Stripe\Charge::create(array(
			"customer"	=> $customer->id,
			"amount"	=> 240000,
			"currency"	=> 'usd'
		));

		header("Location: https://careers.whitejuly.com/view/profile/index.php?action=success-billing");
	}
}

?>