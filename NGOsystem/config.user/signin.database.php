<?php
session_start();


$conn = new mysqli('localhost', 'root', '', 'ngosystem');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();


    if (password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: /NGOsystem/NGO page/ngo_page.php");
        exit();

    } else {
        echo "Wrong password!";
    }

} else {
    echo "User not found!";
}

$stmt->close();
$conn->close();
?>