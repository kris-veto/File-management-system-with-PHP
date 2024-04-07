<?php 
include './inc/header.php';
require './inc/database.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
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

        <div class="content content-left">
            <h1>Product Catalog System</h1><br><br>
            <h2>Login</h2><br>
            <form class="form1" action="authenticate.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                
                <div>
                    <input type="checkbox" id="Remember" name="Remember"/>
                    <label for="Remember">Remember me</label>
                </div><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </section>
</body>
</html>
<?php
include './inc/footer.php';
?>