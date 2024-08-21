<?php
include 'username_database_password_server.php';

$sql = "SELECT Name FROM user WHERE Id = 1"; // Assuming you want to show friends of user with Id 1
$result = $conn->query($sql);

$friendsList = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $friendsList = explode(",", $row["Name"]);
    }
} else {
    echo "No friends found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="FriendsPageMichel">
  
  <div class="GameVault" style="position: absolute; top: 10px; left: 20px; color: white; font-size: 3vw; font-family: Righteous; font-weight: 400;">
    Game Vault
  </div>
  
  <div class="FriendsPage" style="position: absolute; top: 36px; left: 50%; transform: translateX(-50%); color: white; font-size: 2vw; font-family: Abel; font-weight: 400;">
    FRIENDS PAGE
  </div>
  
  <form method="POST" action="Search.php">
    <div class="Searchbox">
        <div class="Search">
            <div class="Icon">
                <img src="Icons/Icon.png" alt="Icon Image">
            </div>
        </div>
        <input type="text" name="searchTerm" class="SearchInput" placeholder="Search">
    </div>
</form>

  
  <div class="Frame379" style="width: 35%; height: calc(100% - 310px); position: absolute; top: 220px; left: 0px; background: rgba(21, 69, 94, 0.44); padding: 20px; box-sizing: border-box;">
    <div class="YourFriends" style="color: white; font-size: 2vw; font-family: Abel; font-weight: 400;">
      Your friends
    </div>
  </div>
</div>
</body>
</html>