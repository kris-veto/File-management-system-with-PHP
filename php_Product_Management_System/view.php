<?php
session_start();
include './inc/header.php';
require './inc/database.php';

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
    </br>
    <form id="search-form" onsubmit="return false;">
        <input type="text" id="search" placeholder="Search product here...">
    </form>
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
              
          echo"</tr>";
          }}
          else{
              echo"<tr> <td colsapn='3'>No subscription found</td></tr>";
          }
          ?>
      </tbody>
      </table>
      
</body>
</html>
<?php
include './inc/footer.php';
?>

