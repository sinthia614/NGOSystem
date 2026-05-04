<!DOCTYPE html>
<html>
    <head>
        <title>NGO System Login</title>
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
            <form> 
                
                <h1 class="h3 mb-3 fw-normal mt-3">Please Sign-In</h1> 
                <div class="form-floating"> 
                    <input type="text" class="form-control mt-3" id="floatingInput" placeholder="name@example.com"> 
                    <label for="floatingInput">Username</label> 
                </div> 
                <div class="form-floating"> 
                    <input type="password" class="form-control mt-3" id="floatingPassword" placeholder="Password"> 
                    <label for="floatingPassword">Password</label> 
                </div> 
                <div class="form-check text-start my-3"> 
                    <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> 
                    <label class="form-check-label" for="checkDefault">Remember me </label> 
                </div> 
                <button class="btn btn-primary w-100 py-2" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sign in</button> 
                
                <p class="text-center text-muted mt-2 mb-0">Forgot Password? <a href="#!"
                    class="fw-bold text-body"><u>Click here</u></a></p>
            </form> 
            
        </main>
        </div>

        <!--float captcha-->
        <div class="modal fade" onload="createCaptcha()" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Captcha Verification!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
        <!--captcha-->
                <div class="text-center" >
                <div class="container captcha" >
            <div class="container captcha-input">
                <div style="width:100%; display: flex; justify-content: space-between;">
                    <div id="captcha"><canvas id="captcha" class="captcha-box" width="100" height="30"></canvas>
                    </div>
                    <button class="btn btn-primary regenerateCaptchaBtn captcha-btn-top" onclick="createCaptcha()">
                        Click here
                    </button>
                </div>
                <input type="text" class=" captcha-input-txt" placeholder="Enter Captcha" id="cpatchaTextBox" />
                <button class="btn btn-primary captcha-btn" onclick="validateCaptcha()">Submit</button>
        </div>

            </div>
            </div>
            </div>
            </div>
        </div>
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

    <script>
        var code;

function createCaptcha() {
    
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {

    
        var index = Math.floor(Math.random() * charsArray.length + 1); 
        
        if (captcha.indexOf(charsArray[index]) == -1)
            captcha.push(charsArray[index]);
        else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);
    
    code = captcha.join("");
    document.getElementById("captcha").appendChild(canv); 
}

function validateCaptcha() {
    event.preventDefault();
    debugger
    if (document.getElementById("cpatchaTextBox").value == code) {
        alert("Valid Captcha")
        window.location.href = "/NGOsystem/NGO page/ngo_page.php";
    } else {
        alert("Invalid Captcha. try Again");
        createCaptcha();
    }
        
}

    </script>
    </body>
</html>
