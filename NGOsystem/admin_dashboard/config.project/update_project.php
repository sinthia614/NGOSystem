<?php
$conn = new mysqli('localhost','root','','ngosystem');

$id = $_POST['id'];
$project_name = $_POST['project_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$budget = $_POST['budget'];
$status = $_POST['status'];
$progress = $_POST['progress'];

$stmt = $conn->prepare("UPDATE projects SET project_name=?,start_date=?,end_date=?,budget=?,status=?,progress=? WHERE id=?");
$stmt->bind_param("sssssii",$project_name,$start_date,$end_date,$budget,$status,$progress,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/project.php");
?>