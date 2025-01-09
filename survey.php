<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <style>
        body {
            background-color: green;
            color: black;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .form-container {
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .form-container h1 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"], input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $option = htmlspecialchars($_POST['option']);
    $recommend = htmlspecialchars($_POST['recommend']);
    $languages = isset($_POST['languages']) ? implode(", ", $_POST['languages']) : "None";
    $comments = htmlspecialchars($_POST['comments']);

    echo "<div class='form-container'>";
    echo "<h1>Survey Results</h1>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Age:</strong> $age</p>";
    echo "<p><strong>Option:</strong> $option</p>";
    echo "<p><strong>Recommend:</strong> $recommend</p>";
    echo "<p><strong>Languages & Frameworks Known:</strong> $languages</p>";
    echo "<p><strong>Comments:</strong> $comments</p>";
    echo "</div>";
} else {
    // Display the survey form
?>

<div class="form-container">
    <h1>Survey Form</h1>
    <form action="" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name..." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email..." required>

        <label for="age">Age</label>
        <input type="number" id="age" name="age" placeholder="Enter your age..." required>

        <label for="option">Which option best describes you?</label>
        <select id="option" name="option" required>
            <option value="" disabled selected>--Select--</option>
            <option value="Student">Student</option>
            <option value="Professional">Professional</option>
            <option value="Other">Other</option>
        </select>

        <label>Would you recommend this to a friend?</label>
        <input type="radio" id="yes" name="recommend" value="Yes">
        <label for="yes" style="display:inline;">Yes</label>
        <input type="radio" id="no" name="recommend" value="No">
        <label for="no" style="display:inline;">No</label>
        <input type="radio" id="maybe" name="recommend" value="Maybe">
        <label for="maybe" style="display:inline;">Maybe</label>

        <label>Languages & frameworks known (Check all that apply):</label>
        <input type="checkbox" id="c" name="languages[]" value="C">
        <label for="c" style="display:inline;">C</label>
        <input type="checkbox" id="cpp" name="languages[]" value="C++">
        <label for="cpp" style="display:inline;">C++</label>
        <input type="checkbox" id="java" name="languages[]" value="Java">
        <label for="java" style="display:inline;">Java</label>
        <input type="checkbox" id="python" name="languages[]" value="Python">
        <label for="python" style="display:inline;">Python</label>
        <input type="checkbox" id="javascript" name="languages[]" value="JavaScript">
        <label for="javascript" style="display:inline;">JavaScript</label>
        <input type="checkbox" id="react" name="languages[]" value="React">
        <label for="react" style="display:inline;">React</label>
        <input type="checkbox" id="angular" name="languages[]" value="Angular">
        <label for="angular" style="display:inline;">Angular</label>
        <input type="checkbox" id="django" name="languages[]" value="Django">
        <label for="django" style="display:inline;">Django</label>
        <input type="checkbox" id="spring" name="languages[]" value="Spring">
        <label for="spring" style="display:inline;">Spring</label>

        <label for="comments">Any comments or suggestions</label>
        <textarea id="comments" name="comments" placeholder="Enter comments here..." rows="5"></textarea>

        <button type="submit">Submit</button>
    </form>
</div>

<?php
}
?>

</body>
</html>
