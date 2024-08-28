<?php

session_start(); // Start the session at the beginning

// Include the database name username password
include 'username_database_password_server.php';

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch user name and friends list for user with Id = 1
$sql = "SELECT Name, Friends FROM [user] WHERE Id = 1";
$stmt = sqlsrv_query($conn, $sql);

$userName = "";
$friendsList = [];

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $userName = $row["Name"];
        $friendsList = explode(",", $row["Friends"]);
    } else {
        echo "No user found.";
    }
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <!-- Your existing styles -->
</head>
<body>
<div class="FriendsPageMichel">
  
  <div class="GameVault">
    Game Vault
  </div>
  
  <div class="FriendsPage">
    FRIENDS PAGE
  </div>

  <div class="UserName">
    <?php echo htmlspecialchars($userName); ?>
  </div>
  
  <div class="OnlineStatus">
    <span class="dot"></span> Online
  </div>
  
  <form method="POST" action="">
    <div class="Searchbox">
        <input type="text" name="searchTerm" class="SearchInput" placeholder="Search">
        <button type="submit">Search</button>
    </div>
  </form>

  <!-- Friends List -->
  <div class="Frame379">
    <div class="YourFriends">
      Your friends
    </div>
    <ul>
      <?php foreach ($friendsList as $friend): ?>
          <li>
              <form method="POST" action="">
                  <input type="hidden" name="friendName" value="<?php echo htmlspecialchars($friend); ?>">
                  <button type="submit"><?php echo htmlspecialchars($friend); ?></button>
              </form>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- Search Results -->
  <div class="SearchResults">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Re-establish the connection
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (isset($_POST['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];
            $filteredFriends = array_filter($friendsList, function($friend) use ($searchTerm) {
                return stripos($friend, $searchTerm) !== false;
            });

            if (count($filteredFriends) > 0) {
                echo "<div style='color: black; font-family: Abel; font-size: 1.5vw;'>Search Results:</div>";
                foreach ($filteredFriends as $friend) {
                    echo "<form method='POST' action=''>
                            <input type='hidden' name='friendName' value='" . htmlspecialchars($friend) . "'>
                            <button type='submit' style='background:none; border:none; color:black; font-size:2vw; font-family:Abel; cursor:pointer; margin-bottom:10px;'>" . htmlspecialchars($friend) . "</button>
                          </form>";
                }
            } else {
                echo "<div style='color: black; font-family: Abel; font-size: 2vw;'>No friends found with the name '$searchTerm'.</div>";
            }
        }

        if (isset($_POST['friendName'])) {
            $friendName = $_POST['friendName'];
            $sql = "SELECT * FROM [user] WHERE Name = ?";
            $params = array($friendName);
            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<div>";
                echo "Name: " . htmlspecialchars($row["Name"]) . "<br>";
                echo "Email: " . htmlspecialchars($row["Email"]) . "<br>";
                echo "Username: " . htmlspecialchars($row["UserName"]) . "<br>";
                echo "</div>";
            } else {
                echo "<div style='color: black; font-family: Abel; font-size: 2vw;'>No information found for '$friendName'.</div>";
            }

            sqlsrv_free_stmt($stmt);
        }

        sqlsrv_close($conn);
    }
    ?>
  </div>
</div>
</body>
</html>
