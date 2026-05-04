<?php
$conn = new mysqli('localhost','root','','ngosystem');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$join = $_POST['join_date'];
$role = $_POST['role'];

$stmt = $conn->prepare("UPDATE member SET name=?,email=?,phone=?,join_date=?,role=? WHERE id=?");
$stmt->bind_param("sssssi",$name,$email,$phone,$join,$role,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/members.php");
?>