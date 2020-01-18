<?php 
if (isset($_POST['forgot'])) {
require "include/db_connection.php";
	$email=$_POST['email'];
	$sql="SELECT id from cont_master where email='".$email."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$id = $row['id'];
	$count=count($row);

if ($count!=0) {
$new_password="1234";
//rand(100000 , 999999);

	$options=['cost'=>9];
	$hash_password=password_hash($new_password,PASSWORD_BCRYPT,$options);
$sql = "UPDATE cont_master set pword='".$hash_password."' WHERE id='".$id."'";
if(mysqli_query($conn, $sql)){
	$subject="login information";
	$message="your message has been changed to $new_password";
	$from="from:ganesh@gmail.com";
	//mail($email,$subject,$message,$from);
	echo "your password has been mailed to you.";
} else {
	echo "Error resetting password";
}
}
else
{
	echo "this mail does not exist";

}
	mysqli_close($conn);
}
 ?>
