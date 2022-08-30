<?php
//Variables below hold user account information for mysql.
$serverName = "localhost";
$username = "root";
$password = "";
$database = "bookstore";//The target database.

// Creating a database connection
$DBConn = new mysqli($serverName, $username, $password, $database);

// Checking if theres a connection to the target database.
if ($DBConn->connect_error) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
//Selecting the target database for use.
$selectDBQueryResult = mysqli_select_db($DBConn, $database);
if ($selectDBQueryResult === FALSE){
    echo "<p>Unable to select database.</p>\n";
    echo "<p>Error code: " . mysqli_errno($DBConn) . " : " 
    . mysqli_error($DBConn) . "</p>";
}