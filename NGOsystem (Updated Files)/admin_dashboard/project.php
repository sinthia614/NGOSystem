<?php
$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$sql = "SELECT * FROM projects";

if(isset($_GET["search"]) && !empty($_GET["search"])){
    $search_term = $_GET["search"];

    $sql .= " WHERE 
                id LIKE '%$search_term%' OR
                project_name LIKE '%$search_term%' OR
                category LIKE '%$search_term%' OR
                start_date LIKE '%$search_term%' OR
                end_date LIKE '%$search_term%' OR
                budget LIKE '%$search_term%' OR
                status LIKE '%$search_term%' OR
                progress LIKE '%$search_term%'";
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
<h4>Projects</h4>

<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
Add Projects
</button>

</div>

<form action="" method="get">
<input type="text" class="form-control mb-3" name="search" placeholder="Search here...">
</form>

<table class="table table-striped table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Project Name</th>
<th>Category</th>
<th>Start Date</th>
<th>End Date</th>
<th>Budget</th>
<th>Status</th>
<th>Progress</th>
<th>Action</th>
</tr>
</thead>

<tbody>

   
<?php while($row = $result->fetch_assoc()){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['project_name']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['start_date']; ?></td>
<td><?php echo $row['end_date']; ?></td>
<td><?php echo $row['budget']; ?></td>
<td><?php echo $row['status']; ?></td>


<td>
<?php
$progress = $row['progress'];

if($progress < 40){
    $color = "bg-danger";
}elseif($progress < 80){
    $color = "bg-warning";
}else{
    $color = "bg-success";
}
?>

<div class="progress-bar <?php echo $color; ?>"
     style="width: <?php echo $progress; ?>%;">
     <?php echo $progress; ?>%
</div>
</td>


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
<div class="modal fade" id="invoiceModal<?php echo $row['id']; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Invoice</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="invoice-<?php echo $row['id']; ?>">

    <h3 class="text-center">NGO Invoice</h3>
    <hr>

    <p><strong>Invoice No:</strong> INV-<?php echo $row['id']; ?></p>
    <p><strong>Date:</strong> <?php echo date("Y-m-d"); ?></p>

    <table class="table table-bordered">
        <tr><th>ID</th><td><?php echo $row['id']; ?></td></tr>
        <tr><th>Project Name</th><td><?php echo $row['project_name']; ?></td></tr>
        <tr><th>Category</th><td><?php echo $row['category']; ?></td></tr>
        <tr><th>Start Date</th><td><?php echo $row['start_date']; ?></td></tr>
        <tr><th>End Date</th><td><?php echo $row['end_date']; ?></td></tr>
        <tr><th>Budget</th><td><?php echo $row['budget']; ?></td></tr>
        <tr><th>Status</th><td><?php echo $row['status']; ?></td></tr>
        <tr><th>Progress</th><td><?php echo $row['progress']; ?>%</td></tr>
    </table>

    <h5 class="text-end">Total Budget: <?php echo $row['budget']; ?></h5>

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

<form method="POST" action="/NGOsystem/admin_dashboard/config.project/update_project.php">

<div class="modal-header">
<h5>Edit Projects</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input name="project_name" value="<?php echo $row['project_name']; ?>" class="form-control mb-2">
<input name="category" value="<?php echo $row['category']; ?>" class="form-control mb-2">
<input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" class="form-control mb-2">
<input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" class="form-control mb-2">
<input name="budget" value="<?php echo $row['budget']; ?>" class="form-control mb-2">
<select name="status" class="form-control" value="<?php echo $row['status']; ?>">
    <option value="">Select Status</option>
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
    <option value="In-Progress">In-Progress</option>
    <option value="Completed">Completed</option>
</select>

<label for="range4" class="form-label mb-2">Project Progress</label>

<input 
    name="progress"
    type="range"
    class="form-range"
    min="0"
    max="100"
    id="range4"
    value="<?php echo $row['progress']; ?>"
>

<output id="rangeValue"></output>

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

<form method="POST" action="/NGOsystem/admin_dashboard/config.project/delete_project.php">

<div class="modal-header">
<h5>Delete Projects</h5>
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

<form method="POST" action="/NGOsystem/admin_dashboard/config.project/insert_project.php">

<div class="modal-header">
<h5>Add Projects</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input name="project_name" placeholder="Project Name" class="form-control mb-2" required>
<input name="category" placeholder="Category" class="form-control mb-2" required>
<input type="date" name="start_date" class="form-control mb-2" required>
<input type="date" name="end_date" class="form-control mb-2" required>
<input name="budget" placeholder="Budget" class="form-control mb-2" required>

<select name="status" class="form-control mb-2" value="<?php echo $row['status']; ?>" required>
    <option value="">Select Status</option>
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
    <option value="In-Progress">In-Progress</option>
    <option value="Completed">Completed</option>
</select>

<div class="form-control">
    <label for="range4" class="form-label mb-2">Project Progress</label>

<input 
    name="progress"
    type="range"
    class="form-range"
    min="0"
    max="100"
    id="range4"
    value="<?php echo $row['progress']; ?>"
>

<output id="rangeValue"></output>
</div>

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
    const rangeInput = document.getElementById('range4');
    const rangeOutput = document.getElementById('rangeValue');

    function updateProgress(){
        let value = rangeInput.value;

        rangeOutput.textContent = value + "%";

        progressBar.style.width = value + "%";
        progressBar.textContent = value + "%";

        progressBar.setAttribute("aria-valuenow", value);
    }

    updateProgress();

    rangeInput.addEventListener("input", updateProgress);
</script>

<!-- invoice -->
 <script>
function printInvoice(id) {
    var content = document.getElementById(id).innerHTML;

    var win = window.open('', '', 'width=900,height=700');

    win.document.write(`
        <html>
        <head>
            <title>Invoice</title>
            <style>
                body {
                    font-family: Arial;
                    padding: 20px;
                }
                h3 {
                    text-align: center;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid #000;
                }
                th, td {
                    padding: 8px;
                    text-align: left;
                }
            </style>
        </head>
        <body>
            ${content}
        </body>
        </html>
    `);

    win.document.close();
    win.print();
}
</script>
</body>
</html>