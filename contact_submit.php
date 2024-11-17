<?php
// Initialize a variable to track if the form was successfully submitted
$message_sent = false;

// Database credentials
$servername = "a";
$username = "";
$password = "";
$database = "";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement to insert form data into the database
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("SQL preparation failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the SQL statement
    if ($stmt->execute()) {
        $message_sent = true; // Set flag to true when the data is successfully inserted
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
}

$conn->close();
?>
