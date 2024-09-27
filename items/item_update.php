<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_sub_category = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    // Update query
    $sql = "UPDATE item SET item_code='$item_code', item_name='$item_name', item_category='$item_category', item_subcategory='$item_sub_category', 
            quantity='$quantity', unit_price='$unit_price' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully!";
        header('Location: item_list.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
?>
