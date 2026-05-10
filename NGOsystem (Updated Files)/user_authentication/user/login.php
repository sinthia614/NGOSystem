<?php
session_start();

$conn = new mysqli('localhost','root','','ngosystem');

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Find admin by username
    $stmt = $conn->prepare(
        "SELECT * FROM user WHERE username=?"
    );

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        // Check password
        if($password == $user['password']){

            // Save session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_username'] = $user['username'];

            // Redirect
            header("Location: /NGOsystem/NGO page/ngo_page.php");
            exit();

        } else {

            $error = "Wrong password";

        }

    } else {

        $error = "Admin not found";

    }

    $stmt->close();
}
?>


<?php include 'header.php' ?>

        <!-- login sec -->
<div class="align-items-center py-4">

    <main class="col-4 form-login m-auto"> 

        <form method="POST" class="p-5 rounded-4 formBox"> 
            
            <h1 class="h3 mb-3 fw-normal mt-3">
                User Log-In
            </h1> 

            <!-- Username -->
            <div class="form-floating"> 

                <input type="text"
                       name="username"
                       class="form-control mt-3"
                       id="floatingInput"
                       placeholder="Username"
                       required> 

                <label for="floatingInput">
                    Username
                </label> 

            </div> 

            <!-- Password -->
            <div class="form-floating"> 

                <input type="password"
                       name="password"
                       class="form-control mt-3"
                       id="floatingPassword"
                       placeholder="Password"
                       required> 

                <label for="floatingPassword">
                    Password
                </label> 

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

            <!-- Error Message -->
            <?php if(isset($error)){ ?>
                <p class="text-danger">
                    <?php echo $error; ?>
                </p>
            <?php } ?>

            <!-- Login Button -->
            <button class="btn btn-primary w-100 py-2"
                    type="submit">

                Sign In

            </button> 

            <p class="text-center text-muted mt-3 mb-0">

                Forgot Password? 

                <a href="#"
                   class="fw-bold text-body">

                    <u>Click here</u>

                </a>

            </p>

        </form> 

    </main>

</div>

<?php include 'footer.php'?>