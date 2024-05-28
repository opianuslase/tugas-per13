<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_searching";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
