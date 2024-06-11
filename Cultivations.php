<?php 
    require_once('includes/connection.php');
    session_start();

    $officerID = $_SESSION['userID'];
    $query = "SELECT OfficerID, CenterID, FName, LName FROM AGRICULTURAL_OFFICER WHERE OfficerID = '{$officerID}' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($recordRow = mysqli_fetch_assoc($result)) {
        $userOfficerID = $recordRow['OfficerID'];
        $userCenterID = $recordRow['CenterID'];
        $userFName = $recordRow['FName'];
        $userLName = $recordRow['LName'];
        $msgViewUser = "Login as {$userOfficerID} - {$userFName} {$userLName} under Center - {$userCenterID}";
    }

    if(isset($_POST["btnSearchID"])) {
        if(isset($_POST["txtLandID"])) {
            $landID = $_POST["txtLandID"];
            $query = "SELECT * FROM CULTIVATION WHERE LandID = '{$landID}' AND OfficerID = '{$officerID}'";
            $resultRow = mysqli_query($conn, $query);

            if ($record = mysqli_fetch_assoc($resultRow)) {
                $FarmerId = $record['FarmerID'];
                $Area = $record['LandArea'];
                $CropName = $record['CropName'];
                $Month = $record['Month'];
            } else {
                $msg1 = "No such LandID exists";
            }
        }
    }

    if(isset($_POST["btnAddNew"])) {
        $query = "SELECT LandID FROM CULTIVATION ORDER BY LandID DESC LIMIT 1";
        $result_set = mysqli_query($conn, $query);

        if ($record = mysqli_fetch_assoc($result_set)) {
            $lastLandID = $record['LandID'];
            $landID = "L" . str_pad(((int)(substr($lastLandID, 1)) + 1), 3, '0', STR_PAD_LEFT);
        } else {
            $landID = "L001";
        }
    }

    if(isset($_POST['btn_update'])) {
        $landID = $_POST['txtLandID'];
        $FarmerId = $_POST['txtFarmerId'];
        $CropName = $_POST['txtCropName'];
        $Month = $_POST['txtMonth'];

        $query = "SELECT LandArea FROM CULTIVATION WHERE LandID = '{$landID}'";
        $result_set = mysqli_query($conn, $query);

        if($result = mysqli_fetch_assoc($result_set)) {
            $Area = $result['LandArea'];
            $query = "UPDATE CULTIVATION SET FarmerID = '{$FarmerId}', CropName = '{$CropName}', Month ='{$Month}' WHERE LandID = '{$landID}'";
            $result = mysqli_query($conn, $query);

            $msg2 = $result ? "Record updated successfully" : "Failed updating the record";
        } else {
            $msg2 = "Failed updating the record";
        }
    }

    if(isset($_POST['btn_save'])) {
        $landID = $_POST['txtLandID'];
        $FarmerId = $_POST['txtFarmerId'];
        $CropName = $_POST['txtCropName'];
        $Month = $_POST['txtMonth'];
        $Area = $_POST['txtArea'];

        $query = "SELECT LandArea FROM CULTIVATION WHERE LandID = '{$landID}'";
        $result_set = mysqli_query($conn, $query);

        if($result = mysqli_fetch_assoc($result_set)) {
            $msg2 = "This land is already in the database.";
        } else {
            $Area =($Area);
            $query = "INSERT INTO CULTIVATION (LandID, FarmerID, OfficerID, CropName, LandArea, Month) VALUES ('{$landID}', '{$FarmerId}', '{$officerID}', '{$CropName}', {$Area}, '{$Month}')";
            $result = mysqli_query($conn, $query);
            $msg2 = $result ? "New land added successfully" : "Failed adding new record";
        }
    }
?>

<?php include('includes/header.php'); ?>

<form action="Cultivations.php" method="post">
    <h1>View Cultivation Info</h1>
    <h4><?php echo $msgViewUser ?></h4>
    <hr>

    <table>
        <tr>
            <td>Land ID : </td>
            <td>
                <input type="text" name="txtLandID" value="<?php echo isset($landID) ? $landID : ''; ?>"></input>
                <button name="btnSearchID" type="submit">SEARCH</button>
                <button name="btnAddNew" type="submit">ADD NEW</button>
                <label for="lblMsg1"><b><?php echo isset($msg1) ? $msg1 : ''; ?></b></label>
            </td>
        </tr>
        <tr>
            <td>Farmer ID : </td>
            <td><input type="text" name="txtFarmerId" value="<?php echo isset($FarmerId) ? $FarmerId : ''; ?>"></input></td>
        </tr>
        <tr>
            <td>Area (Ha) : </td>
            <td><input type="text" name="txtArea" value="<?php echo isset($Area) ? $Area : ''; ?>"></input></td>
        </tr>
        <tr>
            <td>Crop Name : </td>
            <td><input type="text" name="txtCropName" value="<?php echo isset($CropName) ? $CropName : ''; ?>"></input></td>
        </tr>
        <tr>
            <td>Month : </td>
            <td><input type="text" name="txtMonth" value="<?php echo isset($Month) ? $Month : ''; ?>"></input></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button name="btn_update" type="submit">UPDATE</button>
                <button name="btn_save" type="submit">SAVE NEW</button>
                <label for="lblMsg2"><b><?php echo isset($msg2) ? $msg2 : ''; ?></b></label>
            </td>
        </tr>
    </table>
</form>

<?php include('includes/footer.php'); ?>

<?php mysqli_close($conn); ?>
