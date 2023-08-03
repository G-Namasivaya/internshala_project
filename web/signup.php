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
    $first_name = $data["first_name"];
    $last_name = $data["last_name"];
    $address = $data["address"];
    $city = $data["city"];
    $state = $data["state"];
    $email = $data["email"];
    $phone = $data["phone"];
    $password = $data["password"]; // Note: Insecure, should be hashed before storing in production

    // Create a connection
    // ... (previous code)

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, address, city, state, email, phone, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $first_name, $last_name, $address, $city, $state, $email, $phone, $password);

// Set parameters and execute the statement
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"]; // Note: Insecure, should be hashed before storing in production

if ($stmt->execute()) {
    http_response_code(200); // Success
} else {
    http_response_code(400); // Bad Request
}

// Close the statement and connection
$stmt->close();
$conn->close();



    

    
}
?>
