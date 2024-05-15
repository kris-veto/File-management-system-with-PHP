
<?php

$server="localhost";
$username="root";
$password="";
$database="php_final_p";

$conn= new mysqli($server,$username,$password,$database);

//checking connection
if($conn->connect_error)
{
    die("Connection failed". $conn->connect_error);
}
else{
    $message = "connected successfullyy";
    
    //echo "connected successfullye";
}
?>