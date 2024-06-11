<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertilizer_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch issued fertilizers
$issued_fertilizers_sql = "SELECT * FROM receives";
$issued_fertilizers_result = $conn->query($issued_fertilizers_sql);

// Fetch farmers details
$farmers_sql = "SELECT * FROM farmer";
$farmers_result = $conn->query($farmers_sql);

// Fetch stock details
$stock_sql = "SELECT * FROM stores";
$stock_result = $conn->query($stock_sql);

// Handle delete farmer action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['farmer_id'])) {
    $farmer_id = $_POST['farmer_id'];
    $delete_farmer_sql = "DELETE FROM farmers WHERE id=?";
    $stmt = $conn->prepare($delete_farmer_sql);
    $stmt->bind_param("i", $farmer_id);
    $stmt->execute();
    header("Location: index.php"); // Redirect to avoid resubmission
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
		include("header.php");
		// include("Navigation-Bar.php");
	?>
    <header>
        <h1>Admin Page</h1>
    </header>
    <main>
        <section id="issued-fertilizers">
            <h2>Issued Fertilizers</h2>
            <?php if ($issued_fertilizers_result->num_rows > 0): ?>
                <ul>
                    <?php while($row = $issued_fertilizers_result->fetch_assoc()): ?>
                        <li><?php echo htmlspecialchars($row['FertilizerID']) . " - " . htmlspecialchars($row['QtyOnHand']) . " issued to " . htmlspecialchars($row['issued_to']) . " on " . htmlspecialchars($row['issue_date']); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No issued fertilizers found.</p>
            <?php endif; ?>
        </section>
        <section id="farmers-details">
            <h2>Farmers Details</h2>
            <?php if ($farmers_result->num_rows > 0): ?>
                <ul>
                    <?php while($row = $farmers_result->fetch_assoc()): ?>
                        <li><?php echo htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['contact_info']) . " - " . htmlspecialchars($row['address']); ?>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="farmer_id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No farmers details found.</p>
            <?php endif; ?>
        </section>
        <section id="stock-details">
            <h2>Stock Details</h2>
            <?php if ($stock_result->num_rows > 0): ?>
                <ul>
                    <?php while($row = $stock_result->fetch_assoc()): ?>
                        <li><?php echo htmlspecialchars($row['item_name']) . " - " . htmlspecialchars($row['quantity']); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No stock details found.</p>
            <?php endif; ?>
        </section>
    </main>
    <?php require_once('includes/footer.php'); ?>
</body>
</html>
