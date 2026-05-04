<?php
$conn = new mysqli('localhost','root','','ngosystem');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$total_donation = $_POST['total_donation'];
$last_donation = $_POST['last_donation'];

$stmt = $conn->prepare("UPDATE member SET name=?,email=?,phone=?,total_donation=?,last_donation=? WHERE id=?");
$stmt->bind_param("sssssi",$name,$email,$phone,$total_donation,$last_donation,$id);
$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/donor.php");
?>