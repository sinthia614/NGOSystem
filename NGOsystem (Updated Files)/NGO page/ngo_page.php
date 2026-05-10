<?php
$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$member_result = $conn->query(
    "SELECT * FROM member ORDER BY id ASC"
);

$donor_result = $conn->query(
    "SELECT * FROM donor ORDER BY id ASC"
);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>NGO System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/NGOsystem/asset/css/style.css?v=2">
        <link rel="stylesheet" href="/NGOsystem/asset/css/ngopage.css?v=2">
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
                            <p class=" fs-4 fw-bold">Trusted by Millions! Our NGO aims to help people in need</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Details about ngo-->
        <div class="container-md">
            <article class="blog-post"> 
                <h2 class="display-5 link-body-emphasis mb-1 pt-5">NGO Details</h2> 
                <p>Our mission is to empower people and communities in situations of poverty, illiteracy, disease and social injustice. Our interventions aim to achieve large scale, positive changes through economic and social programmes that enable women and men to realise their potential.</p> 
                <div>HopeBridge NGO is global leader in pioneering and scaling proven solutions to poverty and inequality. Founded in 1972 in post-war Bangladesh as a small relief effort, we are now the world’s largest southern-led development organisation. Our entrepreneurial, solutions-focused model of service delivery and systems change operates across Asia and Africa and has reached over 145 million people.</div><hr> 
                <p><b>Objective :</b> Integrity is one of our first core values and a foundation for others. With great passion, hard work, honesty, and unity, comes integrity.</p> 
                
            </article>
        </div>
        


<!-- Member Gallery -->
<!-- Team Members Section -->

<div class="container py-5 mt-5">

    <h2 class="display-5 text-center">
        Our Team Members
    </h2>

    <div id="memberCarousel"
         class="carousel slide"
         data-bs-ride="carousel">

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">

                <div class="row justify-content-center g-4">

                    <!-- Member 1 -->
                    <div class="col-md-4 text-center">

                        <div class="member-card p-4 shadow rounded-4">

                            <img src="/NGOsystem/asset/image/member/member1.jpg"
                                 class="member-img mb-3">

                            <h5 class="mb-1">
                                Rahim Hasan
                            </h5>

                            <p class="text-muted">
                                Founder & Director
                            </p>

                        </div>

                    </div>

                    <!-- Member 2 -->
                    <div class="col-md-4 text-center">

                        <div class="member-card p-4 shadow rounded-4">

                            <img src="/NGOsystem/asset/image/member/member2.jpg"
                                 class="member-img mb-3">

                            <h5 class="mb-1">
                                Sarah Ahmed
                            </h5>

                            <p class="text-muted">
                                Project Manager
                            </p>

                        </div>

                    </div>

                    <!-- Member 3 -->
                    <div class="col-md-4 text-center">

                        <div class="member-card p-4 shadow rounded-4">

                            <img src="/NGOsystem/asset/image/member/member3.jpg"
                                 class="member-img mb-3">

                            <h5 class="mb-1">
                                Fahim Noor
                            </h5>

                            <p class="text-muted">
                                Volunteer Coordinator
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">

                <div class="row justify-content-center g-4">

                    <!-- Member 4 -->
                    <div class="col-md-4 text-center">

                        <div class="member-card p-4 shadow rounded-4">

                            <img src="/NGOsystem/asset/image/member/member4.jpg"
                                 class="member-img mb-3">

                            <h5 class="mb-1">
                                Tanvir Islam
                            </h5>

                            <p class="text-muted">
                                Finance Officer
                            </p>

                        </div>

                    </div>

                    <!-- Member 5 -->
                    <div class="col-md-4 text-center">

                        <div class="member-card p-4 shadow rounded-4">

                            <img src="/NGOsystem/asset/image/member/member5.jpg"
                                 class="member-img mb-3">

                            <h5 class="mb-1">
                                Nusrat Jahan
                            </h5>

                            <p class="text-muted">
                                Medical Support Lead
                            </p>

                        </div>

                    </div>

                    <!-- Member 6 -->
                    <div class="col-md-4 text-center">

                        <div class="member-card p-4 shadow rounded-4">

                            <img src="/NGOsystem/asset/image/member/member6.jpg"
                                 class="member-img mb-3">

                            <h5 class="mb-1">
                                Arif Khan
                            </h5>

                            <p class="text-muted">
                                Field Supervisor
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Previous Button -->
        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#memberCarousel"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3">
            </span>

        </button>

        <!-- Next Button -->
        <button class="carousel-control-next"
                type="button"
                data-bs-target="#memberCarousel"
                data-bs-slide="next">

            <span class="carousel-control-next-icon bg-dark rounded-circle p-3">
            </span>

        </button>

    </div>

</div>

        <!--Beneficiary info-->

