<?php
// Include the database name, username, password, and server
include 'username_database_password_server.php';

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $dob = htmlspecialchars($_POST['dob']);

// Prepare an SQL statement to insert the data into the table with a default value for Friends
$sql = "INSERT INTO [user] (Name, Email, UserName, Password, DateOfBirth, Friends) VALUES (?, ?, ?, ?, ?, ?)";

// Default value for Friends as an empty string
    $defaultFriendsValue = '';

// Prepare the statement with the new default value
$params = array($name, $email, $username, $password, $dob, $defaultFriendsValue);
$stmt = sqlsrv_query($conn, $sql, $params);


    // Execute the query and check if it was successful
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: index.php");
        exit;
    }
}

// Close the connection
sqlsrv_close($conn);
?>
