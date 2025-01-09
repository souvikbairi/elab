<!-- add two numbers -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form{
            display: block;
        }
    </style>
</head>

<body>
    <form method="post">
        <table border="1">
            <tr>
                <th colspan="2">Input</th>
            </tr>
            <tr>
                <th>Number 1</th>
                <td><input type="number" name="num1" placeholder="Enter Number 1" value="<?php echo $num1 ?>"></td>
            </tr>
            <tr>
                <th>Number 2</th>
                <td><input type="number" name="num2" placeholder="Enter Number 2" value="<?php echo $num2 ?>"></td>
            </tr>

            <tr>
                <th>Answer</th>
                <td id="result"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" style="text-align: center;"
                 sty value="Get Result"></td>
            </tr>
        </table>
    </form>

    <?php
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        
        $sum = $num1 + $num2;

        
        echo "<script>document.getElementById('result').innerHTML = '$sum';</script>";
    }
    ?>
</body>

</html>