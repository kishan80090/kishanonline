<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show session</title>
</head>
<body>
    <?php

    session_start();


if ($_SESSION['is_logged_in']) {
    
    echo 'Welcome back, ' . $_SESSION['username'] . '!';
}


?>
    
</body>
</html>