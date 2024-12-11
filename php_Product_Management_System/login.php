<?php 
include './inc/header.php';
require './inc/database.php';

//$error_message = isset($_GET['error']) ? $_GET['error'] : '';
$username_error_message = isset($_GET['username_error']) ? $_GET['username_error'] : '';
$password_error_message = isset($_GET['password_error']) ? $_GET['password_error'] : '';
// if exist "isset()" a GET method in the URL "$_GET[]"  con el parametro "username_error"
// si el Operador ternario (? :) obtiene "True" el valor del parametro 'username_error' sera asignada a la variable $username_error_message

//isset($_GET['username_error']): Esta función verifica si existe un parámetro username_error en la URL. Por ejemplo, si la URL es pagina.php?username_error=Usuario no encontrado, entonces isset($_GET['username_error']) devuelve true.
//$_GET['username_error']: ACCEDE AL VALOR DEL PARAMETRO 'username_error' en la URL. Si está presente, su valor se asigna a la variable $username_error_message.

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
                    <!-- Display error message if set -->
                    <?php if (!empty($username_error_message)): ?>
                        <p style="color: red;"><?php echo$username_error_message; ?></p>
                    <?php endif; ?>
                    <!-- Login form -->
                <input type="text" id="username" name="username"><br>
                
                <label for="password">Password:</label>
                    <!-- Display error message if set -->
                    <?php if (!empty($password_error_message)): ?> <!-- Si se ha asignado algun valor a la variable $password_error, se print su valor in this case"incorrect password"  -->
                        <p style="color: red;"><?php echo$password_error_message; ?></p>
                    <?php endif; ?>
                     <!-- Login form -->
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
