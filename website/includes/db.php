<?php
$servername = "localhost";
$username = "root"; // change if your MySQL username is different
$password = "1234";     // change if your MySQL password is not empty
$dbname = "eshop"; // change to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>