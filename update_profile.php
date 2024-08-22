<?php
session_start();

// Database connection parameters
$servername = "localhost"; // Adjust as necessary
$username = "root";        // Adjust as necessary
$password = "";            // Adjust as necessary
$dbname = "gamestore";     // Use gamestore database for profile info

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have user_id stored in session
$user_id = 1; // Replace with dynamic session value, e.g., $_SESSION['user_id']

// Prepare the SQL statement to update the user profile
$sql = "UPDATE user_profile SET level=?, trophies=?, cups=?, medals=?, prizes=? WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiiii", $_POST['level'], $_POST['trophies'], $_POST['cups'], $_POST['medals'], $_POST['prizes'], $user_id);

// Execute the statement
if ($stmt->execute()) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . $conn->error;
}

$stmt->close();
$conn->close();

// Redirect back to the profile page after updating
header("Location: profile_page.html");
exit();
?>
