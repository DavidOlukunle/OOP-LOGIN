<?php
class Login extends Dbh {

//creates a new user
	protected  function getUser($username,$password){
		$stmt=$this->connect()->prepare('SELECT users_password FROM users WHERE users_username=? or users_email=?;');
		

         if(!$stmt->execute(array($username,$password))){
         	$stmt=null;
         	header('location:../index.php?error=stmtfailed');
         	exit();
         }

        if($stmt->rowcount()==0){
            $stmt=null;
            header("Location:../index.php?error=usernotfound");
            exit();
        }

        $hashedpassword=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd=password_verify($password, $hashedpassword['users_password']); 

        if($checkpwd==false){
            $stmt=null;
            header("Location:../index.php?error=wrongpasword");
            exit();
        }elseif($checkpwd==true){
            $stmt=$this->connect()->prepare('SELECT * FROM users WHERE users_username=? or users_email=? AND users_password=?;');


            if(!$stmt->execute(array($username,$username,$password))){
                $stmt=null;
                header('location:../index.php?error=stmtfailed');
                exit();
            }
		if($stmt->rowCount()==0){
            $stmt=null;
            header("location:../index.php?error=usernotfound");
            exit();
        }
        $user=$stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['userid']=$user[0]['users_id'];
        $_SESSION['userusername']=$user[0]['users_username'];

        $stmt=null;
        }
        



	}





}