<div class="container py-4 mt-5">

    <h2 class="display-5 text-center link-body-emphasis mb-1 pt-5">
        Beneficiaries
    </h2>

    <div class="p-4 rounded-3">

        <div id="beneficiaryCarousel" class="carousel slide " data-bs-ride="carousel">

            <div class="p-4 carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="image-box">
                                <img src="/NGOsystem/asset/image/ngopage/ngoimg01.jpg"
                                     class="img-fluid rounded-4 shadow w-100">
                                     <div class="overlay-text">
                                        Education aid Program 2022
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="image-box">
                                <img src="/NGOsystem/asset/image/ngopage/ngoimg02.jpg"
                                     class="img-fluid rounded-4 shadow w-100">
                                     <div class="overlay-text">
                                        Food distribution Program 2023
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="image-box">
                                <img src="/NGOsystem/asset/image/ngopage/ngoimg03.jpg"
                                     class="img-fluid rounded-4 shadow w-100">
                                     <div class="overlay-text">
                                        Relief support Program 2021
                                    </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="image-box">
                                <img src="/NGOsystem/asset/image/ngopage/ngoimg04.jpg"
                                     class="img-fluid rounded-4 shadow w-100">
                                     <div class="overlay-text">
                                        Food distribution Program 2024
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="image-box">
                                <img src="/NGOsystem/asset/image/ngopage/ngoimg05.jpg"
                                     class="img-fluid rounded-4 shadow w-100">
                                     <div class="overlay-text">
                                        Medical aid Program 2025
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="image-box">
                                <img src="/NGOsystem/asset/image/ngopage/ngoimg06.jpg"
                                     class="img-fluid rounded-4 shadow w-100">
                                     <div class="overlay-text">
                                        Shelter support Program 2026
                                    </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Previous Button -->
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#beneficiaryCarousel"
                    data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>

            <!-- Next Button -->
            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#beneficiaryCarousel"
                    data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </div>

</div>

<!--Donor info-->
<div class="text-center">    
    <h2 class="display-5 link-body-emphasis mb-1 pt-5">Donations by our Trusted Clients</h2>
</div>
<div class="donation-section">

    <canvas id="pieChart" width="500" height="500"></canvas>

    <div class="trust-panel">
        <h2>OUR IMPACT</h2>

        <p>
            Donors continue supporting our NGO because we maintain
            complete transparency in fund management and project execution.
        </p>

        <div class="impact-item">
            <h1>500+</h1>
            <span>Active Donors</span>
        </div>

        <div class="impact-item">
            <h1>95%</h1>
            <span>Trust Rating</span>
        </div>

        <div class="impact-item">
            <h1>50+</h1>
            <span>Projects Completed</span>
        </div>
    </div>

</div>


<!-- projects -->
 <div class="text-center">    
    <h2 class="display-5 link-body-emphasis mb-1 pt-5">Featured Projects</h2>
</div>
<div class="container mt-5">

    <div class="row mb-2">

        <!-- Card 1 -->
        <div class="col-md-6 ">

            <div class="row g-0 border rounded overflow-hidden shadow-sm mb-4 project-card">

                <!-- Text Section -->
                <div class="col p-4 d-flex flex-column">

                    <strong class="d-inline-block mb-2 text-primary">
                        HopeBridge NGO
                    </strong>

                    <h3 class="mb-0">
                        Relocate Shelter Fund Project
                    </h3>

                    <div class="mb-1 text-body-secondary">
                        12 Nov 2022
                    </div>

                    <p class="card-text mb-auto">
                        We have successfully supported homeless and displaced individuals by providing emergency shelter assistance and financial aid to help them secure safe and stable living conditions.
                    </p>

                    <a href="#" class="text-decoration-none">
                        Continue reading
                    </a>

                </div>

                <!-- Image Section -->
                <div class="col-auto">

                    <img src="/NGOsystem/asset/image/ngopage/ngoimg03.jpg"
                         alt="thumbnail"
                         style="width:200px; height:250px; object-fit:cover;">

                </div>

            </div>

        </div>

        <!-- Card 2 -->
        <div class="col-md-6 ">

            <div class="row g-0 border rounded overflow-hidden shadow-sm mb-4 project-card">

                <!-- Text Section -->
                <div class="col p-4 d-flex flex-column">

                    <strong class="d-inline-block mb-2 text-primary">
                        HopeBridge NGO
                    </strong>

                    <h3 class="mb-0">
                        Food Distrubution Project
                    </h3>

                    <div class="mb-1 text-body-secondary">
                        13 Feb 2023
                    </div>

                    <p class="card-text mb-auto">
                        Our organization has distributed food packages to vulnerable communities, ensuring regular access to nutritious meals for hundreds of families during times of need.
                    </p>

                    <a href="#" class="text-decoration-none">
                        Continue reading
                    </a>

                </div>

                <!-- Image Section -->
                <div class="col-auto">

                    <img src="/NGOsystem/asset/image/ngopage/ngoimg02.jpg"
                         alt="thumbnail"
                         style="width:200px; height:250px; object-fit:cover;">

                </div>

            </div>

        </div>
        <!-- Card 3 -->
        <div class="col-md-6 ">

            <div class="row g-0 border rounded overflow-hidden shadow-sm mb-4 project-card">

                <!-- Text Section -->
                <div class="col p-4 d-flex flex-column">

                    <strong class="d-inline-block mb-2 text-primary">
                        HopeBridge NGO
                    </strong>

                    <h3 class="mb-0">
                        Financial support Project
                    </h3>

                    <div class="mb-1 text-body-secondary">
                        30 Sep 2021
                    </div>

                    <p class="card-text mb-auto">
                        We have completed financial assistance programs for low-income families, helping them manage essential needs such as medical treatment, education costs, and urgent household expenses.
                    </p>

                    <a href="#" class="text-decoration-none">
                        Continue reading
                    </a>

                </div>

                <!-- Image Section -->
                <div class="col-auto">

                    <img src="/NGOsystem/asset/image/ngopage/ngoimg06.jpg"
                         alt="thumbnail"
                         style="width:200px; height:250px; object-fit:cover;">

                </div>

            </div>

        </div>

        <!-- Card 4 -->
        <div class="col-md-6">

            <div class="row g-0 border rounded overflow-hidden shadow-sm mb-4 project-card">

                <!-- Text Section -->
                <div class="col p-4 d-flex flex-column">

                    <strong class="d-inline-block mb-2 text-primary">
                        HopeBridge NGO
                    </strong>

                    <h3 class="mb-0">
                        Free Child Education Project
                    </h3>

                    <div class="mb-1 text-body-secondary">
                        22 June 2025
                    </div>

                    <p class="card-text mb-auto">
                        Successfully provided free education support to underprivileged children, including school admission, learning materials, and tutoring, ensuring continuous academic progress.
                    </p>

                    <a href="#" class="text-decoration-none">
                        Continue reading
                    </a>

                </div>

                <!-- Image Section -->
                <div class="col-auto">

                    <img src="/NGOsystem/asset/image/ngopage/ngoimg01.jpg"
                         alt="thumbnail"
                         style="width:200px; height:250px; object-fit:cover;">

                </div>

            </div>

        </div>

    </div>

