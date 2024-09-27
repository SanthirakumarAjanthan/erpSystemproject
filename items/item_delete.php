<?php
include('../includes/db.php');

$id = $_GET['id'];  // Get item ID from URL

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'delete_item.php?id=$id&confirm=yes';
            } else {
                window.location.href = 'item_list.php';
            }
        });
    });
</script>
";

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Delete query
    $sql = "DELETE FROM item WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
            Swal.fire(
                'Deleted!',
                'Item has been deleted.',
                'success'
            ).then(() => {
                window.location.href = 'item_list.php';
            });
        </script>
        ";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
