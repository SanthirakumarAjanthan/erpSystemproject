<?php
// Database configuration
$servername = "localhost"; // Your database server (usually 'localhost')
$username = "root";         // Your database username (default is usually 'root' for local environments)
$password = "";             // Your database password (leave empty if you have no password set)
$dbname = "assignment";         // Your database name (make sure this matches your actual database name)

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
