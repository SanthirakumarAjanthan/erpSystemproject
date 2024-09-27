<?php 
include('../includes/header.php'); 
include('../includes/db.php'); 
?>

<div class="container">
    <h2>Item List</h2>
    
    <form method="GET" action="">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search items...">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Item Category</th>
                <th>Item Sub Category</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            $sql = "SELECT item.id, item.item_code, item.item_name, item.quantity, item.unit_price, 
                           item_category.category AS category_name, item_subcategory.sub_category AS sub_category_name
                    FROM item
                    JOIN item_category ON item.item_category = item_category.id
                    JOIN item_subcategory ON item.item_subcategory = item_subcategory.id
                    WHERE item.item_name LIKE '%$search%' OR item.item_code LIKE '%$search%' 
                    OR item_category.category LIKE '%$search%' OR item_subcategory.sub_category LIKE '%$search%'";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['item_code']}</td>
                            <td>{$row['item_name']}</td>
                            <td>{$row['category_name']}</td>
                            <td>{$row['sub_category_name']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['unit_price']}</td>
                            <td>
                                <a href='item_edit.php?id={$row['id']}' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a>
                                <a href='item_delete.php?id={$row['id']}' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No item found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="item_form.php" class="btn btn-success">Add New Item</a>
</div><br>

<?php include('../includes/footer.php'); ?>
