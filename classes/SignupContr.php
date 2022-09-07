<?php

class SignupContr extends Signup{

	private $username;

	private $password;

	private $passwordRepeat;

	private $email;

	public function __construct($username, $password, $passwordRepeat, $email){

		$this->username = $username;

		$this->password = $password;

		$this->passwordRepeat = $passwordRepeat;

		$this->email = $email;
	}

	//main signup function
	public function signUpuser(){

		 if($this->emptyInput() === false){

		 	header('Location:../index.php?error=emptyinput');
		 	exit();

		}
			if($this->invalidusername() === false){

				header('location: ../index.php?error=invalidusername');

				exit();
			}
			if($this->invalidEmail() === false){

				header('location: ../index.php?error=invalidemail');

				exit();
			}
				if($this->passwordmatch() === false){

					header('location:../index.php?error=passwords dont match');

					exit();
				}
					if($this->usernametakencheck() === false){

						header('location:../index.php?error=username or email taken');

						exit();
					}

        
     					 $this->setUser($this->username, $this->password, $this->email);


	}


	//checks the validity of users before they are signed in
	private function emptyInput(){
	
		if(empty($this->username) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)){

			$result = false;

		}
		else{

			$result = true;
		}

		return $result;


	}

	private function invalidUsername(){
		
		if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){

			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}

	private function invalidEmail(){
		
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
	private function passwordMatch(){
	
		if($this->password === $this->passwordRepeat){
			$result = true;
		}

		else{

			$result = false;
		}
		return $result;
	}


	// a method from signup.classes  . it checks through the database for any instances of a taken username
	public function usernameTakenCheck(){
	
		if(!$this->checkUser($this->username, $this->email)){ 

			$result = false;
		}

		else{

			$result = true;
		}

		return $result;
	}





}