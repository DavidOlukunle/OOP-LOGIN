<?php
class Signup extends Dbh {

//creates a new user
	protected  function setUser($username,$password,$email){
		$stmt=$this->connect()->prepare('INSERT INTO users (users_username,users_password,users_email)VALUES(?,?,?);');
		$hashedpassword=password_hash($password, PASSWORD_DEFAULT);

         if(!$stmt->execute(array($username,$email,$hashedpassword))){
         	$stmt=null;
         	header('location:../index.php?error=stmtfailed');
         	exit();
         }

         $stmt =null;



	}






///checks if there is an existing user with the same username,email etc.

	protected function checkuser($username,$email){
		$stmt=$this->connect()->prepare('SELECT users_username FROM users WHERE users_username=? OR users_email=?;');


		if(!$stmt->execute(array($username,$email))){
			$stmt=null;
			header('Location: ../index.php?error=stmtfailed');
			exit();
		}

        $resultcheck;
		if($stmt->rowCount()>0){

        $resultcheck=false;

		}
		else{

        $resultcheck=true;
		}
		return  $resultcheck;
       

	}

}