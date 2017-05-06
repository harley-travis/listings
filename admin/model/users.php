<?php 

class Users{
	
	private $user_id, $userFirstName, $userLastName, $email, $password;
	
	public function __construct($userFirstName, $userLastName, $email, $password){
		$this->user_FirstName = $userFirstName;
		$this->user_LastName = $userLastName;
		$this->user_email = $email;
		$password = sha1($email . $password); // encrypt this junk
		$this->user_password = $password;
	}
	
	public function getUserID(){
		return $this->user_id;
	}
	
	public function setUserID($value){
		$this->user_id = $value;
	}
	
	public function getUserFirstName(){
		return $this->user_FirstName;
	}
	
	public function setUserFirstName($value){
		$this->user_FirstName = $value;
	}
	
	public function getUserLastName(){
		return $this->user_LastName;
	}
	
	public function setUserLastName($value){
		$this->user_LastName = $value;
	}
	
	public function getUserEmail(){
		return $this->user_email;
	}
	
	public function setUserEmail($value){
		$this->user_email = $value;
	}
	
	public function getUserPassword(){
		return $this->user_password;
	}
	
	public function setUserPassword($value){
		$this->user_password = $value;
	}
	
}



?>