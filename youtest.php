<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
echo ($_GET['checked']);
    $ispostback=($_GET['checked']);
    if($ispostback)
    {
      echo "postback";

    }else{
        echo "first back";
    }
?>
<form method="get">
<input type="hidden" Value="a" name="checked"/>
<input type="submit" Value="add"/>
</form>
</body>
</html>