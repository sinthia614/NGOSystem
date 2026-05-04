<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NGO Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/NGOsystem/asset/css/admin.dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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


<!-- Main Content -->
<div class="col-md-10 p-4">

<h3>Dashboard</h3>

<!-- Top Stats -->
<div class="row mt-3">

<div class="col-md-3">
<div class="card-box bg-members">
<h5>Total Members</h5>
<h2 id="totalMembers">4255</h2>
</div>
</div>

<div class="col-md-3">
<div class="card-box bg-donors">
<h5>Total Donors</h5>
<h2 id="totalDonors">1245</h2>
</div>
</div>

<div class="col-md-3">
<div class="card-box bg-beneficiaries">
<h5>Beneficiaries</h5>
<h2 id="totalBeneficiaries">2478</h2>
</div>
</div>

<div class="col-md-3">
<div class="card-box bg-projects">
<h5>Projects</h5>
<h2 id="totalProjects">215</h2>
</div>
</div>

</div>


<!-- Second Row -->
<div class="row mt-4">

<div class="col-md-4">
<div class="card p-3">
<h5>Volunteers</h5>
<h3 id="totalVolunteers">395</h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h5>Distributions</h5>
<h3 id="totalDistributions">753</h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h5>Active Projects</h5>
<h3 id="activeProjects">25</h3>
</div>
</div>

</div>



<!-- Project Tracking Graph -->
<div class="card mt-4 p-3">
<h5>Project Tracking</h5>
<canvas id="projectChart"></canvas>
</div>



<!-- Financial Report -->
<div class="card mt-4 p-3">

<h5>Financial Report</h5>

<label>Total Budget</label>
<div class="progress mb-3">
<div id="budgetBar" class="progress-bar bg-primary" style="width:34%">
34%
</div>
</div>

<label>Total Donation Received</label>
<div class="progress mb-3">
<div id="donationBar" class="progress-bar bg-success" style="width:68%">
68%
</div>
</div>

<label>Total Expense</label>
<div class="progress mb-3">
<div id="expenseBar" class="progress-bar bg-danger" style="width:56%">
56%
</div>
</div>

</div>


</div>
</div>
</div>


<script>

// Project Chart
const ctx = document.getElementById('projectChart');

new Chart(ctx, {
type: 'bar',
data: {
labels: ['Education','Food','Medical','Relief','Shelter'],
datasets: [{
label: 'Project Progress',
data: [65, 59, 80, 81, 56],
backgroundColor: [
'#4e73df',
'#1cc88a',
'#36b9cc',
'#f6c23e',
'#e74a3b'
]
}]
}
});

</script>

</body>
</html>