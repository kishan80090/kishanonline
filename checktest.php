<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check</title>
    
    
</head>
<body>
    <?php
$hostname = "localhost";
$username = "naibasti";
$password = "forPr@ct1ce";
$database = "mydb";

$conn = new mysqli($hostname, $username, $password, $database);

$user_name="";
$name="";
$password="";
$ispostback=false;

if(isset($_GET['check']))
{
    $ispostback=true;
}
if($ispostback)
{
    // echo "postback";
    $user_name=$_GET['user_name'];
    $name=$_GET['name'];
    $password=$_GET['password'];
}


if ($conn->connect_error)
{
    echo "Hi";
    echo $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

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


    <h1>Sign in</h1>

<form method="get">

           <input type="hidden" name="check"/>
           
User_Name: <input type="text"name="user_name"value="<?php echo $user_name ?>"/><br>
           
Name:      <input type="text"name="name"value="<?php echo $name ?>"/><br>
           
Password:  <input type="text"name="password"value="<?php  echo $password ?>"/><br>

           <input type="submit"value="Submit"/>

    </form>


</body>
</html>