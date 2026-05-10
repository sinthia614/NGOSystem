<?php
$conn = new mysqli('localhost', 'root', '', 'ngosystem');

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

/* Get only latest report */
$sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 1";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

/* Members */
$members = $conn->query("SELECT * FROM member");
$totalMembers = $members->num_rows;

/* Donors */
$donors = $conn->query("SELECT * FROM donor");
$totalDonors = $donors->num_rows;

$donationSum = $conn->query("SELECT SUM(total_donation) AS total FROM donor");
$donationRow = $donationSum->fetch_assoc();

/* Projects */
$projects = $conn->query("SELECT * FROM projects");
$totalProjects = $projects->num_rows;

/* Beneficiaries */
$beneficiaries = $conn->query("SELECT * FROM beneficiaries");
$totalBeneficiaries = $beneficiaries->num_rows;

/* Distribution */
$distributions = $conn->query("SELECT * FROM distribution");
$totalDistributions = $distributions->num_rows;

/* Volunteers */
$volunteers = $conn->query("SELECT * FROM volunteers");
$totalVolunteers = $volunteers->num_rows;

$section = $_GET['section'] ?? 'all';
$month = $_GET['month'] ?? '';
$year = $_GET['year'] ?? '';

// Set default values (important for filter safety)
$section = $_GET['section'] ?? 'all';
$year    = $_GET['year'] ?? '';


/* Filter values */

$from_date = $_GET['from_date'] ?? '';
$to_date   = $_GET['to_date'] ?? '';



/* =========================
   MEMBERS
========================= */

$memberQuery = "SELECT * FROM member WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $memberQuery .= " AND DATE(created_at) 
                      BETWEEN '$from_date' AND '$to_date'";
}

$members = $conn->query($memberQuery);

$totalMembers = $members->num_rows;



/* =========================
   DONORS
========================= */

$donorQuery = "SELECT * FROM donor WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $donorQuery .= " AND DATE(created_at) 
                     BETWEEN '$from_date' AND '$to_date'";
}

$donors = $conn->query($donorQuery);

$totalDonors = $donors->num_rows;


/* Total Donation Sum */

$donationSumQuery = "SELECT SUM(total_donation) as total 
                     FROM donor WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $donationSumQuery .= " AND DATE(created_at) 
                           BETWEEN '$from_date' AND '$to_date'";
}

$donationSum = $conn->query($donationSumQuery);

$donationRow = $donationSum->fetch_assoc();



/* =========================
   PROJECTS
========================= */

$projectQuery = "SELECT * FROM projects WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $projectQuery .= " AND DATE(created_at) 
                       BETWEEN '$from_date' AND '$to_date'";
}

$projects = $conn->query($projectQuery);

$totalProjects = $projects->num_rows;



/* =========================
   BENEFICIARIES
========================= */

$beneficiaryQuery = "SELECT * FROM beneficiaries WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $beneficiaryQuery .= " AND DATE(created_at) 
                           BETWEEN '$from_date' AND '$to_date'";
}

$beneficiaries = $conn->query($beneficiaryQuery);

$totalBeneficiaries = $beneficiaries->num_rows;



/* =========================
   DISTRIBUTION
========================= */

$distributionQuery = "SELECT * FROM distribution WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $distributionQuery .= " AND DATE(created_at) 
                            BETWEEN '$from_date' AND '$to_date'";
}

$distributions = $conn->query($distributionQuery);

$totalDistributions = $distributions->num_rows;



/* =========================
   VOLUNTEERS
========================= */

$volunteerQuery = "SELECT * FROM volunteers WHERE 1=1";

if($from_date != '' && $to_date != ''){
    $volunteerQuery .= " AND DATE(created_at) 
                         BETWEEN '$from_date' AND '$to_date'";
}

$volunteers = $conn->query($volunteerQuery);

$totalVolunteers = $volunteers->num_rows;



/* =========================
   FINANCIAL REPORT
========================= */

$reportQuery = "SELECT * FROM reports 
                ORDER BY id DESC LIMIT 1";

$reportResult = $conn->query($reportQuery);

$row = $reportResult->fetch_assoc();
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

<div class="card col-md-10 p-3">


<h4>Financial Reports</h4>

<div class="row mt-4">

