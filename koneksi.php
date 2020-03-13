<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krdschangelog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("[KRDSNews] Database Gagal " . $conn->connect_error);
}

?>