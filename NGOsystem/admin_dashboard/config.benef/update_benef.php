<?php
$conn = new mysqli('localhost','root','','ngosystem');

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$project = $_POST['project'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE beneficiaries SET name=?,address=?,phone=?,project=?,status=? WHERE id=?");
$stmt->bind_param("sssssi",$name,$address,$phone,$project,$status,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/beneficiary.php");
?>