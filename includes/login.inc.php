<?php



	// instantiate signupcontr class
	include "../classes/Dbh.php";
	include "../classes/Login.php";
	include "../classes/LoginContr.php";


	if(isset($_POST['submit'])){

		//grabbing the data
		$username = $_POST['username'];

		$password = $_POST['password'];

		
		$login = new LoginContr($username, $password);


		//running error handler and user signup

		$login->loginuser();

		//going back to the front page

		header('location:../index.php?error=none');

	}