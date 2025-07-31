<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php cookies</title>
</head>
<body>
    <?php

setcookie("username", "Champak Roy", time() + (7 * 24 * 3600));

if (isset($_COOKIE['username']))

{
    echo "Welcome back, " . $_COOKIE['username'] . "!";
} 
else 
{
    echo "Welcome, guest!";
}

?>
</form>
</body>
</html>