<?php 
include('../includes/header.php'); 
include('../includes/db.php'); 
?>

<div class="container form-container">
    <h2>Register Item</h2>
    <form action="item_insert.php" method="POST">
        <div class="mb-3">
            <label for="item_code">Item Code</label>
            <input type="text" name="item_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="item_category">Item Category</label>
            <select name="item_category" class="form-control" required>
                <?php
                // Fetch categories from the database
                $categories = mysqli_query($conn, "SELECT * FROM item_category");
                while ($category = mysqli_fetch_assoc($categories)) {
                    echo "<option value='{$category['id']}'>{$category['category']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="item_sub_category">Item Sub Category</label>
            <select name="item_subcategory" class="form-control" required>
                <?php
                // Fetch subcategories from the database
                $subcategories = mysqli_query($conn, "SELECT * FROM item_subcategory");
                while ($subcategory = mysqli_fetch_assoc($subcategories)) {
                    echo "<option value='{$subcategory['id']}'>{$subcategory['sub_category']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="unit_price">Unit Price</label>
            <input type="text" name="unit_price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register Item</button>
    </form>
</div><br>

<?php include('../includes/footer.php'); ?>
