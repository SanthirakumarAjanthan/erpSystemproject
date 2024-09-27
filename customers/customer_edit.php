<?php
include('../includes/header.php'); 
include('../includes/db.php'); 

$id = $_GET['id'];  // Get customer ID from URL

// Fetch the customer data
$sql = "SELECT * FROM customer WHERE id=$id";
$result = $conn->query($sql);
$customer = $result->fetch_assoc();

// Fetch the list of districts from the database
$sql_districts = "SELECT * FROM district";
$result_districts = $conn->query($sql_districts);
?>

<div class="container">
    <h2>Edit Customer</h2>
    <form action="customer_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
        
        <div class="mb-3">
            <label for="title">Title</label>
            <select name="title" class="form-select">
                <option value="Mr" <?php if ($customer['title'] == 'Mr') echo 'selected'; ?>>Mr</option>
                <option value="Mrs" <?php if ($customer['title'] == 'Mrs') echo 'selected'; ?>>Mrs</option>
                <option value="Miss" <?php if ($customer['title'] == 'Miss') echo 'selected'; ?>>Miss</option>
                <option value="Dr" <?php if ($customer['title'] == 'Dr') echo 'selected'; ?>>Dr</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo $customer['first_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="<?php echo $customer['last_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="contact_no">Contact Number</label>
            <input type="text" name="contact_no" class="form-control" value="<?php echo $customer['contact_no']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="district">District</label>
            <select name="district" class="form-select" required>
                <?php while($row = $result_districts->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $customer['district']) echo 'selected'; ?>>
                        <?php echo $row['district']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div><br>

<?php include('../includes/footer.php'); ?> 
