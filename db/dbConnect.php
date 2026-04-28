<?php
$hostName = "localhost";
$userName = "root";
$password = null;
$database = "questions";

// connect database with PDO 
// $conn = new PDO("mysql:host=$hostName; dbname=questions", $userName, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// connect to database with Mysqli 
$conn = new mysqli($hostName, $userName, $password, $database);

if ($conn->connect_error) {
    die("Failed to Connect the Database $conn->connect_error");
}
