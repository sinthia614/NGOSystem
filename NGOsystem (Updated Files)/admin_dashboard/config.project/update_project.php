<?php
session_start();

$conn = new mysqli('localhost','root','','ngosystem');

$updated_by = $_SESSION['admin_username'];

$id = $_POST['id'];
$project_name = $_POST['project_name'];
$category = $_POST['category'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$budget = $_POST['budget'];
$status = $_POST['status'];
$progress = $_POST['progress'];

$stmt = $conn->prepare("UPDATE projects SET project_name=?,category=?,start_date=?,end_date=?,budget=?,status=?,progress=?,
        updated_at=NOW(),
        updated_by=? WHERE id=?");
$stmt->bind_param("sssssssii",$project_name,$category,$start_date,$end_date,$budget,$status,$progress,
    $updated_by,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/project.php");
exit();
?>