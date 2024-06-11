<?php
	// include("./connection.php");
	
	// $FirstN=$_POST['txtFirst'];
	// $MiddleN=$_POST['txtMiddle'];
	// $LastN=$_POST['txtLast'];
	// $Gender=$_POST['Gender'];
	// $Address=$_POST['txtAddress'];
	// $ContactN=$_POST['Contact'];
	// $EM=$_POST['EMail'];
	// $Passwords=$_POST['Pass'];
	// $Msg="";
	
	// $qry="Insert Into registration(First_Name,Middle_Name,Last_Name,Gender,Address,Contact_No,E_Mail,Password) Values('$FirstN','$MiddleN','$LastN','$Gender','$Address','$ContactN','$EM','$Passwords')";
	
	// $result=mysqli_query($conn,$qry);
	
	// if(!$result>0)
	// 	$Msg="Error in Admin's Registration!";
	// echo $Msg;
?>

<?php
// Include database connection file
include_once("connection.php");

// Process registration form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $officer_id = $_POST['officer_id'];
    $center_id = $_POST['center_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $tel_no = $_POST['tel_no'];
    $password = $_POST['password'];

    // Check if the provided CenterID exists in the supply_center table
    $check_center_query = "SELECT COUNT(*) AS count FROM supply_center WHERE CenterID = '$center_id'";
    $result = mysqli_query($conn, $check_center_query);
    $row = mysqli_fetch_assoc($result);
    $center_exists = $row['count'];

    if ($center_exists) {
        // Hash the password for security
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into database
        $sql = "INSERT INTO agricultural_officer (OfficerID, CenterID, FName, LName, TelNo, Password) VALUES ('$officer_id', '$center_id', '$first_name', '$last_name', '$tel_no', '$password')";

        if (mysqli_query($conn, $sql)) {
            // Registration successful
			header("Location: ./Success.html");
            exit(); // Ensure that no further code is executed after redirection
        } else {
            // Error handling
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Display error message if CenterID does not exist
        echo "Error: The provided CenterID does not exist. Please provide a valid CenterID.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>

