<?php

session_start();

$conn = new mysqli('localhost','root','','ngosystem');

$updated_by = $_SESSION['admin_username'];

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$total_donation = $_POST['total_donation'];
$last_donation = $_POST['last_donation'];

$stmt = $conn->prepare("UPDATE donor SET name=?,email=?,phone=?,total_donation=?,last_donation=?,   updated_at=NOW(),updated_by=? WHERE id=?");

$stmt->bind_param("ssssssi",$name,$email,$phone,$total_donation,$last_donation,
    $updated_by,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/donor.php");
exit();
?>