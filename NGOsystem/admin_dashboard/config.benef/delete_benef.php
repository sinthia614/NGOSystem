<?php
$conn = new mysqli('localhost','root','','ngosystem');

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM beneficiaries WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/beneficiary.php");
?>