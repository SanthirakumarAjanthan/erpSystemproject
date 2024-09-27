<?php
include('../includes/header.php'); 
include('../includes/db.php'); 

// Fetch districts from the database
$sql = "SELECT * FROM district";
$result = $conn->query($sql);
?>

<div class="container">
    <h2>Register Customer</h2>
    <form action="customer_insert.php" method="POST">
        <div class="mb-3">
            <label for="title">Title</label>
            <select name="title" class="form-select">
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contact_no">Contact Number</label>
            <input type="text" name="contact_no" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="district">District</label>
            <select name="district" class="form-select" required>
                <?php while($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['district']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Register Customer</button>
    </form>
</div><br>

<?php include('../includes/footer.php'); ?>
