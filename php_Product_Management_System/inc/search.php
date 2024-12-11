<?php
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Sanitize input
    
    $server = getenv('DB_HOST');
    $username = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');
    $database = getenv('DB_NAME');
        
    $conn = new mysqli($server,$username,$password,$database); 
   
    // $conn = new mysqli('localhost','root','','php_final_p'); 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM product_info WHERE Product_name LIKE ? OR Description LIKE ? OR CAST(id AS CHAR) LIKE ?";
    
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    $searchTerm = "%{$query}%";
    $stmt->bind_param('sss', $searchTerm,$searchTerm,$searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
?>
    
    <table class="table">
        <thead>
            <tr class= "table-primary"> <!--add light blue color to the row -->
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
            echo"<tr> <td colsapn='3'>Product no found</td></tr>";

        }

    $stmt->close();
    $conn->close();
}
?>

