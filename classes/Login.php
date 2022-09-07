<?php


class Login extends Dbh {

//creates a new user
	protected  function getUser($username, $password){

		$stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? or email = ?;');
		

         if(!$stmt->execute(array($username, $username))){

         	$stmt = null;

         	header('location:../index.php?error=stmtfailed');

         	exit();
         }

        if($stmt->rowcount() === 0){

            $stmt = null;

            header("Location:../index.php?error=usernotfound");

            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
     
        $checkPassword = password_verify($password, $hashedPassword['password']); 



        if( $checkPassword ===  false){

            $stmt = null;

            header("Location:../index.php?error=wrongpasword");
            
            exit();

        }elseif( $checkPassword ===  true){

            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username=? or email=?;');


            if(!$stmt->execute(array($username, $username,))){

                $stmt = null;

                header('location:../index.php?error=stmtfailed');

                exit();
            }

		if($stmt->rowCount() === 0){

            $stmt = null;

            header("location:../index.php?error=usernotfound");

            exit();
        }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();

        $_SESSION['userId'] = $user[0]['id'];

        $_SESSION['username'] = $user[0]['username'];

        $stmt = null;

        }

	}

}