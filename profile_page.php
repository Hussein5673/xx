<?php
include 'username_database_password_server.php';

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
$result = $conn->query($sql);

// Default value for Friends as an empty string
    $defaultFriendsValue = '';


    // Execute the query and check if it was successful
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: index.php");
        exit;
    }

if ($result->num_rows > 0) {
  // Fetch the user data
  $row = $result->fetch_assoc();
  $user_level = $row["level"];
  $user_trophies = $row["trophies"];
  $user_cups = $row["cups"];
  $user_medals = $row["medals"];
  $user_prizes = $row["prizes"];
} else {
  echo "No user profile found";
}

sqlsrv_close($conn);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
 <style>
    body, html {
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <!--hello-->

<div class="LindaSProfilePage" style="width: 1920px; height: 1024px; position: relative; background: white">
  <img class="UnsplashSihczyewmb0" style="width: 1920px; height: 1024px; left: 0px; top: 0px; position: absolute" src="picturespfp/unsplash_SIhcZYEwMB0.png" />
  <img class="Union" style="width: 1256px; height: 128px; left: 217px; top: 278px; position: absolute; border-radius: 20px" src="picturespfp/Union.png" />
  <div class="Username" style="left: 395px; top: 305px; position: absolute; color: white; font-size: 48px; font-family: Pavanam; font-weight: 400; line-height: 56px; word-wrap: break-word">username</div>
  <div class="Frame98" style="height: 112px; padding-top: 8px; padding-left: 16px; padding-right: 342px; left: 1438px; top: 891px; position: absolute; background: #07041D; border-radius: 12px; overflow: hidden; flex-direction: column; justify-content: flex-end; align-items: flex-start; gap: 12px; display: inline-flex">
    <img class="Meeting" style="width: 65px; height: 48px" src="picturespfp/Meeting.png" />
    <div class="Players" style="color: white; font-size: 25px; font-family: Pavanam; font-weight: 400; line-height: 22px; word-wrap: break-word">players<br/></div>
<div class="Username" style="left: 395px; top: 305px; position: absolute; color: white; font-size: 48px; font-family: Pavanam; font-weight: 400; line-height: 56px; word-wrap: break-word">
    <?php echo htmlspecialchars($user_username); ?> 
</div>
  </div>
  <div class="Frame93" style="width: 429px; height: 112px; left: 984px; top: 891px; position: absolute; background: #07041D; border-radius: 12px; overflow: hidden">
    <div class="PremiumRequiredForOnlinePlay" style="left: 16px; top: 74px; position: absolute; color: white; font-size: 25px; font-family: Pavanam; font-weight: 400; line-height: 22px; word-wrap: break-word">premium required for online play</div>
    <img class="MembershipCard" style="width: 100px; height: 40px; left: 0px; top: 16px; position: absolute" src="picturespfp/Membership Card.png" />
  </div>
  <div class="Frame99" style="width: 164px; height: 49px; padding: 8px; left: 564px; top: 421px; position: absolute; background: #07041D; border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
    <div class="Menu" style="padding: 12px; background: #07041D; border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
      <div class="Menu" style="color: #E7ECF1; font-size: 25px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">favorites</div>
    </div>
    <img class="Favorite" style="width: 30px; height: 30px" src="picturespfp/Heart.png" />
    <div class="Heart" style="width: 24px; height: 24px; justify-content: center; align-items: center; display: flex">
      <div class="Vector" style="width: 24px; height: 24px"></div>
    </div>
  </div>
  <img class="Customer" style="width: 100px; height: 100px; left: 253px; top: 280px; position: absolute" src="picturespfp/Customer.png" />
  <div class="Frame88" style="padding-left: 24px; padding-right: 24px; padding-top: 16px; padding-bottom: 16px; left: 12px; top: 90px; position: absolute; background: #08051E; border-radius: 12px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
  <!-- Signin Button -->
  <div class="Frame88" style="padding-left: 24px; padding-right: 24px; padding-top: 10px; padding-bottom: 16px; left: 12px; top: 390px; position: absolute; background: #08051E; border-radius: 12px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
      <a href="Sign_in_html.html" style="text-decoration: none;">
        <div class="MenuItem" style="color: white; font-size: 28px; font-family: Pavanam; font-weight: 400; line-height: 28px; word-wrap: break-word">Signin</div>
      </a>
    </div>
    
    <!-- Catalogue Button -->
    <div class="Frame98" style="padding-left: 24px; padding-right: 24px; padding-top: 10px; padding-bottom: 16px; left: 17px; top: 440px; position: absolute; background: #08051E; border-radius: 12px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
      <a href="Catalog_page.html" style="text-decoration: none;">
        <div class="Catalogue" style="color: white; font-size: 28px; font-family: Pavanam; font-weight: 400; line-height: 28px; word-wrap: break-word">Catalogue</div>
      </a>
    </div>
    
    <!-- Subscriptions Button -->
    <div class="Frame99" style="padding-left: 24px; padding-right: 24px; padding-top: 10px; padding-bottom: 16px; left: 17px; top: 490px; position: absolute; background: #08051E; border-radius: 12px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
      <a href="subscription.html" style="text-decoration: none;">
        <div class="MenuItem" style="color: white; font-size: 28px; font-family: Pavanam; font-weight: 400; line-height: 28px; word-wrap: break-word">Subscriptions</div>
      </a>
    </div>
    
    <!-- Friends Button -->
    <div class="Frame100" style="padding-left: 24px; padding-right: 24px; padding-top: 10px; padding-bottom: 16px; left: 13px; top: 540px; position: absolute; background: #08051E; border-radius: 12px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
      <a href="friendspage.html" style="text-decoration: none;">
        <div class="MenuItem" style="color: white; font-size: 28px; font-family: Pavanam; font-weight: 400; line-height: 28px; word-wrap: break-word">Friends</div>
      </a>
    </div>
    
    <!-- Signup Button -->
    <div class="Frame101" style="padding-left: 24px; padding-right: 24px; padding-top: 10px; padding-bottom: 16px; left: 13px; top: 590px; position: absolute; background: #08051E; border-radius: 12px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
      <a href="SignUp.html" style="text-decoration: none;">
        <div class="MenuItem" style="color: white; font-size: 28px; font-family: Pavanam; font-weight: 400; line-height: 28px; word-wrap: break-word">Signup</div>
      </a>
    </div>
  </div>
  <div class="Frame100" style="width: 49px; height: 38px; left: 606px; top: 319px; position: absolute; background: black; justify-content: center; align-items: center; display: inline-flex">
    <img class="MembershipCard" style="width: 75px; height: 38px" src="picturespfp/Membership Card.png" />
  </div>
 
   
</a>
  <div class="Frame107" style="padding-top: 6px; padding-left: 20px; padding-right: 32px; left: 378px; top: 407px; position: absolute; background: #08051E; justify-content: flex-start; align-items: center; display: inline-flex">
   <a href="dm-profile.html" style="text-decoration: none;">
  <img class="ChatMessage" style="width: 60px; height: 60px" src="picturespfp/Frame 107.png" />
  </div>
  <div class="Frame108" style="padding-top: 18px; padding-bottom: 5px; padding-left: 28px; padding-right: 36px; left: 458px; top: 394px; position: absolute; background: #07041D; justify-content: flex-start; align-items: center; display: inline-flex">
    <a href="audio-profile.html" style="text-decoration: none;">
    <img class="Headset" style="width: 60px; height: 60px" src="picturespfp/Frame 108.png" />
  </div>
  <div class="GameVault" style="width: 348px; height: 91px; left: -9px; top: 24px; position: absolute; text-align: center; color: white; font-size: 57px; font-family: Righteous; font-weight: 400; line-height: 64px; word-wrap: break-word">Game Vault</div>
  <div class="Frame113" style="width: 200px; height: 96px; left: 1000px; top: 290px; position: absolute; background: #07041D">
    <div class="Level" style="width: 200px; height: 38px; left: 0px; top: 29px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">Level . </div>
    <div style="width: 103px; height: 97px; left: 100px; top: 48px; position: absolute; color: white; font-size: 100px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">0</div>
  </div>
  <div class="Frame114" style="width: 243px; height: 54px; left: 1170px; top: 315px; position: absolute; background: #07041D"></div>
  <div class="Line5" style="width: 215.01px; height: 0px; left: 1184px; top: 344px; position: absolute; transform: rotate(-0.53deg); transform-origin: 0 0; border: 1px #70BDBD solid"></div>
  <div class="Frame115" style="padding-top: 19px; padding-left: 18px; left: 1350px; top: 290px; position: absolute; background: #07041D; justify-content: flex-end; align-items: center; display: inline-flex">
    <div style="width: 45px; height: 38px; color: white; font-size: 20px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">0%</div>
  </div>
  <div class="Group2" style="width: 309px; height: 433px; left: 1438px; top: 432px; position: absolute">
    <div class="Menu" style="width: 288.95px; height: 433px; padding: 12px; left: 0px; top: 0px; position: absolute; background: #08051E; border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
      <div class="Menu" style="flex: 1 1 0; color: #E7ECF1; font-size: 45px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">trophies </div>
    </div>
    <img class="Prize" style="width: 72.92px; height: 82.39px; left: 20.05px; top: 299.35px; position: absolute" src="picturespfp/Prize.png" />
    <div class="Line2" style="width: 143.11px; height: 0px; left: 88.42px; top: 180.34px; position: absolute; border: 1px #70BDBD solid"></div>
    <img class="MedalFirstPlace" style="width: 72.92px; height: 82.39px; left: 20.05px; top: 216.96px; position: absolute" src="picturespfp/Medal First Place.png" />
    <img class="Trophy" style="width: 63.81px; height: 54.93px; left: 24.61px; top: 71.40px; position: absolute" src="picturespfp/Trophy.png" />
    <img class="WorldCup" style="width: 91.15px; height: 73.23px; left: 10.94px; top: 143.72px; position: absolute" src="picturespfp/World Cup.png" />
    <div class="Line1" style="width: 143.11px; height: 0px; left: 92.97px; top: 98.87px; position: absolute; border: 1px #70BDBD solid"></div>
    <div class="Line3" style="width: 143.11px; height: 0px; left: 92.97px; top: 258.15px; position: absolute; border: 1px #70BDBD solid"></div>
    <div class="Line4" style="width: 143.11px; height: 0px; left: 88.42px; top: 340.54px; position: absolute; border: 1px #70BDBD solid"></div>
    <div style="width: 68.36px; height: 54.01px; left: 240.64px; top: 98.87px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">0</div>
    <div style="width: 68.36px; height: 54.01px; left: 236.08px; top: 180.34px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">0</div>
    <div style="width: 68.36px; height: 54.01px; left: 236.08px; top: 258.15px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">0</div>
    <div style="width: 68.36px; height: 54.01px; left: 236.08px; top: 339.63px; position: absolute; color: white; font-size: 40px; font-family: Pavanam; font-weight: 400; line-height: 16px; word-wrap: break-word">0</div>
  </div>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@400;900&family=Righteous&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@400;900&family=Pavanam&family=Righteous&display=swap" rel="stylesheet">
</div>
<nav>
  <a href="index.php" style="position: absolute; left: -9px; top: 24px; text-decoration: none;">
    <div class="GameVault" style="width: 348px; height: 91px; text-align: center; color: white; font-size: 57px; font-family: Righteous; font-weight: 400; line-height: 64px; word-wrap: break-word;">
      Game Vault
    </div>
  </a>
</div>  
<div class="MenuButtons">
  <div class="Menu">
    
  </div>
  <div class="Menu">

  </div>
  <div class="Menu">
    
  </div>
  <div class="Menu">
    
  <div class="Menu">
  </div>
</div>

</nav>
</body>
</html>
<?php
$conn->close();
?> 