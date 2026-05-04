<?php
$conn = new mysqli('localhost','root','','ngosystem');

$project_name = $_POST['project_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$budget = $_POST['budget'];
$status = $_POST['status'];
$progress = $_POST['progress'];

$stmt = $conn->prepare("INSERT INTO projects(project_name,start_date,end_date,budget,status, progress) VALUES(?,?,?,?,?,?)");
$stmt->bind_param("sssssi",$project_name,$start_date,$end_date,$budget,$status,$progress);
$stmt->execute();


header("Location: /NGOsystem/admin_dashboard/project.php");
?>