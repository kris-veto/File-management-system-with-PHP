<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style-header-n-footer.css" type="text/css">
    <!-- hamburger Icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
</head>
<body>
    <header>
        <figure>
            <a href="login.html"><img src="./img/logo.png" alt="Logo"></a>
        </figure>
        <button class="hamburger-menu hamburger-hidden" type="button">
            <span
                class="material-symbols-outlined">
                menu
            </span>
        </button>
        <nav>
            <ul>
                <li class="menu"><a href="dashboard.php">DASHBOARD</a></li>
                <li class="menu"><a href="view.php">VIEW CATALOG</a> </li>
                <li class="menu"><a href="admin_catalog.php">ADMIN CATALOG</a></li>  
            </ul>         
        </nav>
        <div>
            <?php if (isset($_SESSION['username'])): ?>
                <!-- If the user is logged in, show "Logout" button -->
                <button class="btn"><a href="logout.php">LOG OUT</a></button>
            <?php else: ?>
                <!-- If the user is not logged in, show "Login" and "Sign Up" buttons -->
                <button class="btn"><a href="login.php">LOGIN</a></button>
                <button class="btn"><a href="register.php">SING UP</a></button>
            <?php endif; ?>
           
        </div>
    </header>
    <script src="js/script.js"></script>
</body>
</html>
