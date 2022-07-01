<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u936223247_festus_pogserv');
define('DB_PASSWORD', '|J4JYJgp~0X');
define('DB_NAME', 'u936223247_pogserv');
 
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>