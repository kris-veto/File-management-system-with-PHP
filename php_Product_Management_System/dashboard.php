<?php
session_start();
if(!isset($_SESSION['loggedin'])||($_SESSION['loggedin'])!==true){
  header("Location:login.php");
  exit;
}

include './inc/header.php';
require './inc/database.php';


///////////////////////////////////////////   html   /////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content-left">
    
        <h2>Upload Product Information</h2>
        <form  class="form2 form1" method='post' action='admin_catalog.php' enctype='multipart/form-data'>
            <label for="Product_name">Product Name:</label>
            <input type="text" id="Product_name" name="Product_name"><br>
            
            <label for="Price">Price:</label>
            <input type="decimal" id="Price" name="Price"><br>

            <label for="Quantity">Quantity:</label>
            <input type="Integer" id="Quantity" name="Quantity"><br>

            <label for="Description">Description:</label>
            <input type="Text" id="Description" name="Description"><br>

            <p><input type='file' name='files[]' multiple /></p><br><br><br>

            <input type="submit" value="submit" name='add'>
        </form>
    
</div>
</body>
</html>
<?php
include './inc/footer.php';
?>

