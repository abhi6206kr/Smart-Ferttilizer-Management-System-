<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Sign In</title>
	<link rel="stylesheet" href="../CSS/Common.css">
</head>
<body>
	<?php
		include("Header.php");
		include("Navigation-Bar.php");
	?>
	
	<h1>Sign In Below To Create Your Account!!!</h1>
	<br>
	
	<div style="background:url('./Background1.jpg') no-repeat; background-size:cover;" class="text-center">
		<form method="post" action="../Backend/SaveReg.php">
			<br>
			<label>First Name</label>
			<input type="text" placeholder="Enter Your First Name" name="txtFirst" required>
			<br><br><br>
			<label>Middle Name</label>
			<input type="text" placeholder="Enter Your Middle Name" name="txtMiddle">
			<br><br><br>
			<label>Last Name</label>
			<input type="text" placeholder="Enter Your Last Name" name="txtLast" required>
			<br><br><br>
			<label>Contact Number</label>
			<input type="tel" placeholder="+91-9145XXXXXX" name="Contact" required>
			<br><br><br>
			<label>E-Mail</label>
			<input type="email" placeholder="abc@gmail.com" name="EMail" id="EMail" required>
			<br><br><br>
			<label>Password</label>
			<input type="password" placeholder="Enter Your Password" name="Pass" id="Pass" required>
			<br><br><br>
			<input type="submit" value="Sign In">
			<br><br>
		</form>
	</div>
	<br><br><br><br><br><br><br><br><br><br>
	
	<?php require_once('includes/footer.php'); ?>
</body>
</html>