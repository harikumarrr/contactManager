<?php 
session_start();
if($_SESSION['login'] == "1"):
include "include/process1.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
		<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
		<![endif]-->
		
		<!-- start: Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
		<!-- end: Favicon -->

		
		
		
	</head>

	<body>
		<?php 
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	require "include/db_connection.php";
	$sql="SELECT * FROM cont_master WHERE id=$id";
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_row($result)) 
		{
			$id=$row[0];
			$firstname=$row[1];
			$lastname=$row[2];
			$nickname=$row[3];
			$gender=$row[4];
			$mobile=$row[5];
			$phone=$row[6];
			$email=$row[7];
			$company_name=$row[8];
			$designation=$row[9];
			$address1=$row[10];
			$address2=$row[11];
			$city=$row[12];
			$pincode=$row[13];
			$website=$row[14];
			$com_address=$row[15];
			$pword=$row[16];
			
		}
		mysqli_free_result($result); //acco
	}
	mysqli_close($conn);
	?>
		<!-- start: Header -->
		<?php include "include/header.php" ?>
		<!-- end: Header Menu -->

							</div>
						</div>
					</div>
					<!-- start: Header -->

					<div class="container-fluid-full">
						<div class="row-fluid">

							<!-- start: Main Menu -->
							<?php include "include/sidebar.php" ?>
							<!-- end: Main Menu -->

							<noscript>
								<div class="alert alert-block span10">
									<h4 class="alert-heading">Warning!</h4>
									<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
								</div>
							</noscript>

							<!-- start: Content -->
							<div id="content" class="span10">


								<ul class="breadcrumb">
									<li>
										<i class="icon-home"></i>
										<a href="dashboard.php">Home</a> 
										<i class="icon-angle-right"></i>
									</li>
									<li><a href="#">Edit Contact</a></li>
								</ul>
								<div class="row-fluid sortable">
								<div class="col-md-6">
								<div class="box span12">
				
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>personal information</h2>
						</div>
						<div class="box-content">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$id ?>" method="post">
						  <fieldset>
						<label>First name:</label>
				<input type="text" name="firstname" value="<?=  $firstname ?>" required> <?=  $firstnameerr ?><br>
				<label>Last name:</label>
				<input type="text" name="lastname" value="<?= $lastname ?>" required><?= $lastnameerr ?> <br>
				<label>Nick name:</label>
				<input type="text" name="nickname" value="<?= $nickname ?>" required><?= $nicknameerr ?><br>
				<div class="control-group"> 
				<label class="control-label">Gender</label> 
				<div class="controls"> 
				<label class="radio"> 
				<input type="radio" name="gender" id="optionsRadios1" value="male" <?php if($gender=="male" || $gender==""){echo "checked";} ?>> Male 
				</label> 
				<div style="clear:both"></div> 
				<label class="radio"> 
				<input type="radio" name="gender" id="optionsRadios2" value="female" <?php if($gender=="female"){echo "checked";} ?>> Female
				</label> 
				</div> </div>
				<label>Mobile number:</label>
				<input type="text" name="mobile" value="<?= $mobile ?>" required><?= $mobileerr ?> <br>
				<label>Phone number:</label>
				<input type="text" name="phone" value="<?=  $phone ?>" required><?= $phoneerr ?><br>
				<label>Address 1:</label>
				<input type="text" name="address1" id="address1" value="<?= $address1 ?>" required><?= $address1err ?><br>
				<label>Address 2:</label>
				<input type="text" name="address2" id="address2" value="<?=  $address2 ?>" ><?= $address2err ?><br>
				<label>city:</label>
				<input type="text" name="city" id="city" value="<?= $city ?>" required><?= $cityerr ?><br>
				<label>Pincode:</label>
				<input type="text" name="pincode" id="pincode" value="<?= $pincode ?>" required><?= $pincodeerr ?><br>
				<label>Email:</label>
				<input type="text" name="email" id="email" value="<?= $email ?>" required><?= $emailerr ?><br>	
                </fieldset>

        		</div> 
						</div>
						</div>
						 <div class="col-md-6">
								<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>company information</h2>
						
					</div>
					<div class="box-content">
						  <fieldset>
							<div class="control-group">
								<label>Company name:</label>
				<input type="text" name="company_name" value="<?=  $company_name ?>" required><?= $company_nameerr ?><br>
				<label>Destignation:</label>
				<input type="text" name="designation" value="<?= $designation ?>" required><?= $designationerr ?><br>
				<label>Website:</label>
				<input type="text" name="website" value="<?=  $website ?>" required><?= $websiteerr ?><br>
				<label>Communication Address:</label><br>
				<textArea name="com_address" id="c_address" required><?= $com_address ?></textarea> <br>
				<input type="checkbox" onclick="copyAdd()"> Same as above<br><br>
				<label>Enter your password:</label>
				<input type="password" name="pword" required><?= $pworderr ?><br>
				<label>Confirm password</label>
				<input type="password" name="pword2" required><br>
		
				 <button type="submit" class="btn btn-default">update</button><br>
							  
							</div>
						  </fieldset>
			</form> 
						</div>  
						</div>

					</div>
				</div><!--/span-->

			</div><!--/row-->
                           </div>
									
					        </div>
								
							<!-- end: Content -->
						</div><!--/#content.span10-->
					</div><!--/fluid-row-->

					<div class="clearfix"></div>

					<?php include"include/footer.php" ?>

					<!-- start: JavaScript-->

					<script src="js/jquery-1.9.1.min.js"></script>
					<script src="js/jquery-migrate-1.0.0.min.js"></script>

					<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

					<script src="js/jquery.ui.touch-punch.js"></script>

					<script src="js/modernizr.js"></script>

					<script src="js/bootstrap.min.js"></script>

					<script src="js/jquery.cookie.js"></script>

					<script src='js/fullcalendar.min.js'></script>

					<script src='js/jquery.dataTables.min.js'></script>

					<script src="js/excanvas.js"></script>
					<script src="js/jquery.flot.js"></script>
					<script src="js/jquery.flot.pie.js"></script>
					<script src="js/jquery.flot.stack.js"></script>
					<script src="js/jquery.flot.resize.min.js"></script>

					<script src="js/jquery.chosen.min.js"></script>

					<script src="js/jquery.uniform.min.js"></script>

					<script src="js/jquery.cleditor.min.js"></script>

					<script src="js/jquery.noty.js"></script>

					<script src="js/jquery.elfinder.min.js"></script>

					<script src="js/jquery.raty.min.js"></script>

					<script src="js/jquery.iphone.toggle.js"></script>

					<script src="js/jquery.uploadify-3.1.min.js"></script>

					<script src="js/jquery.gritter.min.js"></script>

					<script src="js/jquery.imagesloaded.js"></script>

					<script src="js/jquery.masonry.min.js"></script>

					<script src="js/jquery.knob.modified.js"></script>

					<script src="js/jquery.sparkline.min.js"></script>

					<script src="js/counter.js"></script>

					<script src="js/retina.js"></script>

					<script src="js/custom.js"></script>
					<script>
	function copyAdd(){
		address1 = document.getElementById("address1").value;
		address2 = document.getElementById("address2").value;
		city = document.getElementById("city").value;
		pincode = document.getElementById("pincode").value;
		com_address = address1+","+address2+","+city+" - "+pincode;
		alert(com_address);
		document.getElementById("c_address").value = com_address;
	}
</script>
					<!-- end: JavaScript-->

				</body>
				</html>
<?php
else: 
	header("location:index.php");
endif;
?>
