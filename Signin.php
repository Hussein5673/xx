<?php
session_start(); // Start the session at the beginning
// Include the database name username password
include 'username_database_password_server.php';

$conn = new mysqli($db_host, $db_user, $db_pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
     // Create the SQL query
     $sql = "SELECT * FROM user WHERE UserName = '$username' AND Password = '$password'";
     $result = mysqli_query($conn,$sql);
    
     if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);   

        $_SESSION['username'] = $row['UserName'];
        $_SESSION['logged_in'] = true;
         header("Location: homepage.html");
         exit();
     } else {
         echo "Wrong Username or Password";
     }
 }
$conn->close();

?>