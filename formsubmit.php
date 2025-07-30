<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

echo ($_GET['check']);

$ispostback=isset($_GET['check']);

if($ispostback)
{

    echo "postback";
}
else
{
    echo "firsttime";
}
?>
    <h1>hellow</h1>

    <form>
<form method="get">
<input type="hidden" value="a" name="check"/>
<input type="submit"value="add"/>
</form>
</body>
</html>