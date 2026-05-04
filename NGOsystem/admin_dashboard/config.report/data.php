<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ngosystem";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT 
        SUM(total_donation) AS total_donation,
        SUM(total_expense) AS total_expense,
        SUM(balance) AS balance
        FROM reports";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Return JSON
echo json_encode([
    "total_donation" => (int)$row['total_donation'],
    "total_expense"  => (int)$row['total_expense'],
    "balance"        => (int)$row['balance']
]);

$conn->close();
?>