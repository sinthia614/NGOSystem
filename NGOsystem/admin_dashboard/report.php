<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NGO Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/NGOsystem/asset/css/admin.dashboard.css">
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
<div class="card p-3">
<h6>Total Donation</h6>
<h3>45000</h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h6>Total Expense</h6>
<h3>35000</h3>
</div>
</div>

<div class="col-md-4">
<div class="card p-3">
<h6>Balance</h6>
<h3>24600</h3>
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

</div>
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

  fetch('data.php')
    .then(response => response.json())
    .then(data => {

      console.log("Data from PHP:", data); // debug

      const ctx = document.getElementById('financeChart');

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Total Donation', 'Total Expense', 'Balance'],
          datasets: [{
            label: 'Amount',
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
      console.error("Error loading data:", error);
    });

});
const data = {
  total_donation: 45000,
  total_expense: 35000,
  balance: 24600
};

const ctx = document.getElementById('financeChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Total Donation', 'Total Expense', 'Balance'],
    datasets: [{
      data: [
        data.total_donation,
        data.total_expense,
        data.balance
      ]
    }]
  }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>