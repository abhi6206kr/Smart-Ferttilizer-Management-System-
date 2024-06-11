<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Sign In</title>
	<link rel="stylesheet" href="../CSS/Common.css">
	<script src="../js/Customers_Registration.js"></script>
</head>
<body>
	<?php
		include("Header.php");
		include("Navigation-Bar.php");
	?>
	
	<h1>Sign In Below To Create Your Account!!!</h1>
	<br>
	
	<div style="background:url('./Background1.jpg') no-repeat; background-size:cover;" class="text-center">
		<form id="frmtxt" name="frmtxt">
			<br>
			<label for="txtFirst">First Name: -</label>
			<input type="text" placeholder="Enter Your First Name" name="txtFirst" id="txtFirst">
			<br><br><br>
			<label for="txtMiddle">Middle Name: -</label>
			<input type="text" placeholder="Enter Your Middle Name" name="txtMiddle" id="txtMiddle">
			<br><br><br>
			<label for="txtLast">Last Name: -</label>
			<input type="text" placeholder="Enter Your Last Name" name="txtLast" id="txtLast">
			<br><br><br>
			<label for="Gender">Gender: -</label><br>
			<input type="radio" id="Male" name="Gender" value="Male">
			<label for="Male">Male</label><br>
			<input type="radio" id="Female" name="Gender" value="Female">
			<label for="Female">Female</label><br>
			<input type="radio" id="Other" name="Gender" value="Other">
			<label for="Other">Other</label> 
			<br><br><br>
			<label for="txtAddress">Address: -</label>
			<input type="text" id="txtAddress" name="txtAddress" maxlength="15"  placeholder="Enter the Address"  Size="50" />
			<br><br><br>
			<label for="Contact">Contact Number: -</label>
			<input type="tel" placeholder="+91-9145XXXXXX" id="Contact" name="Contact">
			<br><br><br>
			<label for="EMail">E-Mail: -</label>
			<input type="email" placeholder="abc@gmail.com" name="EMail" id="EMail">
			<br><br><br>
			<label for="Pass">Password: -</label>
			<input type="password" placeholder="Enter Your Password" name="Pass" id="Pass">
			<br><br><br>
			<label for="txtpass1">Re-type Password: -</label>
			<input type="Password" id="txtpass1" name="txtpass1" maxlength="15" Size="30" />
			<br><br><br>
			<input type="submit" value="Sign In">
			<br><br><br>
			<div id="ERRMsg"></div>
		</form>
	</div>
	<br>
	<?php require_once('includes/footer.php'); ?>
</body>
</html>