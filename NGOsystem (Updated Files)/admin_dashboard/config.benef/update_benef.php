<?php

session_start();

$conn = new mysqli('localhost','root','','ngosystem');

$updated_by = $_SESSION['admin_username'];

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$project = $_POST['project'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE beneficiaries SET name=?,address=?,phone=?,project=?,status=?,
        updated_at=NOW(),
        updated_by=? WHERE id=?");
$stmt->bind_param("ssssssi",$name,$address,$phone,$project,$status,
    $updated_by,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/beneficiary.php");
exit();
?>