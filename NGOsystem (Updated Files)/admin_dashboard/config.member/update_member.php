<?php

session_start();

$conn = new mysqli('localhost','root','','ngosystem');

$updated_by = $_SESSION['admin_username'];

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$join = $_POST['join_date'];
$role = $_POST['role'];

// Update member + audit fields
$stmt = $conn->prepare(
    "UPDATE member 
     SET 
        name=?,
        email=?,
        phone=?,
        join_date=?,
        role=?,
        updated_at=NOW(),
        updated_by=?
     WHERE id=?"
);

$stmt->bind_param(
    "ssssssi",
    $name,
    $email,
    $phone,
    $join,
    $role,
    $updated_by,
    $id
);

$stmt->execute();

header("Location: /NGOsystem/admin_dashboard/members.php");
exit();

?>