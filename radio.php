<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio button</title>
<?php
$result = "";
$n1 = "";
$n2 = "";
$option = "";
if (isset($_GET['submit']))     
{
    $n1 = $_GET['num1'];
    $n2 = $_GET['num2'];

    if (isset($_GET['a']))  
    {

    $option = $_GET['a'] ;

    if($option=="add")
    {
        $result=$n1+$n2;
    }
    elseif($option=="sub") 
    {
     $result = $n1 - $n2;
    }
    }
    else
    {
        echo "please select radio button";
    }
    
}

?>
</head>
<body>
    <form method="get">
      N1  <input value="<?php echo $n1; ?>" type="number" name="num1" required /><br>

      N2  <input value="<?php echo $n2; ?>" type="number" name="num2" required /><br>

        Add: <input type="radio" name="a" value="add" <?php if($option == 'add') ?>/><br>

        sub: <input type="radio" name="a" value="sub" <?php if($option == 'sub') ?>/><br>

        <h1>Answer : <?php echo $result;?></h1>
        
        <input type="submit" name="submit" value="Calculate"/>
    </form>
</body>
</html>
