<?php
session_start();

include 'username_database_password_server.php';

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die("Connection failed.<br />" . print_r(sqlsrv_errors(), true));
}

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: Signin.php'); // Redirect to login page if not logged in
    exit();
}

// Get the username from session
$username = $_SESSION['username'];

// Query to get user details
$sql = "SELECT UserName, Email, DateOfBirth, Friends, reg_date, SubID FROM [user] WHERE UserName = ?";
$params = array($username);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($user === false) {
    die("User not found.");
}

// Get Subscription details
$subID = $user['SubID'];
$sql_sub = "SELECT SubType, StartingDate, EndDate FROM [Subscription_table] WHERE SubID = ?";
$params_sub = array($subID);
$stmt_sub = sqlsrv_query($conn, $sql_sub, $params_sub);

if ($stmt_sub === false) {
    die(print_r(sqlsrv_errors(), true));
}

$subscription = sqlsrv_fetch_array($stmt_sub, SQLSRV_FETCH_ASSOC);

sqlsrv_close($conn);

// Function to format date
function formatDate($date) {
    if ($date instanceof DateTime) {
        return $date->format('Y-m-d');
    }
    return $date;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="profile">
        <h1>Profile Page</h1>
        <h2>Welcome, <?php echo htmlspecialchars($user['UserName']); ?>!</h2>
        <p>Email: <?php echo htmlspecialchars($user['Email']); ?></p>
        <p>Date of Birth: <?php echo htmlspecialchars(formatDate($user['DateOfBirth'])); ?></p>
        <p>Friends: <?php echo htmlspecialchars($user['Friends'] ?? 'N/A'); ?></p>
        <p>Registration Date: <?php echo htmlspecialchars(formatDate($user['reg_date'])); ?></p>
        
        <h3>Subscription Information</h3>
        <?php if ($subscription): ?>
            <p>Subscription Type: <?php echo htmlspecialchars($subscription['SubType']); ?></p>
            <p>Start Date: <?php echo htmlspecialchars(formatDate($subscription['StartingDate'])); ?></p>
            <p>End Date: <?php echo htmlspecialchars(formatDate($subscription['EndDate'])); ?></p>
        <?php else: ?>
            <p>No subscription found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
