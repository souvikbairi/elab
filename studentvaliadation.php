<?php
$link = mysqli_connect("localhost", "root", "", "student"); // Connect to the database
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $roll = $_POST['roll'];
    $name = trim($_POST['name']);
    $age = $_POST['age'];

    // Validation
    if (empty($name)) {
        echo "<script>alert('Name cannot be empty');</script>";
    } elseif ($age <= 0 || $age >= 100) {
        echo "<script>alert('Age should be between 1 and 99');</script>";
    } else {
        // Prepare the query
        $query = "INSERT INTO demo (roll, name, age) VALUES ('$roll', '$name', $age)";
        if (mysqli_query($link, $query)) {
            echo "<script>alert('Data inserted successfully.');</script>";
        } else {
            echo "Error inserting data: " . mysqli_error($link);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting Data into SQL Database using PHP</title>
</head>
<body>
    <div style="text-align: center;">
        <form method="post" style="display: inline-block;">
            <table border="1">
                <tr>
                    <th colspan="2">Data Input Form</th>
                </tr>
                <tr>
                    <th>Enter Roll</th>
                    <td><input type="number" name="roll" required></td>
                </tr>
                <tr>
                    <th>Enter Name</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>Enter Age</th>
                    <td><input type="number" name="age" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Submit" style="text-align: center;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
