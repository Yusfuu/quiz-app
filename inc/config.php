<?php
// Database credentials 
define("SERVER", "127.0.0.1");
define("USERNAME", "root");
define("PASSWORD", "toor");
define("DATABASE", "quizapp");
define("PORT", "3306");

// Open a connection to the MySQL server
$link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE, PORT);

// Check connection if there is an error stop script and display the error. 
if (!$link) die(mysqli_connect_error());
