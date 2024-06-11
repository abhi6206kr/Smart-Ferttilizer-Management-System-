<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Management - Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Fertilizer Management System - Admin</h2>

        <!-- Add Fertilizer Form -->
        <div class="card mt-4">
            <div class="card-header">Add New Fertilizer</div>
            <div class="card-body">
                <form action="admin.php" method="post">
                    <div class="form-group">
                        <label for="fertilizer_ID">Fertilizer ID</label>
                        <input type="text" class="form-control" id="fertilizer_ID" name="fertilizer_ID" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div> -->
                    <button type="submit" class="btn btn-primary" name="add_fertilizer">Add Fertilizer</button>
                </form>
            </div>
        </div>

        <!-- Fertilizer List -->
        <div class="card mt-4">
            <div class="card-header">Fertilizer List</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fertilizer ID</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Database connection
                        $conn = new mysqli("localhost", "root", "", "fertilizer_management");

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Add fertilizer
                        if (isset($_POST['add_fertilizer'])) {
                            $name = $_POST[''];
                            $type = $_POST['type'];
                            $quantity = $_POST['quantity'];
                            $price = $_POST['price'];

                            $sql = "INSERT INTO fertilizer (name, type, quantity, price) VALUES ('$name', '$type', $quantity, $price)";
                            if ($conn->query($sql) === TRUE) {
                                echo "<div class='alert alert-success'>New fertilizer added successfully</div>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                        // Display fertilizers
                        $sql = "SELECT * FROM fertilizer";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["type"] . "</td>
                                    <td>" . $row["quantity"] . "</td>
                                    <td>" . $row["price"] . "</td>
                                    <td>
                                        <a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No fertilizers found</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
