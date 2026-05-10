<?php
$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}
$sql = "SELECT * FROM donor";

if(isset($_GET["search"]) && !empty($_GET["search"])){
    $search_term = $_GET["search"];

    $sql .= " WHERE 
                id LIKE '%$search_term%' OR
                name LIKE '%$search_term%' OR
                email LIKE '%$search_term%' OR
                phone LIKE '%$search_term%' OR
                total_donation LIKE '%$search_term%' OR
                last_donation LIKE '%$search_term%'";
}

$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NGO Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/NGOsystem/asset/css/admin.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>


<div class="container-fluid">
<div class="row">
<!-- Sidebar -->
<div class="col-md-2 sidebar sticky-top p-3">

<h4 class="text-center"><a href="/NGOsystem/admin_dashboard/admin.dashboard.php">NGO Admin</h4><hr>

<a href="/NGOsystem/NGO page/ngo_page.php">NGO Page</a>
<a href="/NGOsystem/admin_dashboard/members.php">Members</a>
<a href="/NGOsystem/admin_dashboard/donor.php">Donors</a>
<a href="/NGOsystem/admin_dashboard/beneficiary.php">Beneficiaries</a>
<a href="/NGOsystem/admin_dashboard/project.php">Projects</a>
<a href="/NGOsystem/admin_dashboard/distribution.php">Distribution</a>
<a href="/NGOsystem/admin_dashboard/volunteer.php">Volunteers</a>
<a href="/NGOsystem/admin_dashboard/report.php">Reports</a>

</div>

<div class="col-md-10 p-3">
    
<div class="card p-3">

<div class="d-flex justify-content-between mb-3">
<h4>Donors</h4>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Donor</button>
</div>

<form action="" method="get">
<input type="text" class="form-control mb-3" name="search" placeholder="Search here...">
</form>

<table class="table table-bordered table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Total Donation</th>
<th>Last Donation</th>
<th>Action</th>
</tr>
</thead>

<tbody>
    