<div class="col-md-4">
<div class="card p-3" style="background-color: #68b6ff86;">
<h6>Total Donation</h6>
<h3><?php echo $row['total_donation']; ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3" style="background-color: #e97cff7c;">
<h6>Total Expense</h6>
<h3><?php echo $row['total_expense']; ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3" style="background-color: #fff0688c;">
<h6>Balance</h6>
<h3><?php echo $row['balance']; ?></h3>
</div>
</div>

</div>

</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Financial Report</h2>

  <div class="card p-4 shadow">
    <canvas id="financeChart"></canvas>
  </div>
</div>



<!-- report details -->
  <div class="text-center">    
    <h2 class="display-5 link-body-emphasis mb-1 pt-5">Full Report Details From Database</h2>
</div>
<div class="container mt-4">

<form method="GET" class="row mb-4">

    <div class="col-md-3">
        <select name="section" class="form-control">
            <option value="all">All Sections</option>
            <option value="member">Members</option>
            <option value="donor">Donors</option>
            <option value="project">Projects</option>
            <option value="beneficiaries">Beneficiaries</option>
            <option value="distribution">Distribution</option>
            <option value="volunteers">Volunteers</option>
        </select>
    </div>

    <div class="col-md-3">
        <input type="date" name="from_date" class="form-control">
    </div>

    <div class="col-md-3">
        <input type="date" name="to_date" class="form-control">
    </div>

    <div class="col-md-3">
        <button type="submit" class="btn btn-primary mt-1">
            Search Report
        </button>
    </div>
    <div class="col-md-2">
        <button type="button" onclick="printReport()" class="btn btn-dark mt-3">
            Print
        </button>
    </div>
</form>



<div id="printReport">

<h3 class="pt-4">📊 HopeBridge NGO System Database Report</h3>
<hr>
<?php if($section == 'all' || $section == 'member'){ ?>

<div class="report-section">

    <h5>👥 Members (Total: <?= $totalMembers; ?>)</h5>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Join Date</th>
            <th>Role</th>
        </tr>

        <?php if($totalMembers > 0){ ?>

            <?php while($m = $members->fetch_assoc()){ ?>

            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= $m['name'] ?></td>
                <td><?= $m['email'] ?></td>
                <td><?= $m['phone'] ?></td>
                <td><?= $m['join_date'] ?></td>
                <td><?= $m['role'] ?></td>
            </tr>

            <?php } ?>

        <?php } else { ?>

            <tr><td colspan="6" class="text-center">No member data found</td></tr>

        <?php } ?>

    </table>

</div>

<?php } ?>
<hr>


