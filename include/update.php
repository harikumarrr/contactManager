<?php 
session_start();
$id=$_SESSION['id'];
require "db_connection.php";
$option=['cost'=>9];
$pword=password_hash($pword,PASSWORD_BCRYPT,$option);
$sql="UPDATE cont_master SET firstname='$firstname',lastname='$lastname',nickname='$nickname',gender='$gender',mobile='$mobile',phone='$phone',email='$email',company_name='$company_name',designation='$designation',address1='$address1',address2='$address2',city='$city',pincode='$pincode',website='$website',com_address='$com_address',pword='$pword' WHERE id='$id' ";
if (mysqli_query($conn,$sql)) 
{
echo "Update record sucessfully<br>";
header("location:list.php");
}else
{
	echo "error: ".$sql ."<br>";
}
mysqli_close($conn);

 ?>