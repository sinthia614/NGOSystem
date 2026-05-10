<?php
$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$member_result = $conn->query(
    "SELECT COUNT(*) as total_members FROM member"
);

$donor_result = $conn->query(
    "SELECT COUNT(*) as total_donor FROM donor"
);

$beneficiaries_result = $conn->query(
    "SELECT COUNT(*) as total_beneficiaries FROM beneficiaries"
);

$projects_result = $conn->query(
    "SELECT COUNT(*) as total_projects FROM projects"
);

$distribution_result = $conn->query(
    "SELECT COUNT(*) as total_distribution FROM distribution"
);

$volunteers_result = $conn->query(
    "SELECT COUNT(*) as total_volunteers FROM volunteers"
);
?>

<?php
$chart_query = "SELECT category, COUNT(*) as total FROM projects GROUP BY category";
$chart_result = $conn->query($chart_query);

$labels = [];
$data = [];

while($row = $chart_result->fetch_assoc()){
    $labels[] = $row['category'];
    $data[] = $row['total'];
}
?>
<!-- for progress bar -->
<?php 
$report_result = $conn->query("
    SELECT 
        SUM(total_donation) as total_donation,
        SUM(total_expense) as total_expense,
        SUM(balance) as balance
    FROM reports
");

$report = $report_result->fetch_assoc();

$total_donation = $report['total_donation'];
$total_expense  = $report['total_expense'];
$balance        = $report['balance'];

$total = $total_donation + $total_expense + $balance;

$donation_percent = ($total > 0) ? ($total_donation / $total) * 100 : 0;
$expense_percent  = ($total > 0) ? ($total_expense / $total) * 100 : 0;
$balance_percent  = ($total > 0) ? ($balance / $total) * 100 : 0;
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

    <!-- First Row -->
    <div class="row mt-3 g-3">

        <div class="col-md-3">
            <div class="card-box bg-members">
                <h5>Total Members</h5>
                <h2 class="counter" data-target="<?php echo $member_result->fetch_assoc()['total_members']; ?>">0</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-donors">
                <h5>Total Donors</h5>
                <h2 class="counter" data-target="<?php echo $donor_result->fetch_assoc()['total_donor']; ?>">0</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-beneficiaries">
                <h5>Total Beneficiaries</h5>
                <h2 class="counter" data-target="<?php echo $beneficiaries_result->fetch_assoc()['total_beneficiaries']; ?>">0</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-projects">
                <h5>Total Projects</h5>
                <h2 class="counter" data-target="<?php echo $projects_result->fetch_assoc()['total_projects']; ?>">0</h2>
            </div>
        </div>

    </div>


    <!-- Second Row -->
    <div class="row mt-3 g-3">

        <div class="col-md-6">
            <div class="card-box bg-distribution">
                <h5>Total Distributions</h5>
                <h2 class="counter" data-target="<?php echo $distribution_result->fetch_assoc()['total_distribution']; ?>">0</h2>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-box bg-volunteers">
                <h5>Total Volunteers</h5>
                <h2 class="counter" data-target="<?php echo $volunteers_result->fetch_assoc()['total_volunteers']; ?>">0</h2>
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
<label>Total Donation</label>
<div class="progress-bar prgBar d-flex">
    <div class="bg-success"
         style="width: <?php echo $donation_percent; ?>%">
        <?php echo $total_donation; ?>
    </div>
</div>

<label>Total Expense</label>
<div class="progress-bar prgBar d-flex">
    <div class="bg-danger"
         style="width: <?php echo $expense_percent; ?>%">
        <?php echo $total_expense; ?>
    </div>
</div>

<label>Balance</label>
<div class="progress-bar prgBar d-flex">
    <div class="bg-primary"
         style="width: <?php echo $balance_percent; ?>%">
        <?php echo $balance; ?>
</div>
</div>

</div>
<!-- progress bar end -->

</div>
</div>
</div>

    <!-- graph progress end -->

</div>



<script>

// Project Chart
const ctx = document.getElementById('projectChart');

const labels = <?php echo json_encode($labels); ?>;
const data = <?php echo json_encode($data); ?>;

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Projects by Category',
            data: data,
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

<!-- total counter animation -->
<script>
const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
    counter.innerText = '0';

    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const current = +counter.innerText;

        const increment = target / 100; // speed control

        if (current < target) {
            counter.innerText = Math.ceil(current + increment);
            setTimeout(updateCounter, 100);
        } else {
            counter.innerText = target;
        }
    };

    updateCounter();
});
</script>

<!-- progress bar animation -->
<script>
document.querySelectorAll('.progress-bar').forEach(bar => {
    let width = bar.style.width;
    bar.style.width = '0';
    setTimeout(() => {
        bar.style.width = width;
    }, 200);
});
</script>

</body>
</html>