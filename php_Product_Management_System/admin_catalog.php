<?php
session_start();

if(!isset($_SESSION['loggedin'])||($_SESSION['loggedin'])!==true){
  header("Location:login.php");
  exit;
}

include './inc/header.php';
require './inc/database.php';
//////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_SERVER["REQUEST_METHOD"]=="POST" ){
    
  if(isset($_POST["add"])) ////////////////////////////  adding  /////////////////////////////////////////
  {
    $ProductName=$_POST["Product_name"];
    if (empty($ProductName)) {                                    
      echo "Error: Product Name is required.";
      exit(); // Exit the script to prevent further execution
    }
    $Price=$_POST["Price"];
    $Qty=$_POST["Quantity"];
    $Description=$_POST["Description"];

    $countfiles= count($_FILES['files']['name']);  

    $query = "INSERT INTO product_info(Product_name, Price, Quantity, Description,name, image)
    VALUES (?,?,?,?,?,?)";
    $statement = $conn->prepare($query);
  
  //loop all the files 
    for ($i=0; $i< $countfiles; $i++) {
      $filename= $_FILES['files']['name'][$i];
      if (empty($filename)) {                                    
        echo "Error: image file is required.";
        exit(); // Exit the script to prevent further execution
      }
      //location
      $target_file='./uploads/'.$filename;
      $file_extension= pathinfo($target_file, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      //VALID  image extension
      $valid_extension = array("png","jpeg","jpg","gif");
      if(in_array($file_extension,$valid_extension)){
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){
          //execute query
          $statement->bind_param("ssssss", $ProductName, $Price, $Qty, $Description, $filename, $target_file);
          $statement->execute();
        }
      }
    }
    echo "Uploaded successfully";
    ?>
    <button class="btn"><a href="view.php">View Catalog</a></button>
    <?php
    exit();
  }
  else if(isset($_POST["edit"]))  ////////////////////////////  edit  /////////////////////////////////////////
  {
    $id=$_POST["id"];
    $ProductName=$_POST["Product_name"];
          if (strpos($ProductName, ' ') !== false) {   //Validation of ProductName
            $ProductName = str_replace(' ', '', $ProductName); // Remove spaces
          }
    $Price=$_POST["Price"];   
    $Qty=$_POST["Quantity"];
    $Description=$_POST["Description"];
          if (strpos($Description, ' ') !== false) {   //Validation of Description
            $Description = str_replace(' ', '', $Description); // Remove spaces
          }
    
    // $name=$_POST["name"];  //
    // $image=$_POST["image"];    ///
         
      $query = "update product_info set Product_name='$ProductName', Price='$Price', Quantity='$Qty', Description='$Description'where id='$id'";

      $conn->query($query);





      $query = "INSERT INTO product_info(Product_name, Price, Quantity, Description,name, image)
    VALUES (?,?,?,?,?,?)";
    $statement = $conn->prepare($query);
  }
  else if(isset($_POST["delete"]))  ////////////////////////////  delete  /////////////////////////////////////////
  {
    
      $id = $_POST["id"];
      $sql = "delete from product_info where id='$id'";
      $conn->query($sql);
  }
}


//////////////////////////////////////////// html  ////////////////////////////////////////////////////////
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>view</title>
  
  <script>
        function confirmDelete(id) {
            return confirm("Are you sure you want to delete this record with id " + id + "?");
        }
  </script>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  .img-fluid{
    width: 10vw;
    height:auto;
  }
  table{
    margin-top: 2%;
    scale: 0.8;
  }
  h2{
    margin-top: 2%;
    text-align:center;
  } 
</style>
</head>
<body>
<h2>Product Catalog</h2>
<div class="bootstrap-container">
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class= table-primary>
                            <th>Product Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>image</th>
                            <th>action</th>  
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //display data
                    $sql="select* from product_info";
                    $result=$conn->query($sql);
                    
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["Product_name"]."</td>";
                        echo "<td>$".$row["Price"]."</td>";
                        echo "<td>".$row["Quantity"]."</td>";
                        echo "<td>".$row["Description"]."</td>";
                        
                        echo "<td><img src='".$row['image']."' title='".$row['Product_name']."' class='img-fluid'></td>";
                        
                        echo "<td>
                        <form method='POST'>
                        <input type='hidden' name='id' value=' ".$row["id"]."'>
                        <input type='text' name='Product_name' value=' ".$row["Product_name"]."'>
                        <input type='int' name='Price' value=' ".$row["Price"]."'>
                        <input type='int' name='Quantity' value=' ".$row["Quantity"]."'>
                        <input type='text' name='Description' value=' ".$row["Description"]."'>
                        
                        
                        
                        <button type='submit' name='edit' class='ebtn'>Edit</button>
                        <button type='submit' name='delete' class='dbtn' onclick='return confirmDelete(".$row["id"].")'>Delete</button>
                    </form>
                    </td>";
                    echo"</tr>";
                    }}
                    else{
                        echo"<tr> <td colsapn='3'>No subscription found</td></tr>";

                    }
                    ?>
                </tbody>
            
            
                </table>
            </div>
         </div>
    </div>
</body>
</html>

