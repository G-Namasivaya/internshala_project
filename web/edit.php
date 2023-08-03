<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Create a connection to MySQL database
    $conn = new mysqli("localhost", "your_username", "your_password", "your_database_name");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to update user details
    $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, address=?, city=?, state=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssssssi", $first_name, $last_name, $address, $city, $state, $email, $phone, $id);
    if ($stmt->execute()) {
        // Update successful
        header("Location: inner.html");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Display edit form
    $id = $_GET["id"];
    $conn = new mysqli("localhost", "your_username", "your_password", "your_database_name");
    $sql = "SELECT * FROM users WHERE id=" . $id;
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit User Details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h2>Edit User Details</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user["first_name"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user["last_name"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $user["address"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $user["city"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" class="form-control" id="state" name="state" value="<?php echo $user["state"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user["email"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user["phone"]; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </body>

    </html>

<?php
}
?>
