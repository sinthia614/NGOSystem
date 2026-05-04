<?php
$conn = new mysqli('localhost', 'root', '', 'ngosystem');

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM member";

if(isset($_GET["search"]) && !empty($_GET["search"])){
    $search_term = $_GET["search"];

    $sql .= " WHERE 
                id LIKE '%$search_term%' OR
                name LIKE '%$search_term%' OR
                email LIKE '%$search_term%' OR
                phone LIKE '%$search_term%' OR
                join_date LIKE '%$search_term%' OR
                role LIKE '%$search_term%'";
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
<link rel="stylesheet" href="/NGOsystem/asset/css/admin.dashboard.css">

</head>

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

<!-- MAIN CONTENT -->
<div class="col-md-10 p-3">

<div class="card p-3">

<div class="d-flex justify-content-between mb-3">
<h4>Members</h4>

<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
Add Member
</button>

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
<th>Join Date</th>
<th>Role</th>
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
<td><?php echo $row['join_date']; ?></td>
<td><?php echo $row['role']; ?></td>

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
</td>

</tr>


<!-- inside loop -->
 <!-- EDIT MODAL -->
<div class="modal fade" id="editModal<?php echo $row['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="/NGOsystem/admin_dashboard/config.member/update_member.php">

<div class="modal-header">
<h5>Edit Member</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input name="name" value="<?php echo $row['name']; ?>" class="form-control mb-2">
<input name="email" value="<?php echo $row['email']; ?>" class="form-control mb-2">
<input name="phone" value="<?php echo $row['phone']; ?>" class="form-control mb-2">
<input type="date" name="join_date" value="<?php echo $row['join_date']; ?>" class="form-control mb-2">
<input name="role" value="<?php echo $row['role']; ?>" class="form-control mb-2">

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

<form method="POST" action="/NGOsystem/admin_dashboard/config.member/delete_member.php">

<div class="modal-header">
<h5>Delete Member</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<p>Are you sure you want to delete this member?</p>

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

<form method="POST" action="/NGOsystem/admin_dashboard/config.member/insert_member.php">

<div class="modal-header">
<h5>Add Member</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input name="name" placeholder="Name" class="form-control mb-2" required>
<input name="email" placeholder="Email" class="form-control mb-2" required>
<input name="phone" placeholder="Phone" class="form-control mb-2" required>
<input type="date" name="join_date" class="form-control mb-2" required>
<input name="role" placeholder="Role" class="form-control mb-2" required>

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