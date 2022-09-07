<?php


class Signup extends Dbh {

	//creates a new user
	protected  function setUser($username, $password, $email){

		$stmt=$this->connect()->prepare('INSERT INTO users (username, password, email)VALUES(?,?,?);');

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

         if(!$stmt->execute(array($username, $hashedPassword, $email,))){

         	$stmt = null;

         	header('location:../index.php?error=stmtfailed');

         	exit();

         }

         $stmt = null;



	}


	//checks if there is an existing user with the same username,email etc.

	protected function checkUser($username, $email){
		$stmt = $this->connect()->prepare('SELECT username FROM users WHERE username=? OR email=?;');


		if(!$stmt->execute(array($username, $email))){

			$stmt = null;

			header('Location: ../index.php?error=stmtfailed');

			exit();
		}

		if($stmt->rowCount()>0){

        $resultCheck = false;

		}
		else{

        $resultCheck = true;
		}
		return  $resultCheck;
       

	}

}