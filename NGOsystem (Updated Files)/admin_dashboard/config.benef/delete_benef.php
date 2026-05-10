<?php
$conn = new mysqli('localhost','root','','ngosystem');

$deleted_by = $_SESSION['admin_username'];
$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM beneficiaries WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/beneficiary.php");
?>