<?php
$conn = new mysqli('localhost','root','','ngosystem');

$project = $_POST['project'];
$beneficiary = $_POST['beneficiary'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$date = $_POST['date'];

$stmt = $conn->prepare("INSERT INTO distribution (project,beneficiary,item,quantity,date) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$project,$beneficiary,$item,$quantity,$date);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/distribution.php");
?>