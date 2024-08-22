<?php
// db_config.php

$db_user = "root";
$db_pass = "";
$db = "user_base";
$db_host = "localhost:3306";
// Create a connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db);
?>