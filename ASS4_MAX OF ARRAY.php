<!-- Write_program_in_php_to_print_the_maximun_value of array-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maximum Value Finder</title>
    
</head>

<body>
    <div class="container">
        <h1>Maximum Value Finder</h1>
        <form method="post">
            <label for="numbers">Enter numbers separated by commas:</label>
            <input type="text" id="numbers" name="numbers" placeholder="e.g 10, 20, 30" required>
            <input type="submit" name="submit" value="Find Maximum">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            
            $input = $_POST['numbers'];
            $numbers = array_map('trim', explode(',', $input)); 
            
          
            $numbers = array_map('intval', $numbers);

           
            $maxValue = max($numbers);

            
            echo "<p class='result'>The maximum value is $maxValue.</p>";
        }
        ?>
    </div>
</body>

</html>