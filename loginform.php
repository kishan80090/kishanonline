<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:  rgb(56, 54, 54);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 300px;
            background: linear-gradient(135deg, blue,blue, blue);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: green;
        }

        label {
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>
<?php
$hostname = "localhost";
$username = "naibasti";
$password = "forPr@ct1ce";
$database = "mydb";

$conn = new mysqli($hostname, $username, $password, $database);

$user_name = "";
$name = "";
$password = "";
$confirm_password = "";
$ispostback = false;
$message = "";

if (isset($_POST['check'])) {
    $ispostback = true;
}
if ($ispostback) {
    $user_name = $_POST['user_name'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {

        if ($conn->connect_error) {
            die("Connection failed : " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO sign (user_name, name, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $user_name, $name, $password);

        try {
            $stmt->execute();
            $message = "<p style='color: green; text-align:center;'><b>Insert successfully</b></p>";
        } catch (Exception $e) {
            $message = "<p style='color: red; text-align:center;'><b>Insert failed</b></p>";
        }

    } else {
        $message = "<p style='color: black; text-align:center;'><b>Password is not matched</b></p>";
    }
}
?>

<form method="post">
    <input type="hidden" name="check" />
    
    <h1>Registration form</h1>

    <?php
    if (!empty($message)) {
        echo $message;
    }

    ?>

    <label>User Name:</label>
    <input type="text" name="user_name" value="<?php echo $user_name ?>" required />

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $name ?>" required />

    <label>Password:</label>
    <input type="password" name="password" value="<?php echo $password ?>" required />

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" value="<?php echo $confirm_password ?>" required />

    <input type="submit" value="Submit" />
</form>

</body>
</html>
