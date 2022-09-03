<?php
if(isset($_POST['signup'])){

	//grabbing the data
	$username=$_POST['username'];
	$password=$_POST['password'];
	$passwordRepeat=$_POST['passwordRepeat'];
	$email=$_POST['email'];
	// instantiate signupcontr class
	include "../classes/dbh.classes.php";
include "../classes/signup.classes.php";
include "../classes/signup-contr.classes.php";

$signup=new SignupContr($username,$password,$passwordRepeat,$email);


	//running error handler and user signup
	$signup->signupuser();

	//going back to the front page

header('location:../index.php?error=none');
}