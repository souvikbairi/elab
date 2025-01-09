<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even or Odd Checker</title>
</head>
<body>
    <form method="POST">
        <table border="1" cellpadding="10">
            <tr>
                <th colspan="2">EVEN OR ODD</th>
            </tr>
            <tr>
                <td>ENTER THE NUMBER</td>
                <td><input type="number" name="number" required></td>
            </tr>
            <tr>
                <td>THE NUMBER IS</td>
                <td>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $number = $_POST['number'];
                        if ($number % 2 == 0) {
                            echo "EVEN";
                        } else {
                            echo "ODD";
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><CENTER><input type="submit" value="SUBMIT"></CENTER></td>
            </tr>
        </table>
    </form>
</body>
</html>
