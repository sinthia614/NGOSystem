<?php
session_start();

$conn = new mysqli('localhost','root','','ngosystem');
$updated_by = $_SESSION['admin_username'];

$id = $_POST['id'];
$project = $_POST['project'];
$beneficiary = $_POST['beneficiary'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$date = $_POST['date'];

$stmt = $conn->prepare("UPDATE distribution SET project=?,beneficiary=?,item=?,quantity=?,date=?,
        updated_at=NOW(),
        updated_by=? WHERE id=?");
$stmt->bind_param("ssssssi",$project,$beneficiary,$item,$quantity,$date,
    $updated_by,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/distribution.php");
exit();
?>