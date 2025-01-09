<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Data in Demo Table</title>
</head>
<body>
    <h1>Manage Data in Demo Table</h1>

    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle delete request
    if (isset($_GET['delete'])) {
        $rollToDelete = $_GET['delete'];
        $sql = "DELETE FROM demo WHERE roll = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $rollToDelete);
        $stmt->execute();
        $stmt->close();
        echo "<p>Record deleted successfully.</p>";
    }

    // Handle edit request
    if (isset($_GET['edit'])) {
        $rollToEdit = $_GET['edit'];
        $editResult = $conn->query("SELECT * FROM demo WHERE roll = $rollToEdit");
        if ($editResult->num_rows > 0) {
            $editRow = $editResult->fetch_assoc();
            $editRoll = $editRow['roll'];
            $editName = $editRow['name'];
            $editAge = $editRow['age'];
            echo "<h2>Edit Record</h2>";
            echo "<form method='POST' action=''>
                <label for='roll'>Roll (cannot be changed):</label>
                <input type='number' id='roll' name='roll' value='$editRoll' readonly><br><br>

                <label for='name'>Name:</label>
                <input type='text' id='name' name='name' value='$editName' required><br><br>

                <label for='age'>Age:</label>
                <input type='number' id='age' name='age' value='$editAge' required><br><br>

                <button type='submit' name='update'>Update</button>
            </form>";
        }
    }

    // Handle update request
    if (isset($_POST['update'])) {
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $age = $_POST['age'];

        $sql = "UPDATE demo SET name = ?, age = ? WHERE roll = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $name, $age, $roll);

        if ($stmt->execute()) {
            echo "<p>Record updated successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    // Fetch and display data
    echo "<h2>Data in Demo Table</h2>";
    $result = $conn->query("SELECT * FROM demo");

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'><tr><th>Roll</th><th>Name</th><th>Age</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['roll'] . "</td><td>" . $row['name'] . "</td><td>" . $row['age'] . "</td>";
            echo "<td><a href='?edit=" . $row['roll'] . "'>Edit</a> | <a href='?delete=" . $row['roll'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
