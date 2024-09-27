<?php 
include('../includes/header.php'); 
include('../includes/db.php'); 
?>

<div class="container">
    <h2>Customer List</h2>
    
    <!-- Search Form -->
    <form method="GET" action="" class="form-inline float-right mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>District</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Build the query with search filters
            $sql = "SELECT c.id, c.title, c.first_name, c.last_name, c.contact_no, d.district 
                    FROM customer c 
                    JOIN district d ON c.district = d.id 
                    WHERE 1=1";

            if (isset($_GET['search']) && $_GET['search'] != '') {
                $search = $conn->real_escape_string($_GET['search']);
                $sql .= " AND (c.first_name LIKE '%$search%' 
                            OR c.last_name LIKE '%$search%' 
                            OR c.contact_no LIKE '%$search%' 
                            OR d.district LIKE '%$search%')";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['contact_no']}</td>
                            <td>{$row['district']}</td>
                            <td>
                                <a href='customer_edit.php?id={$row['id']}' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a>
                                <a href='customer_delete.php?id={$row['id']}' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No customer found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Button to redirect to the customer registration form -->
    <a href="customer_form.php" class="btn btn-success">Add New Customer</a>
</div><br>

<?php include('../includes/footer.php'); ?>
