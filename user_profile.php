<?php
include 'username_database_password_server.php';

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



--


CREATE TABLE `user_profile` (
  `level` int(11) NOT NULL,
  `trophies` int(11) NOT NULL,
  `cups` int(11) NOT NULL,
  `medals` int(11) NOT NULL,
  `prizes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO "user_profile"("level","trophies","cups","medals","prizes") VALUES(30,6,9,28,43);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
