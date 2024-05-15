<?php

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
            </div>
         </div>
    </div>
</body>
</html>
<?php
include './inc/footer.php';
?>