</div>
<!-- projects -->


        <!--Report info-->

        <!--Graph-->
        <div class="container-md px-md-4 mb-5 pt-5 pb-5">
            <h2 class="display-5 link-body-emphasis mb-1 pt-5 text-center">Projects Done Each Year</h2>
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
                            <section id="ftsocial">
            <div class="container text-center pb-4">
                <h5><b>Social Media</b></h5>
            <div class="justify-content-center">
                <a class="social-icon p-1 mb-1" href="https://www.facebook.com/Sinthia614/">
                    <img src="/NGOsystem/asset/image/social/fb32.png" alt="img">
                </a>
                <a class="social-icon p-1 mb-1" href="https://www.instagram.com/sinthia_614/">
                <img src="/NGOsystem/asset/image/social/insta32.png" alt="">
                </a>
                <a class="social-icon p-1 mb-1" href="https://x.com/sinthia_614"> 
                    <img src="/NGOsystem/asset/image/social/twitter32.png" alt="">
                </a>
            </div>
               

            </div>
        </section>
                </div> 
                </div>
        <p><b>DEVELOPED by CyberOrg.</b></p>
            </div>            
            </div>            
        </section>

        





    <script src="/NGOsystem/asset/js/javascript.js"></script>
    <script src="/NGOsystem/asset/js/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>

fetch("/NGOsystem/admin_dashboard/config.project/project_data.php")
.then(response => response.json())
.then(chartData => {

    var ctx2 = document.getElementById('line-chart-gradient').getContext('2d');

    var gradientStroke1 = ctx2.createLinearGradient(0,230,0,50);

    gradientStroke1.addColorStop(1,'rgba(94,114,228,0.2)');
    gradientStroke1.addColorStop(0.2,'rgba(77,72,176,0.0)');
    gradientStroke1.addColorStop(0,'rgba(94,114,228,0)');

    new Chart(ctx2,{
        type: "line",

        data: {
            labels: chartData.years,

            datasets: [{
                label: "Completed Projects",
                data: chartData.projects,

                tension: 0.4,
                borderWidth: 3,
                pointRadius: 4,
                fill: true,
                backgroundColor: gradientStroke1,
                borderColor: "#2c46dd"
            }]
        },

        options: {
            responsive: true
        }

    });

})
.catch(error => console.log(error));

</script>

    
<script>
document.addEventListener("DOMContentLoaded", function () {

    fetch("/NGOsystem/admin_dashboard/config.donor/donor_data.php")
    .then(response => response.json())
    .then(data => {

        const ctx = document.getElementById("pieChart");
new Chart(ctx, {
    type: "pie",

    data: {
        labels: data.labels,

        datasets: [{
            data: data.donations,

            backgroundColor: [
                "#ff6384",
                "#36a2eb",
                "#ffce56",
                "#4bc0c0",
                "#9966ff",
                "#ff9f40"
            ],

            borderWidth: 1
        }]
    },

    options: {
        responsive: false,

        plugins: {
            legend: {
                display: false
            },
                    tooltip: {
            callbacks: {
                label: function(context) {
                    return context.label;
                }
            }
        }

        }
    }
    
});
    })
    .catch(error => {
        console.log(error);
    });

});
</script>
    </body>
</html>