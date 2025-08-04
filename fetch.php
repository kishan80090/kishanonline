<?php
$hostname = "localhost";
$username = "naibasti";
$password = "forPr@ct1ce";
$database = "mydb";
$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error)
{
    echo "Hi";
    echo $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}
echo "connected successfully <br/> ";
$user_name = $_GET["user_name"];
$name = $_GET["name"];
$password = $_GET["password"];


echo "user_name : $user_name <br/> ";
echo "name : $name <br/> ";
echo "password : $password <br/>";

$stmt = $conn->prepare("INSERT INTO  sign (user_name, name, password) VALUES (?, ?, ?)");

$stmt->bind_param('sss', $user_name, $name, $password);

try
{
$stmt->execute();

echo "insert successfully";
}
catch(Exception $e)
{
    echo "fail";
}
?>