<?php

$conn = new mysqli("localhost", "root", "", "ngosystem");

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "INSERT INTO user (username, email, password) 
         VALUES (?, ?, ?)"
    );
    $stmt->bind_param(
        "sss",
        $username,
        $email,
        $password
    );

    if($stmt->execute()){
        echo "<script>alert('Admin registered successfully!');</script>";
        header("Location: /NGOsystem/NGO page/ngo_page");
            exit();
    }else{
        echo "<script>alert('Registration failed!');</script>";
    }

    $stmt->close();
}

?>

<?php include 'header.php' ?>

    <div class="align-items-center py-4">
        <main class="col-4 form-login m-auto"> 
            <form method="POST" class="p-5 rounded-4 formBox">

    <h1 class="h3 mb-3 fw-normal mt-3">User Sign Up</h1> 

    <div class="form-floating"> 
        <input type="text" 
               name="username"
               class="form-control mt-3"
               placeholder="Username"
               required> 

        <label>Username</label> 
    </div> 

    <div class="form-floating"> 
        <input type="email"
               name="email" 
               class="form-control mt-3"
               placeholder="Email"
               required> 

        <label>Email address</label> 
    </div> 

    <div class="form-floating"> 
        <input type="password"
               name="password"
               class="form-control mt-3"
               placeholder="Password"
               required> 

        <label>Password</label> 
    </div> 
        <div class="form-floating"> 
        <input type="password"
               name="password"
               class="form-control mt-3"
               placeholder="Password"
               required> 

        <label>Confirm Password</label> 
    </div> 
            <!-- Remember -->
            <div class="form-check text-start my-3"> 

                <input class="form-check-input"
                       type="checkbox"
                       id="checkDefault"> 

                <label class="form-check-label"
                       for="checkDefault">

                    Remember me

                </label> 

            </div> 
    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">
        Sign Up
    </button>
        <p class="text-center text-muted mt-2 mb-0">Already have an account? <a href="/NGOsystem/user_authentication/user/login.php"
        class="fw-bold text-body"><u>Sign-in here</u></a></p>

</form>
            
        </main>
        </div>
<?php include 'footer.php'?>