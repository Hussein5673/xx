<?php
include 'username_database_password_server.php';

$searchTerm = $_POST['searchTerm'];

$sql = "SELECT * FROM user WHERE Name LIKE '%$searchTerm%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"] . "<br>";
        echo "Email: " . $row["Email"] . "<br>";
        echo "Username: " . $row["UserName"] . "<br>";
        // Add other fields as needed
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
