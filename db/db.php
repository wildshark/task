<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25-May-17
 * Time: 8:05 PM
 */

//define database connection
$server = "localhost";
$username = "root";
$password = "usbw";
$database = "cu_task";
$port = "3307";

// Create connection
$conn = new mysqli($server, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";