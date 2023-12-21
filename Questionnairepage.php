<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyTech Feedback Questionnaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #4caf50;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="text"]:focus,
        textarea:focus {
            background-color: #e6f7ff; /* Change the background color when focused */
        }

        input[type="radio"], input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    
        
    <form id="questionnaireForm" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <h1><a href="index.html"><img style="width: 200px;" src="images/logo.png" alt=""></a></h1>
        <h2>Feedback Questionnaire</h2>
        
        <!-- Textbox -->
        <label for="name">Your name:</label>
        <input type="text" id="name" name="name">
        <div class="error-message">
        <?php
        $isnamed = true;// name validation
        if (isset($_POST["name"])){
            if ($_POST["name"] == ""){
                echo "Please enter name.";
                $isnamed = false;
            }
        }
        ?>
        </div>
        <!-- Radio buttons -->
        <label>Rate our service:</label>
        <label><input type="radio" name="rating" value="excellent"> Excellent</label>
        <label><input type="radio" name="rating" value="good"> Good</label>
        <label><input type="radio" name="rating" value="average"> Average</label>
        <div class="error-message">
        <?php
        $israted = true;// rate validation
        if (!isset($_POST["rating"]) and isset($_POST['name'])){
            echo "Please rate us!";
            $israted = false;
        }
        ?>
        </div>
        <!-- Checkbox -->
        <label>What did you like?</label>
        <label><input type="checkbox" name="likes1" value="product"> Product</label>
        <label><input type="checkbox" name="likes2" value="service"> Service</label>

        <!-- Textarea -->
        <label for="comments">Additional Comments:</label>
        <textarea id="comments" name="comments" rows="4"></textarea>
        <div class="error-message">
        <?php
        $iscomment = true;
        if (isset($_POST["comments"])){// comments validation
            if ($_POST["comments"] == ""){
                echo "Please enter comment.";
                $iscomment = false;
            }
        }
        ?>
        </div>

        <!-- Submit button -->
        <input type="submit" value="Submit Feedback">

        <!-- Error message placeholders -->
        <div id="nameError" class="error-message"></div>
        <div id="ratingError" class="error-message"></div>
    </form>
    <?php
        if (!$isnamed or !$israted or !$iscomment){
            exit();
        } 
        // insert to db table.
        if (isset($_POST['name']) and isset($_POST['rating']) and isset($_POST['comments'])){
            $server_name = "ulsq0qqx999wqz84.chr7pe7iynqr.eu-west-1.rds.amazonaws.com"; $username = "xe2ge1qqbdrgxdx6";
            $password = "inio92922tfakvh4"; $dbname = "seklrqnnhsqij64j";
            $conn = mysqli_connect($server_name, $username, $password, $dbname);
            $product = 0; $service = 0;
            if (isset($_POST['likes1'])){
                $product = 1;
            }
            if (isset($_POST['likes2'])){
                $service = 1;
            }
            if (!$conn) {
              die("Connection failed: ". 
                  mysqli_connect_error());
            }
            $sql = "insert into feedback (name, rate, product, service, message) values (\"{$_POST['name']}\", \"{$_POST['rating']}\" , {$product}, {$service}, \"{$_POST['comments']}\")";
            $result = mysqli_query($conn, $sql);
        }
    ?>
    <script>
        function validateForm() {
            // Reset previous error messages
            document.getElementById('nameError').innerText = '';
            document.getElementById('ratingError').innerText = '';

            // Get form values
            var name = document.getElementById('name').value;
            var rating = document.querySelector('input[name="rating"]:checked');

            // Validate Name (non-empty)
            if (name.trim() === '') {
                document.getElementById('nameError').innerText = 'Name is required.';
                return;
            }

            // Validate Rating (at least one option selected)
            if (!rating) {
                document.getElementById('ratingError').innerText = 'Please select a rating.';
                return;
            }

            // If all validations pass, you can proceed with form submission or other actions
            alert('Form submitted successfully!');
        }
    </script>

</body>
</html>
