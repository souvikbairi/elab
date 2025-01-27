<?php
// Connect to the database
$link = mysqli_connect("localhost", "root", "", "student");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Deleting a record
if (isset($_GET['mode']) && $_GET['mode'] === "del" && isset($_GET['roll'])) {
    $roll = intval($_GET['roll']);
    mysqli_query($link, "DELETE FROM demo WHERE Roll=$roll");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying Data from the Database...</title>
</head>
<body>
<div style="text-align: center;">
<form method="post" style="display: inline-block;">
        <table border="1">
            <tr>
                <th colspan="5">Display Data</th>
            </tr>
            <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Age</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php
            $sql = "SELECT * FROM demo";  // Ensure you're using the correct table name
            $result = mysqli_query($link, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($link));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['Roll']}</td>";
                echo "<td>{$row['Name']}</td>";
                echo "<td>{$row['Age']}</td>";
                echo "<td align='center'>
                    <a href='?mode=del&roll={$row['Roll']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                        <img src='image/deleteimg.webp' height='30' width='30' border='0' title='Delete'>
                    </a>
                </td>";
                // Edited the link for the Edit button to make it functional
                echo "<td><a href='edit.php?roll={$row['Roll']}'>Edit</a></td>"; 
                echo "</tr>";
            }

            mysqli_free_result($result);
            ?>
        </table>
    </form>
</div>
</body>
</html>
