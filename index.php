<?php include('includes/header.php'); ?>

<div class="container">
    <h1 class="animate__animated animate__fadeIn">Welcome to ERP System Dashboard</h1>

    <!-- Image Slider -->
    <div id="coverCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="uploads/image1.jpg" class="d-block w-100" alt="Image 1" width="3000" height="500">
        </div>
        <div class="carousel-item">
            <img src="uploads/image2.jpg" class="d-block w-100" alt="Image 2" width="3000" height="500">
        </div>
        <div class="carousel-item">
            <img src="uploads/image3.jpg" class="d-block w-100" alt="Image 3" width="3000" height="500">
        </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#coverCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#coverCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Buttons -->
    <div class="row mt-4">
        <div class="col-md-2">
            <a href="customers/customer_list.php" class="btn btn-primary btn-block btn-sm">Customers</a>
        </div>
        <div class="col-md-2">
            <a href="items/item_list.php" class="btn btn-success btn-block btn-sm">Items</a>
        </div>
        <div class="col-md-2">
            <a href="reports/invoice_item_report.php" class="btn btn-danger btn-block btn-sm">Invoice Item Report</a>
        </div>
        <div class="col-md-2">
            <a href="reports/invoice_report.php" class="btn btn-warning btn-block btn-sm">Invoice Report</a>
        </div>
        <div class="col-md-2">
            <a href="reports/item_report.php" class="btn btn-info btn-block btn-sm">Item Report</a>
        </div>
    </div>
</div><br><br><br>
<?php include('includes/footer.php'); ?>
