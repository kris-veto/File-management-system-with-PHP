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
    $Price=$_POST["Price"];   
    $Qty=$_POST["Quantity"];
    $Description=$_POST["Description"];
    
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
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<h2>Product Catalog</h2>
  <!-- IPORTANT!!! IMPLEMENT ANOTHER SEARCH SCRIPT FOR CTHE RUD SECTION FOCUSED ON ID-->     
      <!-- <form id="search-form" onsubmit="return false;">
        <input type="text" id="" placeholder="Search here">
      </form> -->

      <div id="results"></div>
      <table class="table">
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
              echo "<td data-title=\"ID: \">".$row["id"]."</td>";
              echo "<td data-title=\"Name: \">".$row["Product_name"]."</td>";
              echo "<td data-title=\"Price: \">$".$row["Price"]."</td>";
              echo "<td data-title=\"Quantity: \">".$row["Quantity"]."</td>";
              echo "<td data-title=\"Desc:     \">".$row["Description"]."</td>";
              
              echo "<td><img src='".$row['image']."' title='".$row['Product_name']."' class='img-fluid'></td>";
              
                // effective when editing product
              echo "<td>
              <form method='POST'> 
              <input type='hidden' name='id' value='".$row["id"]."'>
              <input type='text' name='Product_name' value='".$row["Product_name"]."'>
              <input type='int' name='Price' value='".$row["Price"]."'>
              <input type='int' name='Quantity' value='".$row["Quantity"]."'>
              <input type='text' name='Description' value='".$row["Description"]."'>
              
              
              
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
  <script src="js/script.js"></script>
</body>
</html>
<?php
include './inc/footer.php';
?>

