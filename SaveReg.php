<?php
	include(".\DBConnect.php");
	
	$FirstN=$_POST['txtFirst'];
	$MiddleN=$_POST['txtMiddle'];
	$LastN=$_POST['txtLast'];
	$Gender=$_POST['Gender'];
	$Address=$_POST['txtAddress'];
	$ContactN=$_POST['Contact'];
	$EM=$_POST['EMail'];
	$Passwords=$_POST['Pass'];
	$Msg="";
	
	$qry="Insert Into registration(First_Name,Middle_Name,Last_Name,Gender,Address,Contact_No,E_Mail,Password) Values('$FirstN','$MiddleN','$LastN','$Gender','$Address','$ContactN','$EM','$Passwords')";
	
	$result=mysqli_query($conn,$qry);
	
	if(!$result>0)
		$Msg="Error in Admin's Registration!";
	echo $Msg;
?>