<?php
session_start();

$conn = new mysqli('localhost','root','','ngosystem');
$updated_by = $_SESSION['admin_username'];

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$assigned_project = $_POST['assigned_project'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE volunteers SET name=?,phone=?,email=?,assigned_project=?,status=?,
        updated_at=NOW(),
        updated_by=? WHERE id=?");
$stmt->bind_param("ssssssi",$name,$phone,$email,$assigned_project,$status,
    $updated_by,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/volunteer.php");
exit();
?>