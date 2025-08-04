<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
</head>
<body>

 <?php
session_start();

if (!isset($_SESSION['registered']) || $_SESSION['registered'] !== true) 
{
    header("Location: register.php");
    exit();
}
if (isset($_SESSION['user_name'])) 
{
    $user = $_SESSION['user_name'];
}
else 
{
    $user = 'Guest';      
}
?>

  <h1>Welcome, <?php echo ($user); ?>!</h1>
   
</body>
</html>