<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data into Demo Table</title>
</head>
<body>
    <h1>Insert Data into Demo Table</h1>

    <form method="POST" action="">
        <label for="roll">Roll:</label>
        <input type="number" id="roll" name="roll" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <button type="submit" name="submit">Insert</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
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

        // Get form data
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $age = $_POST['age'];

        // Prepare SQL statement
        $sql = "INSERT INTO demo (roll, name, age) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $roll, $name, $age);

        // Execute the query
        if ($stmt->execute()) {
            echo "<p>Record inserted successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>