<?php if($section == 'all' || $section == 'donor'){ ?>

<div class="report-section">

    <h5>💰 Donors (Total: <?= $totalDonors; ?>)</h5>

    <p>
        <b>Total Donation Sum:</b>
        <?= $donationRow['total'] ?? 0; ?>
    </p>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Total Donation</th>
            <th>Last Donation</th>
        </tr>

        <?php if($totalDonors > 0){ ?>

            <?php while($d = $donors->fetch_assoc()){ ?>

            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['name'] ?></td>
                <td><?= $d['phone'] ?></td>
                <td><?= $d['total_donation'] ?></td>
                <td><?= $d['last_donation'] ?></td>
            </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>
                <td colspan="5" class="text-center">
                    No donor data found
                </td>
            </tr>

        <?php } ?>

    </table>

</div>


<?php } ?>

<hr>

<?php if($section == 'all' || $section == 'project'){ ?>

<div class="report-section">

    <h5>📦 Projects (Total: <?= $totalProjects; ?>)</h5>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Category</th>
            <th>Start</th>
            <th>End</th>
            <th>Budget</th>
            <th>Status</th>
            <th>Progress</th>
        </tr>

        <?php if($totalProjects > 0){ ?>

            <?php while($p = $projects->fetch_assoc()){ ?>

            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['project_name'] ?></td>
                <td><?= $p['category'] ?></td>
                <td><?= $p['start_date'] ?></td>
                <td><?= $p['end_date'] ?></td>
                <td><?= $p['budget'] ?></td>
                <td><?= $p['status'] ?></td>
                <td><?= $p['progress'] ?>%</td>
            </tr>

            <?php } ?>

        <?php } else { ?>

            <tr><td colspan="8" class="text-center">No project data found</td></tr>

        <?php } ?>

    </table>

</div>

<?php } ?>

<hr>

<?php if($section == 'all' || $section == 'beneficiaries'){ ?>

<div class="report-section">

    <h5>🎯 Beneficiaries (Total: <?= $totalBeneficiaries; ?>)</h5>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Project</th>
            <th>Status</th>
        </tr>

        <?php if($totalBeneficiaries > 0){ ?>

            <?php while($b = $beneficiaries->fetch_assoc()){ ?>

            <tr>
                <td><?= $b['id'] ?></td>
                <td><?= $b['name'] ?></td>
                <td><?= $b['address'] ?></td>
                <td><?= $b['phone'] ?></td>
                <td><?= $b['project'] ?></td>
                <td><?= $b['status'] ?></td>
            </tr>

            <?php } ?>

        <?php } else { ?>

            <tr><td colspan="6" class="text-center">No beneficiary data found</td></tr>

        <?php } ?>

    </table>

</div>

<?php } ?>

<hr>

<?php if($section == 'all' || $section == 'distribution'){ ?>

<div class="report-section">

    <h5>🚚 Distribution (Total: <?= $totalDistributions; ?>)</h5>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Project</th>
            <th>Beneficiary</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>

        <?php if($totalDistributions > 0){ ?>

            <?php while($d = $distributions->fetch_assoc()){ ?>

            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['project'] ?></td>
                <td><?= $d['beneficiary'] ?></td>
                <td><?= $d['item'] ?></td>
                <td><?= $d['quantity'] ?></td>
                <td><?= $d['date'] ?></td>
            </tr>

            <?php } ?>

        <?php } else { ?>

            <tr><td colspan="6" class="text-center">No distribution data found</td></tr>

        <?php } ?>

    </table>

</div>

<?php } ?>
<hr>

<?php if($section == 'all' || $section == 'volunteers'){ ?>

<div class="report-section">

    <h5>🧑‍🤝‍🧑 Volunteers (Total: <?= $totalVolunteers; ?>)</h5>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Assigned Project</th>
            <th>Status</th>
        </tr>

        <?php if($totalVolunteers > 0){ ?>

            <?php while($v = $volunteers->fetch_assoc()){ ?>

            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['name'] ?></td>
                <td><?= $v['phone'] ?></td>
                <td><?= $v['email'] ?></td>
                <td><?= $v['assigned_project'] ?></td>
                <td><?= $v['status'] ?></td>
            </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>
                <td colspan="6">No volunteer data found</td>
            </tr>

        <?php } ?>

    </table>

</div>

<?php } ?>


<!-- FOOTER -->
<hr>

<div class="mt-5">

    <h4 class="text-center">
        CyberOrg NGO Report
    </h4>

    <p class="text-center">
        Report Period:
        <?= $from_date ? $from_date : 'Beginning'; ?>
        to
        <?= $to_date ? $to_date : date('Y-m-d'); ?>
    </p>

    <div class="row mt-5">

        <div class="col-4 text-center">
            <br><br>
            _______________________
            <p>Authority Signature</p>
        </div>

        <div class="col-4 text-center">
            <br><br>
            _______________________
            <p>Co-ordinator Signature</p>
        </div>

        <div class="col-4 text-center">
            <br><br>
            _______________________
            <p>Manager Signature</p>
        </div>

    </div>

</div>

</div> <!-- printReport END -->

</div>
</div>
</div>

</div>



<!-- javascript -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    fetch("/NGOsystem/admin_dashboard/config.report/data.php")
    .then(response => response.json())
    .then(data => {

        const ctx = document.getElementById("financeChart");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Total Donation", "Total Expense", "Balance"],
                datasets: [{
                    label: "Amount",
                    data: [
                        data.total_donation,
                        data.total_expense,
                        data.balance
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    })
    .catch(error => {
        console.log("Error:", error);
    });

});
</script>

<!-- filterprint -->
<script>
function printReport() {
let from = "<?= $from_date ?>";
let to = "<?= $to_date ?>";
    let content = document.getElementById("printReport").innerHTML;

    let printWindow = window.open('', '', 'width=900,height=700');

    printWindow.document.write(`
        <html>
        <head>
            <title>NGO Report</title>

            <style>
                table{
                    width:100%;
                    border-collapse:collapse;
                }

                table, th, td{
                    border:1px solid black;
                    padding:8px;
                }
            </style>

        </head>

        <body>
            ${content}
        </body>

        </html>
    `);

    printWindow.document.close();
    printWindow.print();

}
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>