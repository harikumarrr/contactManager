<?php 
require "db_connection.php";
$option=['cost'=>9];
$pword=password_hash($pword,PASSWORD_BCRYPT,$option);
$sql="INSERT INTO cont_master(id,firstname,lastname,nickname,gender,mobile,phone,email,company_name,designation,address1,address2,city,pincode,website,com_address,pword)
		VALUES('','$firstname','$lastname','$nickname','$gender','$mobile','$phone','$email','$company_name','$designation','$address1','$address2','$city','$pincode','$website','$com_address','$pword') ";
if (mysqli_query($conn,$sql)) 
{
echo "New record created sucessfully<br>";
header("location:list.php");
}else
{
	echo "error: ".$sql ."<br>";
}
mysqli_close($conn);
?>