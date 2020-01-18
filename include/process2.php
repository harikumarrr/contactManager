<?php 
function test_input($str)
{
	$str=trim($str);
	$str=stripslashes($str);
	$str=htmlspecialchars($str);
	return $str;
}
function text_input($a)
{
	if(!preg_match("/^[a-z A-Z]*$/",$a))
		{
			$a="This field consists of albhabets only";
			return $a;
		}
}
function number_input($b)
{
	if(!preg_match("/^[0-9]*$/",$b))
		{
			$b="This field consists of numbers only";
			return $b;
		}
}
$firstname=$lastname=$nickname=$gender=$mobile=$phone=$email=$company_name=$designation=$address1=$address2=$city=$pincode=$website=$com_address=$pword="";
$firstnameerr=$lastnameerr=$nicknameerr=$gendererr=$mobileerr=$phoneerr=$emailerr=$company_nameerr=$designationerr=$address1err=$address2err=$cityerr=$pincodeerr=$websiteerr=$com_addresserr=$pworderr="";
if($_SERVER["REQUEST_METHOD"] == 'POST')
{
			$firstname =test_input($_POST['firstname']);
			$lastname = test_input($_POST['lastname']);
			$nickname = test_input($_POST['nickname']);
			$gender = test_input($_POST['gender']);
			$mobile = test_input($_POST['mobile']);
			$phone = test_input($_POST['phone']);
			$email = test_input($_POST['email']);
			$company_name = test_input($_POST['company_name']);
			$designation = test_input($_POST['designation']);
			$address1 = test_input($_POST['address1']);
			$address2 = test_input($_POST['address2']);
			$city = test_input($_POST['city']);
			$pincode = test_input($_POST['pincode']);
			$website = test_input($_POST['website']);
			$com_address = test_input($_POST['com_address']);
			$pword = test_input($_POST['pword']);
			$pword2 = $_POST['pword2'];
			
	if($firstname!="" && $lastname!="" && $mobile!="" && $email!="" && $company_name!="" && $designation!="" && $address1!="" && $city!="" && $pincode!="" && $website!="" && $com_address!="" && $pword!="")
	{
		$firstnameerr = text_input($firstname);
		$lastnameerr = text_input($lastname);
		$nicknameerr = text_input($nickname);
		$mobileerr = number_input($mobile);
		$phoneerr = number_input($phone);
		$company_nameerr = text_input($company_name);
		$designationerr = text_input($designation);
		$cityerr = text_input($city);
		$pincodeerr = number_input($pincode);
		$websiteerr = text_input($website);
		$com_addresserr = text_input($com_address);
		if ($pword != $pword2) 
		{
			$pworderr="Detect mismatch Conform password";
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$emailerr="Invalid email format";
		}
		
		include "db_connection.php";
		$sql="SELECT email FROM cont_master where email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
		{
			if ($firstnameerr=="" && $lastnameerr=="" && $nicknameerr=="" && $gendererr=="" && $mobileerr=="" && $phoneerr=="" && $emailerr=="" && $cityerr=="" && $pworderr=="") 
			{
			include "insert.php";	
			}
		}else
		{
			$emailerr="Email already exists";
		}
	}
}	
?>