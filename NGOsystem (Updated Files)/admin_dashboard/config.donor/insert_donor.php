<?php
$conn = new mysqli('localhost','root','','ngosystem');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$total_donation = $_POST['total_donation'];
$last_donation = $_POST['last_donation'];

$stmt = $conn->prepare("INSERT INTO donor(name,email,phone,total_donation,last_donation) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$name,$email,$phone,$total_donation,$last_donation);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/donor.php");
?>