<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<?php 
require_once('../db/db_connect.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// username and password received from loginform 
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$passhash=password_hash($password, PASSWORD_DEFAULT, $passhash_options);

	$query = $conn->prepare("SELECT * FROM Users WHERE username=? and password_hash=?");
	$query->bind_param("ss", $username, $passhash);
	$query->execute();
    $result=$query->get_result();
    $row=$result->fetch_assoc();

    if(sizeof($row)==0)
    {
		echo "<h2>Username or Password is invalid.</h2><br> <a class='btn btn-info' role='button'  href='login_form.php'>Login Again</a><br><br> <a class='btn btn-info' role='button' href='../index.php'>Home Page</a>";
	}
	else
	{
		$_SESSION['username']=$row['username'];
		$_SESSION['privilage']=$row['privilage'];
		echo "<h2>Login Successfull.</h2><br> <a class='btn btn-info' role='button' href='../index.php'>Home Page</a>";
	}
}
?>