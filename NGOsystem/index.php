
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
                                <li><a class="dropdown-item" href="/NGOsystem/NGO page/ngo_page.php">HopeBridge NGO</a></li>
                                <li><a class="dropdown-item" href="#">Wellfare NGO</a></li>
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
                            <a class="nav-link" aria-current="page" href="/NGOsystem/user_authentication/user/signup.php">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/NGOsystem/user_authentication/admin/admin.reg.php">Admin</a>
                        </li>

                        

                    </ul>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> <input type="search" class="form-control form-control" placeholder="Search..." aria-label="Search"> </form>
                    <button type="button" class="btn btn-outline-primary me-2"> <a class="btnlogin" href="/NGOsystem/user_authentication/user/login.php">Login</a></button>
                    <button type="button" class="btn btn-primary"><a class="btnsignup" href="/NGOsystem/user_authentication/user/signup.php">Sign-up</a></button>
                </div>
            </div>
        </nav>

        <!--Landing Page-->
        <div id="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="promo-title"><b>Looking for a <br> <b class="banner-sec-text">Digital System</b> to manage your NGO?</b></p>
                        <p class="promo-details">Now you can easily Personalize & Track your Data as your want with the help of our System!</p>
                        <div class="d-grid gap-2 col-6">
                            <button class="btn btn-outline-primary" type="button" href="/NGOsystem/user_authentication/user/signup.php">Get Started Here!</button>
                        </div>
                        
                    </div>
                    <div class="col-md-6 text-center"><img src="asset/image/landing_page/banner2.png" class="img-fluid" ></div>
                </div>
            </div>
            <img src="asset/image/landing_page/wave1.png" class="bottom-img">
        </div>



        <!--card section-->
        <div class="container py-4"> 

            <!-- 1st Card slot-->
            <div class="p-5 mb-4 bg-body-tertiary rounded-3"> 
                <div class="container-fluid py-2 pl-5"> <img src="/NGOsystem/asset/image/cards/card1.jpg" alt="" class="float-end rounded-4" height="270px">
                    <h1 class="display-6 fw-bold">Manage Your NGO <br> Efficiently and Quickly!</h1> 
                        <p class="col-md-8 fs-4 pl-5">From donor management to project tracking and financial reporting, NGO System provides a powerful platform to digitize and simplify NGO operations.</p> 
                        
                    <button class="btn btn-primary btn-lg" type="button">Learn More</button> 
                </div> 
            </div> 

            <!--Our Services-->
            <div id="service" class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center"><img src="/NGOsystem/asset/image/landing_page/network.png" class="img-fluid" >
                </div>

                    <div class="col-md-6 text-center">
                        <ul class="list-unstyled text-small">
                            <li><h1>Our Services</h1></li>
                            <li class="pt-2" style="text-align: justify;">The system helps prevent duplicate support by checking beneficiary history before distributing aid, reducing misuse and ensuring fair distribution.</li><hr>
                            <li class="pt-2" style="text-align: justify;">Track donations, expenses, and project budgets instantly with structured financial records and summaries.</li><hr>
                            <li class="pt-2" style="text-align: justify;">Manage volunteer information, assign tasks, and track participation in different projects.</li><hr>
                            <li class="pt-2" style="text-align: justify;">Access the system from anywhere and expand it as the organization grows without changing infrastructure.</li>
                        </ul>
                        </div>
                        
                    </div>

                </div>
            </div>

        <!--Accordion section-->
            <div class="accordion pt-5" id="accordionExample">
                <!--Accordion 1-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h3>Members & Committee Management</h3>
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Easily manage executive members, assign roles, record meetings, and maintain structured organizational information in one centralized system. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div> 

                    </div>
                </div>

                <!--Accordion 2-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h3>Donor & Donation Management</h3>
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Track donors, record donations, generate receipts, and maintain a complete history of financial contributions with automated reporting. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>

                <!--Accordion 3-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h3>Beneficiary Management</h3>
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Register and verify beneficiaries, maintain family information, track previous assistance, and ensure fair and transparent aid distribution. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>

                <!--Accordion 4-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h3>Relief Distribution Management</h3>
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Efficiently manage aid distribution including food, cash, medical, and educational support while preventing duplicate assistance. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>

                <!--Accordion 5-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <h3>Project Management</h3>
                    </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Plan, monitor, and track NGO projects with budgets, timelines, responsible teams, and progress tracking for better project oversight. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>

                <!--Accordion 6-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <h3>Financial & Expense Tracking</h3>
                    </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Record organizational expenses, track financial activities, and generate accurate financial reports to support accountability and audits. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>

                <!--Accordion 7-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <h3>Volunteer Management</h3>
                    </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Register volunteers, assign tasks, track participation, and coordinate volunteer activities effectively. 
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>

                <!--Accordion 8-->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <h3>Reports & Transparency</h3>
                    </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body m-3">
                        Generate detailed reports including donor reports, beneficiary lists, project summaries, and financial statements to maintain transparency.
                        <div><button type="button" class="btn btn-success mt-2">Click Here!</button></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>




        </div>

        <!-- About Us-->
        <div class="p-5 text-center bg-body-tertiary"> 
            <div class="container py-5"> 
                <h1 class="text-body-emphasis">About Us</h1> 
                <p class="col-lg-8 mx-auto lead"> Our NGO management platform designed to help nonprofit organizations manage their operations efficiently and transparently. Our system brings together donor management, beneficiary tracking, project monitoring, volunteer coordination, and financial reporting into a single, centralized solution.</p> 
                <p class="col-lg-8 mx-auto lead">We aim to reduce manual work and improve accountability by providing a structured digital system for managing humanitarian activities.</p>
            </div> 
        </div>

        <!-- Social Media -->

        <section id="social" class="bg-body-tertiary">
            <div class="container text-center pb-5">
                <h1>Find Us On Social Media</h1>
            <div class="container"></div>
                <ul class="list-unstyled ps-0"> 
            <li> 
                <a class="icon-link mb-1" href="#" rel="noopener" target="_blank"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>facebook.com/ngosystem
                </a> 
            </li> 
            <li> 
                <a class="icon-link mb-1" href="#" rel="noopener" target="_blank"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                    </svg>linkedin.com/ngosystem
                </a> 
            </li> 
            <li> 
                <a class="icon-link mb-1" href="#" rel="noopener" target="_blank"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>instagram.com/ngosystem
                </a> 
            </li> 
        </ul>

            </div>
        </section>
        


        <!-- Footer-->

        <section id="footer">
            <img src="asset/image/landing_page/wave2.png" class="footer-img"> 
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



        <!--javascript-->
    <script src="asset/js/javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>