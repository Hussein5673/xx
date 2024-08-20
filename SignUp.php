<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "user_base"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $dob = $conn->real_escape_string($_POST['dob']);

    // Prepare an SQL statement to insert the data into the table
    $sql = "INSERT INTO users (Name, Email, UserName, Password, DateOfBirth) VALUES ('$name', '$email', '$username', '$password', '$dob')";

    // Execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
