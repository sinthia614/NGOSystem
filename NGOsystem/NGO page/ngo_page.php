<?php
$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$result = $conn->query("SELECT * FROM member ORDER BY id DESC");
?>



<!DOCTYPE html>
<html>
    <head>
        <title>NGO System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/NGOsystem/asset/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    </head>

    <body>
        <!-- navigation bar section -->

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/NGOsystem/index.php"><img src="/NGOsystem/asset/image/Logo.png" alt="Navbar logo" height="40px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        <!-- Navigation Lists-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Home -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/NGOsystem/index.php">Home</a>
                        </li>

                        <!-- Projects -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            NGO's
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">HopeBridge NGO</a></li>
                                <li><a class="dropdown-item" href="#">Farewell NGO</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">ChildCare NGO</a></li>
                            </ul>
                        </li>

                        <!-- Category -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Education</a></li>
                                <li><a class="dropdown-item" href="#">Food</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Water</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/NGOsystem/admin_dashboard/admin.dashboard.php">Admin Dashboard</a>
                        </li>
                        

                    </ul>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> <input type="search" class="form-control form-control" placeholder="Search..." aria-label="Search"> </form>
                    
                </div>
            </div>
        </nav>
        <!-- navigation bar section -->

        <!-- ngo banner section-->
        <!-- carousel section-->
        <div id="carouselExample" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/NGOsystem/asset/image/ngo_banner/banner_water.jpg" class="d-block w-100" alt="ngo banner">
                    <div class="carousel-caption position-absolute top-50 translate-middle h-500 d-inline-block" style="width: 500px;">
                        <div class="txt-title pt-2">
                            <h1 class=" fs-1 fw-bold">HopeBridge NGO</h1>
                            <p class=" fs-4 fw-bold">Maintaining pure water and distributing to local area</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Details about ngo-->
        <div class="container-md">
            <article class="blog-post"> 
                <h2 class="display-5 link-body-emphasis mb-1 pt-5">NGO Details</h2> 
                <p>Providing water quality testing services for ensuring safe drinking water through Water Quality Testing Laboratory (WQTL), located at Central Office of NGO Forum at competitive price is one of NGO Forum’s major commitments to the society.</p> 
                <div>Water Quality Testing Laboratory (WQTL) of NGO Forum is the first initiative in the NGOs of Bangladesh equipped with modern technologies like Atomic Absorption Spectrophotometer (AAS) for providing drinking and wastewater testing support to the relevant stakeholders with the capability of testing a range of parameters covering physical, chemical and microbiological parameters including arsenic, BOD, E.coli etc. at a competitive rate. The WQTL produce bacterial testing kit, the ‘MicroKit’ for checking bacterial contamination of drinking water at doorstep. The WQTL also expanded its service facilities through establishing new testing facilities ‘CoxLab’ in Cox’s Bazar.</div><hr> 
                <p><b>Objective :</b> To Provide sustainable access of quality testing services for both drinking and wastewater to sectoral stakeholder ranges from the community to government and non-government organizations, international agencies and private sector actors at a competitive price.</p> 
                
            </article>
        </div>
        

        <!--Members info-->


<div class="card container mt-5 p-3">

<div class="d-flex justify-content-between mb-3">
<h4>Members</h4>
</div>

<table class="table table-bordered table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Join Date</th>
<th>Role</th>
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
</tr>

<?php } ?>

</tbody>

</table>

</div>

        <!--Donor info-->

<div class="card container mt-5 p-3">

<div class="d-flex justify-content-between mb-3">
<h4>Donors</h4>
</div>

<table class="table table-bordered">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Total Donation</th>
<th>Last Donation</th>
</tr>
</thead>

<tbody>
<tr>
<td>1</td>
<td>Tarek Rumon</td>
<td>tarek@gmail.com</td>
<td>01983478374</td>
<td>348656</td>
<td>12050</td>

</tr>
<tr>
<td>2</td>
<td>Rhick Tapadar</td>
<td>rhick@gmail.com</td>
<td>01922278374</td>
<td>51000</td>
<td>11000</td>

</tr>
<tr>
<td>3</td>
<td>Sadik Shahrear</td>
<td>sadik@gmail.com</td>
<td>01976554555</td>
<td>45500</td>
<td>15000</td>

</tr>
<tr>
<td>4</td>
<td>Sinthia Islam</td>
<td>sinthia@gmail.com</td>
<td>01976554765</td>
<td>31400</td>
<td>14500</td>

</tr>
</tbody>

</table>

</div>
        <!--Beneficiary info-->

<div class="card container mt-5 p-3">


<h4>Beneficiaries</h4>

<table class="table table-striped">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Project</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

</tr>
</tbody>

</table>

</div>
        <!--Projects info-->

    <div class="card container mt-5 p-3">

<div class="d-flex justify-content-between">
<h4>Projects</h4>
</div>

<table class="table table-bordered mt-3">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Project Name</th>
<th>Start Date</th>
<th>End Date</th>
<th>Budget</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>


</tr>
</tbody>

</table>

</div>

        <!--Distribution info-->

<div class="card container mt-5 p-3">

<h4>Distribution</h4>

