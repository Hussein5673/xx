<?php
include 'username_database_password_server.php';

// Fetch user name and friends list for user with Id = 1
$sql = "SELECT Name, Friends FROM user WHERE Id = 1";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql);

$userName = "";
$friendsList = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userName = $row["Name"];
        $friendsList = explode(",", $row["Friends"]);
    }
} else {
    echo "No user found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap&family=Abel&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
        background-color: #0a1a29;
        color: white;
        margin: 0;
        font-family: 'Abel', sans-serif;
    }

    .FriendsPageMichel {
        padding: 20px;
    }

    .GameVault {
        font-size: 3vw;
        font-family: 'Righteous', cursive;
    }

    .FriendsPage {
        font-size: 2vw;
        font-family: 'Abel', sans-serif;
        text-align: center;
        margin-top: 10px;
    }

    .UserName {
        font-size: 2.5vw;
        font-family: 'Righteous', cursive;
        text-align: center;
        margin-top: 20px;
    }

    .OnlineStatus {
        font-size: 1.5vw;
        color: lightgreen;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .OnlineStatus .dot {
        height: 12px;
        width: 12px;
        background-color: lightgreen;
        border-radius: 50%;
        display: inline-block;
        margin-right: 10px;
    }

    .Frame379 {
        width: 35%;
        height: calc(100% - 310px);
        background: rgba(21, 69, 94, 0.44);
        padding: 20px;
        box-sizing: border-box;
        margin-top: 20px;
        overflow-y: auto;
        border-radius: 10px;
    }

    .YourFriends {
        font-size: 2.5vw;
        font-family: 'Abel', sans-serif;
        margin-bottom: 15px;
    }

    .Frame379 ul {
        padding-left: 20px;
        list-style-type: none;
    }

    .Frame379 ul li {
        margin-bottom: 10px;
    }

    .Frame379 ul li button {
        background: none;
        border: none;
        color: white;
        font-size: 2vw;
        font-family: 'Abel', sans-serif;
        cursor: pointer;
    }

    .SearchResults {
        width: 60%;
        height: calc(100% - 310px);
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        box-sizing: border-box;
        margin-left: 37%;
        margin-top: -280px;
        border-radius: 10px;
        overflow-y: auto;
    }

    .SearchResults div {
        color: black;
        font-family: 'Abel', sans-serif;
        font-size: 2vw;
        margin-bottom: 20px;
    }

    .Searchbox {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .SearchInput {
        padding: 10px;
        width: 70%;
        border-radius: 5px;
        border: none;
        font-size: 1.2vw;
    }

    .Search button {
        padding: 10px;
        border-radius: 5px;
        border: none;
        background-color: #15455e;
        color: white;
        font-size: 1.2vw;
        cursor: pointer;
    }

    .Search button:hover {
        background-color: #0a1a29;
    }
  </style>
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
    <?php echo $userName; ?>
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
                  <input type="hidden" name="friendName" value="<?php echo $friend; ?>">
                  <button type="submit"><?php echo $friend; ?></button>
              </form>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- Search Results -->
  <div class="SearchResults">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'username_database_password_server.php';

        if (isset($_POST['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];
            $filteredFriends = array_filter($friendsList, function($friend) use ($searchTerm) {
                return stripos($friend, $searchTerm) !== false;
            });

            if (count($filteredFriends) > 0) {
                echo "<div style='color: black; font-family: Abel; font-size: 1.5vw;'>Search Results:</div>";
                foreach ($filteredFriends as $friend) {
                    echo "<form method='POST' action=''>
                            <input type='hidden' name='friendName' value='" . $friend . "'>
                            <button type='submit' style='background:none; border:none; color:black; font-size:2vw; font-family:Abel; cursor:pointer; margin-bottom:10px;'>$friend</button>
                          </form>";
                }
            } else {
                echo "<div style='color: black; font-family: Abel; font-size: 2vw;'>No friends found with the name '$searchTerm'.</div>";
            }
        }

        if (isset($_POST['friendName'])) {
            $friendName = $_POST['friendName'];
            $sql = "SELECT * FROM user WHERE Name = '$friendName'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "Name: " . $row["Name"] . "<br>";
                    echo "Email: " . $row["Email"] . "<br>";
                    echo "Username: " . $row["UserName"] . "<br>";
                    echo "</div>";
                }
            } else {
                echo "<div style='color: black; font-family: Abel; font-size: 2vw;'>No information found for '$friendName'.</div>";
            }
        }

        $conn->close();
    }
    ?>
  </div>
</div>
</body>
</html>

