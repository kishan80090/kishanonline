<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Numbers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, red, blue, yellow);
        }

        form {
            background-color: white;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.67);
            border-radius:10px;
            width: 300px;
            
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 16px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 5px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        h2 {
            margin-top: 20px;
            color: #333;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
$result = "";
$n1 = "";
$n2 = "";
$select = "";

if (isset($_GET['submit'])) 
{
    $n1 = $_GET['num1'];
    $n2 = $_GET['num2'];

    if (isset($_GET['option'])) 
    {

        $select = $_GET['option'];

        if ($select == "add") 
        {
            $result = $n1 + $n2;
        } 
        elseif ($select == "sub") 
        {
            $result = $n1 - $n2;
        } 
        elseif ($select == "mul") 
        {
            $result = $n1 * $n2;
        } 
        elseif ($select == "div") 
        {
        if ($n2 != 0) 
        {
            $result = $n1 / $n2;
        } 
        else 
        {
            $result = "Cannot divide by zero";
        }
        }
    } 
    else 
    {
        $result = "Please select an operation";
    }
}
?>

<form method="get">
    <label>
        Value I:
        <input value="<?php echo $n1; ?>" type="number" name="num1" required />
    </label>
    
    <label>
        Value II:
        <input value="<?php echo $n2; ?>" type="number" name="num2" required />
    </label>

    <label>
        <input type="radio" name="option" value="add" <?php if($select == 'add')?> />
        Add
    </label>
    
    <label>
        <input type="radio" name="option" value="sub" <?php if($select == 'sub')?> />
        Sub
    </label>

    <label>
        <input type="radio" name="option" value="mul" <?php if($select == 'mul')?> />
        Multiply
    </label>

    <label>
        <input type="radio" name="option" value="div" <?php if($select == 'div')?> />
        Divide
    </label>

    <h2>Answer: <?php echo $result; ?></h2>

    <input type="submit" name="submit" value="Calculate" />

</form>

</body>
</html>