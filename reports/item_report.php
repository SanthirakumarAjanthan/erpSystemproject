<?php 
include('../includes/header.php'); 
include('../includes/db.php'); 
?>

<div class="container">
    <h2>Item Report</h2>

    <?php
    // SQL Query to fetch items
    $sql = "SELECT DISTINCT item_name, item_category, item_subcategory, SUM(quantity) as total_quantity
            FROM item
            GROUP BY item_name, item_category, item_subcategory";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped mt-4'>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Sub Category</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['item_name']}</td>
                    <td>{$row['item_category']}</td>
                    <td>{$row['item_subcategory']}</td>
                    <td>{$row['total_quantity']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No items found.</p>";
    }
    ?>

</div><br><br><br>

<?php include('../includes/footer.php'); ?>
