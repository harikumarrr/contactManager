<?php

session_start();
function test_input($str)
{
	$str=trim($str);
	$str=stripslashes($str);
	$str=htmlspecialchars($str);
	return $str;
}
if (isset($_POST['login'])) {
	include "db_connection.php";

	$email=test_input($_POST['email']);
	$password=test_input($_POST['password']);
	$sql="SELECT pword, firstname, id from cont_master where email='".$email."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1)
	{
		$row = mysqli_fetch_assoc($result);
		$pword = $row['pword'];
		if(password_verify($password,$pword)){
			$login_status=1;
			$_SESSION['login']=$login_status;
			$_SESSION['firstname']=$row['firstname'];
			$_SESSION['id']=$row['id'];
			header('Location:list.php');
		}
	}
	else
	{
		echo "account is INVALID";
	}

}
if (isset($_GET['action'])) {
	if($_GET['action']=='logout'){
		unset($_SESSION['name']);
		unset($_SESSION['login']);
		unset($_SESSION['id']);
	}
}
?>