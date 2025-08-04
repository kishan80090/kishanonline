<?php
$hostname="localhost";
$username="root";
$password="";
$database="";

$conn= mysqli($hostname,$username,$password,$database);

if($conn->connect_error)
{
   echo "failed";
   die("not connect:"  . $conn->connect_error);
}
$name=$_GET['name'];
$password=$_GET['password'];
$email=$_GET['email'];

$stmt=conn->prepare("insert into sign (name,password,email) values(?,?,?) ");
$stmt=bind_param('sss',$email,$name,$password);
$stmt->execute();
echo "faileds";
try{
    $conn->execute();
} catch(Exception $e)
{
    echo "insert not add";
}

?>