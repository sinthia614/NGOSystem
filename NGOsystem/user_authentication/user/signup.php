

<!DOCTYPE html>
<html>
    <head>
        <title>NGO System Sign-up</title>
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
                        

                        

                    </ul>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> <input type="search" class="form-control form-control" placeholder="Search..." aria-label="Search"> </form>
                    <button type="button" class="btn btn-outline-primary me-2"> <a class="btnlogin" href="/NGOsystem/user_authentication/user/login.php">Login</a></button>
                    <button type="button" class="btn btn-primary"><a class="btnsignup" href="/NGOsystem/user_authentication/user/signup.php">Sign-up</a></button>
                </div>
            </div>
        </nav>

    <div class="align-items-center py-4 bg-body-tertiary">
        <main class="col-4 form-login m-auto"> 
            <form action="/NGOsystem/config/database.php" method="post"> 
                
                <h1 class="h3 mb-3 fw-normal mt-3">Please Sign-Up</h1>
                
                <div class="form-floating"> 
                    <input type="text" class="form-control mt-3" id="floatingInput" placeholder="username" name="username"> 
                    <label for="floatingInput">Username</label> 
                </div> 
                <div class="form-floating"> 
                    <input type="email" class="form-control mt-3" id="floatingInput" placeholder="name@example.com" name="email"> 
                    <label for="floatingInput">Email address</label> 
                </div> 
                <div class="form-floating"> 
                    <input type="password" class="form-control mt-3" id="floatingPassword" placeholder="Password" name="password"> 
                    <label for="floatingPassword">Password</label> 
                </div> 
                <div class="form-floating">
                  <input type="password"class="form-control mt-3" id="floatingPassword" placeholder="Confirm Password"/>
                  <label class="form-label" for="floatingPassword">Confirm password</label>
                </div>
                <div class="form-check text-start mt-3">
                  <input class="form-check-input me-3" type="checkbox" value="" id="checkDefault" />
                  <label class="form-check-label" for="checkDefault">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign Up</button> 
                <p class="text-center text-muted mt-2 mb-0">Already have an account? <a href="#!"
                    class="fw-bold text-body"><u>Sign-in here</u></a></p>
            </form> 
            
        </main>
        </div>

                <!-- Footer-->

        <section id="footer">
            <img src="/NGOsystem/asset/image/landing_page/wave2.png" class="footer-img"> 
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>
