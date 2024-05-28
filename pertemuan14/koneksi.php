<?php
$host = 'localhost';
$user = 'root'; // Adjust this if you have a different username
$password = ''; // Adjust this if you have a different password
$database = 'db_transaction'; // Replace with your actual database name

$koneksi = new mysqli($host, $user, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
