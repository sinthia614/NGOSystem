<?php
$conn = new mysqli('localhost','root','','ngosystem');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$join = $_POST['join_date'];
$role = $_POST['role'];

$stmt = $conn->prepare("INSERT INTO member(name,email,phone,join_date,role) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$name,$email,$phone,$join,$role);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/members.php");
?>