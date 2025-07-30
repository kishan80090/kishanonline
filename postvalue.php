<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post Add Numbers</title>
</head>
<body>

<?php
$result="";
    $n1 = "";
    $n2 = "";
if (isset($_POST['submit']))     
{
    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];

    $result = $n1 + $n2;
}
?>
<form method="post">

    <input value="<?php  echo $n1;  ?>" type="number" name="num1" required /><br>
    <input value = "<?php  echo $n2;  ?>" type="number" name="num2" required /><br>
    <h1><?php  echo $result;  ?></h1>
    <input type="submit" name="submit" value="ADD" />

</form>
</body>
</html>