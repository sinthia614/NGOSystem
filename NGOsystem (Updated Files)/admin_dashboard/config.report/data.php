<?php

$conn = new mysqli("localhost", "root", "", "ngosystem");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get latest report data
$sql = "SELECT total_donation, total_expense, balance 
        FROM reports 
        ORDER BY id DESC 
        LIMIT 1";

$result = $conn->query($sql);

$data = array();

if($result->num_rows > 0){
    
    $row = $result->fetch_assoc();

    $data = array(
        "total_donation" => $row['total_donation'],
        "total_expense" => $row['total_expense'],
        "balance" => $row['balance']
    );
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();

?>