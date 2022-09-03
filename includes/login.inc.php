<?php
if(isset($_POST['submit'])){

	//grabbing the data
	$username=$_POST['username'];
	$password=$_POST['password'];

	// instantiate signupcontr class
	include "../classes/dbh.classes.php";
include "../classes/login.classes.php";
include "../classes/login-contr.classes.php";

$login=new LoginContr($username,$password);


	//running error handler and user signup
	$login->loginuser();

	//going back to the front page

header('location:../index.php?error=none');
}