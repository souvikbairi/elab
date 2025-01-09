<!-- factorial -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
</head>

<body>
    <?php
    
    $num1 = '';
    $factorial = '';

 
    if (isset($_POST['submit'])) {
       
        $num1 = intval($_POST['num1']);
        $factorial = fact($num1);
    }

    function fact($n) {
        $f = 1;
        for ($i = 1; $i <= $n; $i++) {
            $f *= $i;
        }
        return $f;
    }
    ?>

    <form method="post">
        <table border="1">
            <tr>
                <th colspan="4">Factorial Calculator</th>
            </tr>
            <tr>
                <th>Enter Value</th>
                <td><input type="number" name="num1" placeholder="Enter the value"
                        value="<?php echo htmlspecialchars($num1); ?>"></td>
            </tr>
            <tr>
                <th>Factorial</th>
                <td><input type="number" name="num2" readonly value="<?php echo htmlspecialchars($factorial); ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Calculate"></td>
            </tr>
        </table>
    </form>
</body>

</html>