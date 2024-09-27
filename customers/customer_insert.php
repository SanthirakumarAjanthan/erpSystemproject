<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

    // Insert query
    $sql = "INSERT INTO customer (title, first_name, last_name, contact_no, district) 
            VALUES ('$title', '$first_name', '$last_name', '$contact_no', '$district')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully!";
        header('Location: customer_list.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
