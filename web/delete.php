<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    // Create a connection to MySQL database
    $conn = new mysqli("localhost", "your_username", "your_password", "your_database_name");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to delete user
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Deletion successful
        header("Location: inner.html");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
