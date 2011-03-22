<?php

//// Fill in all the info we need to connect to the database.
// This is the same info you need even if you're using the old mysql_ library.
$host = 'localhost';
$port = 3306; // This is the default port for MySQL
$database = 'iClassroom';
$username = 'root';
$password = 'Hiimbob6695';

// Construct the DSN, or "Data Source Name".  Really, it's just a fancy name
// for a string that says what type of server we're connecting to, and how
// to connect to it.  As long as the above is filled out, this line is all
// you need :)
$dsn = "mysql:host=$host;port=$port;dbname=$database";

// Connect!
$db = new PDO($dsn, $username, $password);
?>
