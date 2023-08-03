<?php
// Create a connection to MySQL database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "Mani!@#123"; // Replace with your MySQL password
$dbname = "webapp"; // Replace with your MySQL database name

// Check if the form data has been sent via POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract form data
    $email = $data["email"];
    $password = $data["password"];

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if the user with the given email and password exists
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        http_response_code(200); // Success
    } else {
        http_response_code(401); // Unauthorized
    }

    // Close the connection
    $conn->close();
}
?>
