<?php
echo "Hi";
$hostname = "localhost";
$username = "naibasti";
$password = "forPr@ct1ce";
$database = "mydb";
echo "Hi";
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error)
{
    echo "Hi";
    echo $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}
echo "connected";
$name = $_GET["name"];
$mobile = $_GET["mobile"];
$email = $_GET["email"];
$password = $_GET["password"];

echo "Connected successfully";

$stmt = $conn->prepare("INSERT INTO detail (name, mobile, email, password) VALUES (?, ?, ?, ?)");

$stmt->bind_param("sssd", $name, $mobile, $email, $password);

$stmt->execute()
echo "Connected successfully";
?>