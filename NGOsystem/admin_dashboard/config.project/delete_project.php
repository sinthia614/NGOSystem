<?php
$conn = new mysqli('localhost','root','','ngosystem');

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM projects WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/project.php");
?>