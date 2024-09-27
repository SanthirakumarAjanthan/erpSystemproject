<?php 
include('../includes/header.php'); 
include('../includes/db.php'); 
?>

<div class="container">
    <h2>Invoice Item Report</h2>
    <form method="POST" action="invoice_item_report.php">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>&nbsp;</label><br>
                <button type="submit" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // SQL Query to fetch invoice item within the selected date range
        $sql = "SELECT invoice.id as invoice_id, invoice.date, customer.first_name, customer.last_name, 
                item.item_name, item.item_code, item.item_category, invoice_master.unit_price, invoice_master.invoice_no
                FROM invoice_master
                INNER JOIN invoice ON invoice_master.invoice_no = invoice.invoice_no
                INNER JOIN customer ON invoice.customer = customer.id
                INNER JOIN item ON invoice_master.item_id = item.id
                WHERE date BETWEEN '$start_date' AND '$end_date'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped mt-4'>
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Item Name</th>
                            <th>Item Code</th>
                            <th>Item Category</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['invoice_id']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['first_name']} {$row['last_name']}</td>
                        <td>{$row['item_name']}</td>
                        <td>{$row['item_code']}</td>
                        <td>{$row['item_category']}</td>
                        <td>{$row['unit_price']}</td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No invoice item found for the selected date range.</p>";
        }
    }
    ?>
</div><br><br><br>

<?php include('../includes/footer.php'); ?>
