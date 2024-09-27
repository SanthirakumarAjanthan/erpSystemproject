<?php
include('../includes/header.php'); 
include('../includes/db.php'); 

$id = $_GET['id'];  // Get item ID from URL
$sql = "SELECT * FROM item WHERE id=$id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();
?>

<div class="container">
    <h2>Edit Item</h2>
    <form action="item_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <div class="mb-3">
            <label for="item_code">Item Code</label>
            <input type="text" name="item_code" class="form-control" value="<?php echo $item['item_code']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" value="<?php echo $item['item_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="item_category">Item Category</label>
            <select name="item_category" class="form-control" required>
                <?php
                // Fetch categories from the database
                $categories = mysqli_query($conn, "SELECT * FROM item_category");
                while ($category = mysqli_fetch_assoc($categories)) {
                    $selected = ($category['id'] == $item['item_category']) ? 'selected' : '';
                    echo "<option value='{$category['id']}' $selected>{$category['category']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="item_subcategory">Item Sub Category</label>
            <select name="item_subcategory" class="form-control" required>
                <?php
                // Fetch subcategories from the database
                $subcategories = mysqli_query($conn, "SELECT * FROM item_subcategory");
                while ($subcategory = mysqli_fetch_assoc($subcategories)) {
                    $selected = ($subcategory['id'] == $item['item_subcategory']) ? 'selected' : '';
                    echo "<option value='{$subcategory['id']}' $selected>{$subcategory['sub_category']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="<?php echo $item['quantity']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="unit_price">Unit Price</label>
            <input type="text" name="unit_price" class="form-control" value="<?php echo $item['unit_price']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div><br>

<?php include('../includes/footer.php'); ?>
