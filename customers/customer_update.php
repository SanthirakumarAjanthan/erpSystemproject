<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

    // Update query
    $sql = "UPDATE customer SET title='$title', first_name='$first_name', last_name='$last_name', contact_no='$contact_no', district='$district' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully!";
        header('Location: customer_list.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
?>
