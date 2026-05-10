<?php
$conn = new mysqli('localhost','root','','ngosystem');

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$project = $_POST['project'];
$status = $_POST['status'];

$stmt = $conn->prepare("INSERT INTO beneficiaries(name,address,phone,project,status) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$name,$address,$phone,$project,$status);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/beneficiary.php");
?>