<?php while($row = $result->fetch_assoc()){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['total_donation']; ?></td>
<td><?php echo $row['last_donation']; ?></td>


<td>
    <div class="d-flex gap-2 flex-nowrap">
<button class="btn btn-sm btn-secondary"
data-bs-toggle="modal"
data-bs-target="#editModal<?php echo $row['id']; ?>">
Edit
</button>

<button class="btn btn-sm btn-danger"
data-bs-toggle="modal"
data-bs-target="#deleteModal<?php echo $row['id']; ?>">
Delete
</button>

<button class="btn btn-sm btn-info"
        data-bs-toggle="modal"
        data-bs-target="#detailsModal<?php echo $row['id']; ?>">
    Details
</button>
<!-- Button -->
<button class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#invoiceModal<?php echo $row['id']; ?>">
    Invoice
</button>

<!-- Modal -->
<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal<?php echo $row['id']; ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Donor Invoice</h5>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

<div id="invoice-<?php echo $row['id']; ?>">

    <div class="text-center mb-4">
        <h2>NGO Donation Invoice</h2>
        <p>Helping Humanity Together</p>
    </div>

    <hr>

    <div class="row mb-3">
        <div class="col-md-6">
            <p><strong>Invoice No:</strong>
                INV-<?php echo $row['id']; ?>
            </p>

            <p><strong>Date:</strong>
                <?php echo date("Y-m-d"); ?>
            </p>
        </div>

    </div>

    <h5>Donor Information</h5>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td><?php echo $row['name']; ?></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><?php echo $row['phone']; ?></td>
        </tr>

        <tr>
            <th>Total Donation</th>
            <td>
                ৳<?php echo $row['total_donation']; ?>
            </td>
        </tr>

        <tr>
            <th>Last Donation</th>
            <td>
                ৳<?php echo $row['last_donation']; ?>
            </td>
        </tr>
    </table>

    <h5 class="mt-4">Donation History</h5>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">

        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>Transaction ID</th>
            <th>Note</th>
        </tr>

        </thead>

        <tbody>

<?php

$donor_id = $row['id'];

$history_sql = "
SELECT * 
FROM donor_transactions
WHERE donor_id = '$donor_id'
ORDER BY donation_date DESC
";

$history_result = $conn->query($history_sql);

$count = 1;

while($history = $history_result->fetch_assoc()){

?>

<tr>

<td><?php echo $count++; ?></td>

<td>
<?php echo $history['donation_date']; ?>
</td>

<td>
৳<?php echo $history['donation_amount']; ?>
</td>

<td>
<?php echo $history['payment_method']; ?>
</td>

<td>
<?php echo $history['trx_number']; ?>
</td>

<td>
<?php echo $history['note']; ?>
</td>

</tr>

<?php } ?>

        </tbody>
    </table>

</div>

            </div>

            <div class="row mt-5">

    <div class="col-6 text-center">
        <br><br><br>
        ___________________________

        <p>
            Donor Signature
        </p>
    </div>

    <div class="col-6 text-center">
        <br><br><br>
        ___________________________

        <p>
            Authorized Signature
        </p>

        <h6>NGO Authority</h6>
    </div>

</div>

            <div class="modal-footer">

<button class="btn btn-primary"
        onclick="printInvoice('invoice-<?php echo $row['id']; ?>')">

    Print Invoice

</button>

            </div>

        </div>
    </div>
</div>



</div>
</td>
</tr>

<!-- inside loop -->
 <!-- Audit modal -->
 <div class="modal fade"
     id="detailsModal<?php echo $row['id']; ?>">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Audit Details</h5>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <p><strong>Created At:</strong>
                   <?php echo $row['created_at']; ?>
                </p>

                <p><strong>Updated At:</strong>
                   <?php echo $row['updated_at']; ?>
                </p>

                <p><strong>Updated By:</strong>
                   <?php echo $row['updated_by']; ?>
                </p>

                <p><strong>Deleted At:</strong>
                   <?php echo $row['deleted_at']; ?>
                </p>

                <p><strong>Deleted By:</strong>
                   <?php echo $row['deleted_by']; ?>
                </p>

            </div>

        </div>
    </div>

</div>
<!-- Audit modal -->
 
 <!-- EDIT MODAL -->
<div class="modal fade" id="editModal<?php echo $row['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="/NGOsystem/admin_dashboard/config.donor/update_donor.php">

<div class="modal-header">
<h5>Edit Donor</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input name="name" value="<?php echo $row['name']; ?>" class="form-control mb-2">
<input name="email" value="<?php echo $row['email']; ?>" class="form-control mb-2">
<input name="phone" value="<?php echo $row['phone']; ?>" class="form-control mb-2">
<input name="total_donation" value="<?php echo $row['total_donation']; ?>" class="form-control mb-2">
<input name="last_donation" value="<?php echo $row['last_donation']; ?>" class="form-control mb-2">

</div>

<div class="modal-footer">
<button class="btn btn-success">Update</button>
</div>

</form>

</div>
</div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal<?php echo $row['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="/NGOsystem/admin_dashboard/config.donor/delete_donor.php">

<div class="modal-header">
<h5>Delete Donor</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<p>Are you sure you want to delete this donor?</p>

</div>

<div class="modal-footer">
<button class="btn btn-danger">Delete</button>
</div>

</form>

</div>
</div>
</div>



<?php } ?>




</tbody>

</table>


<!-- ADD MODAL -->
<div class="modal fade" id="addModal">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="/NGOsystem/admin_dashboard/config.donor/insert_donor.php">

<div class="modal-header">
<h5>Add Donor</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input name="name" placeholder="Name" class="form-control mb-2" required>
<input name="email" placeholder="Email" class="form-control mb-2" required>
<input name="phone" placeholder="Phone" class="form-control mb-2" required>
<input name="total_donation" placeholder="total_donation" class="form-control mb-2" required>
<input name="last_donation" placeholder="last_donation" class="form-control mb-2" required>

</div>

<div class="modal-footer">
<button class="btn btn-primary">Add</button>
</div>

</form>

</div>
</div>
</div>
<!-- add modal end -->

</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

function printInvoice(id){

    var content = document.getElementById(id).innerHTML;

    var myWindow = window.open('', '', 'width=900,height=700');

    myWindow.document.write(`
        <html>
        <head>
            <title>Print Invoice</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        </head>

        <body class="p-4">
            ${content}
        </body>

        </html>
    `);

    myWindow.document.close();

    myWindow.print();
}

</script>
</body>
</html>