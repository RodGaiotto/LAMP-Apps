<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

define('DB_SERVER', 'sl-us-south-1-portal.27.dblayer.com:46404');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'ZWZJWJPFASNIGKLN');
define('DB_NAME', 'test');

/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
                   }
?>
