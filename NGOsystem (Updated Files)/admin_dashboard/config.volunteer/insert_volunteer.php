<?php
$conn = new mysqli('localhost','root','','ngosystem');

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$assigned_project = $_POST['assigned_project'];
$status = $_POST['status'];

$stmt = $conn->prepare("INSERT INTO volunteers (name,phone,email,assigned_project,status) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$name,$phone,$email,$assigned_project,$status);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/volunteer.php");
?>