<table class="table table-bordered">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Project</th>
<th>Beneficiary</th>
<th>Item</th>
<th>Quantity</th>
<th>Date</th>
</tr>
</thead>

<tbody>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>

</table>

</div>


        <!--Volunteer info-->

    <div class="card container mt-5 p-3">

<div class="d-flex justify-content-between">
<h4>Volunteers</h4>
</div>

<table class="table table-bordered mt-3">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th>Assigned Project</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>

</table>

</div>

        <!--Expense info-->
        <main class="container-md px-md-4 mt-5 pt-5"> 
            
            <h2>Project Expenses & Finance tracking</h2> 
            <div class="table-responsive small"> 
                <table class="table table-striped table-sm"> 
                    <thead> 
                        <tr> 
                            <th scope="col">Project ID</th> 
                            <th scope="col">Title</th> 
                            <th scope="col">Amount</th> 
                            <th scope="col">Status</th> 
                            <th scope="col">Progress</th> 
                        </tr> 
                    </thead> 
                        <tbody> 
                            <tr> 
                                <td>01</td> 
                                <td>expense report 1</td> 
                                <td>53456.00</td> 
                                <td>Completed</td> 
                                <td>
                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 100%">100%</div>
                                    </div>
                                </td> 
                            </tr> 
                            <tr> 
                                <td>02</td> 
                                <td>expense report 2</td> 
                                <td>47456.00</td> 
                                <td>Active</td> 
                                <td>
                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 75%">75%</div>
                                    </div>
                                </td> 
                            </tr> 
                            <tr> 
                                <td>03</td> 
                                <td>expense report 3</td> 
                                <td>75456.00</td> 
                                <td>Cancelled</td> 
                                <td>
                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-danger" style="width: 50%">50%</div>
                                    </div>
                                </td> 
                            </tr> 
                            <tr> 
                                <td>04</td> 
                                <td>expense report 4</td> 
                                <td>66456.00</td> 
                                <td>Planned</td> 
                                <td>
                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 0%">0%</div>
                                    </div>
                                </td> 
                            </tr> 
                         </tbody> 
                    </table> 
                </div> 
        </main>

        
        <!--Report info-->

        <!--Graph-->
        <div class="container-md px-md-4 pt-5 pb-5">
            <h2 class="mb-4">Project Report Graph</h2>
            <div class="row">
                <div class="cl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart">
                                <canvas class="chart-canvas" id="line-chart-gradient" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        <!-- Footer-->

        <section id="footer">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-md-3 footer-box">
                    <img src="/NGOsystem/asset/image/Logo.png" height="40px"> 
                    <p><b>© 2026</b></p>
                </div>
                <div class="col-md-3 footer-box">
                    <h5><b>Contact Us</b></h5>
                    <p>email: ngodbms@gmail.com</p>
                    <p>Number: 01946540</p>
                </div>
                <div class="col-md-3 footer-box ">
                    <h5><b>Location</b></h5>
                    <p>Northern University Bangladesh</p>
                    <p>Ashkona, Dhaka</p>
                </div>


                <div class="col-md-3 footer-box"> 
                    <h5>Social Media</h5> 
                    <ul class="list-unstyled text-small"> 
                        <li><a class="link-secondary text-decoration-none" href="#">Facebook</a></li> 
                        <li><a class="link-secondary text-decoration-none" href="#">Instagram</a></li> 
                        <li><a class="link-secondary text-decoration-none" href="#">LinkedIn</a></li> 
                        <li><a class="link-secondary text-decoration-none" href="#">WhatsApp</a></li> 
                    </ul> 
                </div> 
                </div>
            </div>            
            </div>            
        </section>

        





    <script src="/NGOsystem/asset/js/javascript.js"></script>
    <script src="/NGOsystem/asset/js/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        var labelsText = ["2000", "2005", "2010","2015", "2020", "2025"];

        var ctx2 = document.getElementById('line-chart-gradient').getContext('2d');
        var gradientStroke1 = ctx2.createLinearGradient(0,230,0,50);
            gradientStroke1.addColorStop(1,'rgb(94,114,288,0.2)');
            gradientStroke1.addColorStop(0.2,'rgb(77,72,176,0.0)');
            gradientStroke1.addColorStop(0,'rgb(94,114,288,0)');

            var myChart = new Chart(ctx2,{
                type: "line",
                data: {
                    labels : labelsText,
                    datasets :[{
                        label : "Total Projects",
                        tension: 0.4,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [5,4,8,15,6,13,30],
                        maxBarThickness: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRation: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: "#0a47a9",
                            titleColor: "#ffffff"
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid:{
                                drawBorder:false,
                                display:true,
                                drawOnChartArea:true,
                                drawTicks: false,
                                borderDash: [5,5]
                            },
                            tricks: {
                                display: true,
                                padding: 10,
                                color: '#b2b9bf',
                                font: {
                                    size:11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                }
                            }
                        },
                        x: {
                            grid:{
                                drawBorder:false,
                                display:true,
                                drawONChartArea:true,
                                drawTicks: false,
                                borderDash: [5,5]
                            },
                            tricks: {
                                display: true,
                                padding: 10,
                                color: '#b2b9bf',
                                font: {
                                    size:11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                }
                            }
                        }
                    }
                }
            });
    </script>
    </body>
</html>