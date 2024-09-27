<?php 
include('../includes/header.php'); 
include('../includes/db.php'); 
?>

<div class="container">
    <h2>Invoice Report</h2>
    <form method="POST" action="invoice_report.php">
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
                <label> </label><br>
                <button type="submit" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // SQL Query to fetch invoice within the selected date range
        $sql = "SELECT invoice.id, invoice.invoice_no, invoice.date, customer.first_name, customer.last_name, 
                district.district as district_name, COUNT(invoice_master.item_id) as item_count, 
                SUM(invoice_master.quantity * invoice_master.unit_price) as total_amount
                FROM invoice
                INNER JOIN customer ON invoice.customer = customer.id
                INNER JOIN invoice_master ON invoice.invoice_no = invoice_master.invoice_no
                INNER JOIN district ON customer.district = district.id
                WHERE invoice.date BETWEEN '$start_date' AND '$end_date'
                GROUP BY invoice.invoice_no";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped mt-4'>
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>District</th>
                            <th>Item Count</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['first_name']} {$row['last_name']}</td>
                        <td>{$row['district_name']}</td>
                        <td>{$row['item_count']}</td>
                        <td>{$row['total_amount']}</td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No invoice found for the selected date range.</p>";
        }
    }
    ?>
</div><br><br><br>

<?php include('../includes/footer.php'); ?>
