<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $country = $_POST["country"];
        $gender = $_POST["gender"];

        
        $error = false;
        $error_msg = "";

        
        if (empty($username) || strlen($username) < 4) {
            $error = true;
            $error_msg .= "Username is required and must be at least 4 characters long.<br>";
        }

        
        if (empty($password) || !preg_match("/^[a-zA-Z].*#$/", $password)) {
            $error = true;
            $error_msg .= "Password is required and must start with a letter and end with #.<br>";
        }

        
        if (empty($country)) {
            $error = true;
            $error_msg .= "Country is required.<br>";
        }

        
        if (empty($gender)) {
            $error = true;
            $error_msg .= "Gender is required.<br>";
        }

        
        if ($error) {
            echo "<div style='color: red;'>".$error_msg."</div>";
        } else {
            
            echo "submitted !";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required><br>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <br>

        <label for="country">Country</label>
        <select name="country" id="country" required>
            <option value="">Select country</option>
            <option value="Nepal">Nepal</option>
            </select>
            <br>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="M" required> Male
        <input type="radio" name="gender" value="F" required> Female<br>
        <br>
        <input type="submit" style="background-color: lightblue;" value="Submit">
    </form>
</body>
</html>
