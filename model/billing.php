<?php

class Billing{
	
	// charge for 0-50 monthly
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