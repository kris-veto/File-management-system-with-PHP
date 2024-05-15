<?php

include './inc/header.php';
require './inc/database.php'; 

$password_conf_error_message = isset($_GET['password_confirmation_error']) ? $_GET['password_confirmation_error'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
        if (empty($username)) {                                    
            echo "Error: Name is required.";
            exit(); // Exit the script to prevent further execution
        }
        
        if (!preg_match('/^[a-zA-Z]+ [a-zA-Z]+$/', $username)) {       //Validation of name   [a-zA-Z]+
            echo "Error: Invalid characters in Name. User name should contain two words(name and lastname) with only alphabet characters";
            exit(); // Exit the script to prevent further execution
        }
    $birthdate = $_POST['birthdate'];
        if (empty($birthdate)) {                                    
            echo "Error: birthdate is required.";
            exit(); // Exit the script to prevent further execution
        }
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
            echo "Error: Invalid format for Birthdate. Please use YYYY-MM-DD format.";
            exit();
        }
    $email = $_POST['email'];
        if (empty($email)) {                                    
            echo "Error: E-mail is required.";
            exit(); // Exit the script to prevent further execution
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid email address.";
            exit();
        }
    $password = $_POST['password'];
        if (strpos($password, ' ') !== false) {   //Validation of password
            $password = str_replace(' ', '', $password); // Remove spaces
        }
        if (empty($password)) {                                    
            echo "Error: password is required.";
            exit(); // Exit the script to prevent further execution
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{6,}$/', $password)) {
            echo "Error: Invalid password. Password must be at least 6 alphanumeric characters long including one capital letter, one lowcase letter and at least one digit.";
            exit();
        }
    $password2 = $_POST['password2'];

    //confirmation password
        if($password != $password2) {
            $password_conf_error_message = "Passwords do not match";
            header("Location: register.php?password_confirmation_error=". urlencode($password_conf_error_message));
        }else{
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Insert the user into the database
    $stmt = $conn->prepare(
        "INSERT INTO r_users (
            username, birthdate, email, password
            ) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $birthdate, $email, $hashed_password); /*$hashed_password*/
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit;
    } else {
        // Error occurred, handle appropriately
        echo "errorr" . $conn->error;
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
    <div class="content-right">
                <div class="wrap-text">
                    <Span>
                    "Technology at your service"
                    </span>
                </div>
    </div>
    <div class="content-left">
        <h2>Register</h2>
        <form  class="form2 form1" action="register.php" method="post">
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="birthdate">Birthdate:</label>
            <input type="text" id="birthdate" name="birthdate" placeholder="YYYY-MM-DD"><br><br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"><br><br>

            <label for="password">Password:</label>
            <?php if (!empty($password_conf_error_message)): ?> <!-- Si se ha asignado algun valor a la variable $password_error, se print su valor in this case"incorrect password"  -->
                        <p style="color: red;"><?php echo$password_conf_error_message; ?></p>
                    <?php endif; ?>
            <input type="password" id="password" name="password"><br><br>

            <label for="password2">Password (Confirmation):</label>
            <input type="password" id="password2" name="password2"><br><br>
            
            <input type="submit" value="submit">
        </form>
    </div>
    </section>
</body>
</html>
<?php
include './inc/footer.php';
?>