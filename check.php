 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <style>
  
    *{
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    body {
      background:rgba(0, 0, 0, 0.14);
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }
    .form-container 
    {
      background-color: blue;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 340px;
      border: 2px solid #ffffffcc;
    }
    .form-container:hover
    {
      border: 2px solid blue;
    }
    h2 
    {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    .form-group 
    {
      margin-bottom: 18px;
    }
    .inputs
    {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: 0.3s;
    }
    .inputs:focus 
    {
      border-color: #007bff;
      outline: none;
    }
    .submit-btn 
    {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      font-size: 18px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .submit-btn:hover 
    {
      background-color: #0056b3;
    }
    .success 
    {
      color: green;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .error 
    {
      color: red;
      font-weight: bold;
      margin-bottom: 15px;
    }
    @media (max-width: 480px) 
    {
      .form-container 
      {
        padding: 20px;
      }
    }
    @keyframes fadeAnimation 
    {
      0%, 100% { opacity: 0; }
      50% { opacity: 1; }
    }
    .fading
    {
      color: red;
      animation: fadeAnimation 2s infinite;
    }
  </style>
</head>
<body>

<?php

session_start();

$hostname = "localhost";
$username = "naibasti";
$password = "forPr@ct1ce";
$database = "mydb";

$conn = new mysqli($hostname, $username, $password, $database);

$user_name = "";
$name = "";
$password = "";
$confirmpassword = "";

$ispostback = false;
$message = "";

if (isset($_POST['check'])) 
{
    $ispostback = true;
}

if ($ispostback) 
{
    $user_name = $_POST["user_name"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $confirmpassword = $_POST['confirmpassword'];
}

if ($conn->connect_error) 
{
    echo $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

if ($ispostback) 
{
    if ($password == $confirmpassword) 
    {
  
        $stored_password = $password; 

        $stmt = $conn->prepare("INSERT into sign(user_name,name,password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user_name, $name, $stored_password);

        try {

            if ($stmt->execute()) 

            {    
                $_SESSION['registered'] = true;
                $_SESSION['user_name'] = $user_name;
                header("Location: welcome.php");
                exit();
            } 

        } 
        catch(Exception $e) 
        {
            $message = '<div class="error">Fail</div>';
        }

        $stmt->close();
    } 
    else 
    {
        $message = '<div class="error">Password and confirm password do not match.</div>';
    }
}

$conn->close();
?>

<div class="form-container">
  <h2 class="fading">Registration Form</h2>
  <?php if (!empty($message)) echo $message; ?>
  <form method="post">

      <input type="hidden" name="check" />

      User Name<input class="inputs" type="text" name="user_name" value="<?php echo ($user_name); ?>" required/><br><br>

      Name<input class="inputs" type="text" name="name" value="<?php echo ($name); ?>" required/><br><br>

      Password<input class="inputs" type="password" name="password"value="<?php echo ($password); ?>" required/><br><br>

      Confirm Password<input class="inputs" type="password" name="confirmpassword"value="<?php echo ($confirmpassword); ?>" required/><br><br>

      <input class="submit-btn" type="submit" value="Submit"/>          
      </form>
</div>
</body>
</html>