<?php   

session_start();

$_SESSION['username'] = 'JohnDoe';
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Show Session</title>

</head>

<body>

    <?php

    $name="";

    $data="";

    $ispostback=false;

    if(isset($_GET["check"]))

    $ispostback=true;

    if($ispostback)

    {

      $name=$_GET["name"];

    echo $_SESSION[$name];

    }
    ?>

    <h1>Show Session</h1>

    <form>

        <input type="hidden" name="check" value="1">

        <h2>Name</h2><input type="text" value="<?php echo $name ?>" name="name"/>
        <br>
        <br>
        <button type="submit">Submit</button>

    </form>

</body>

</html>