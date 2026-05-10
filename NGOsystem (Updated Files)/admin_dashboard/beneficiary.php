<?php
$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$sql = "SELECT * FROM beneficiaries";

if(isset($_GET["search"]) && !empty($_GET["search"])){
    $search_term = $_GET["search"];

    $sql .= " WHERE 
                id LIKE '%$search_term%' OR
                name LIKE '%$search_term%' OR
                address LIKE '%$search_term%' OR
                phone LIKE '%$search_term%' OR
                project LIKE '%$search_term%' OR
                status LIKE '%$search_term%'";
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
<h4>Beneficiaries</h4>

<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
Add Beneficiaries
</button>

</div>

<form action="" method="get">
<input type="text" class="form-control mb-3" name="search" placeholder="Search here...">
</form>

<table class="table table-striped table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Project</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>
    
<?php while($row = $result->fetch_assoc()){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['project']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
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

<form method="POST" action="/NGOsystem/admin_dashboard/config.benef/update_benef.php">

<div class="modal-header">
<h5>Edit Beneficiaries</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input name="name" value="<?php echo $row['name']; ?>" class="form-control mb-2">
<input name="address" value="<?php echo $row['address']; ?>" class="form-control mb-2">
<input name="phone" value="<?php echo $row['phone']; ?>" class="form-control mb-2">
<input name="project" value="<?php echo $row['project']; ?>" class="form-control mb-2">
<input name="status" value="<?php echo $row['status']; ?>" class="form-control mb-2">

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

<form method="POST" action="/NGOsystem/admin_dashboard/config.benef/delete_benef.php">

<div class="modal-header">
<h5>Delete Beneficiaries</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<p>Are you sure you want to delete?</p>

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

<form method="POST" action="/NGOsystem/admin_dashboard/config.benef/insert_benef.php">

<div class="modal-header">
<h5>Add Beneficiaries</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input name="name" placeholder="Name" class="form-control mb-2" required>
<input name="address" placeholder="Address" class="form-control mb-2" required>
<input name="phone" placeholder="Phone" class="form-control mb-2" required>
<input name="project" placeholder="Project" class="form-control mb-2" required>
<input name="status" placeholder="Status" class="form-control mb-2" required>

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
</body>
</html>