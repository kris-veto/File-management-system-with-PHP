<?php

session_start();
require './inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  //query to fetch user from the database

  $stmt=$conn->prepare("select * from r_users where username=?");
  $stmt->bind_param("s",$username);
  $stmt->execute();
  $result=$stmt->get_result();

  if($result->num_rows ==1)
  {
    $row= $result->fetch_assoc();
    if(password_verify($password,$row['password'])){
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;
          header("Location:dashboard.php");
          exit;
      }else{
        $error_message = "incorrect password";
        header("Location: login.php?error=" . urlencode($error_message));
        exit;
      }
  }else{
    $error_message = "User no found";
    header("Location: login.php?error=" . urlencode($error_message));
    exit;
  }
}else{
 header("Location:login.php");
 exit;
}

?>