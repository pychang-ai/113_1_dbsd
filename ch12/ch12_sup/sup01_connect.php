<?php
//for you XAMPP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myschool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// for AWS
$aws_server = "13.54.4.168:3306";
$aws_username = "root";
$aws_password = "root";

// Create AWSconnection
$conn = new mysqli($aws_server, $aws_username, $aws_password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
