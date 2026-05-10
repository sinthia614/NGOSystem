<?php

$conn = new mysqli("localhost", "root", "", "ngosystem");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, total_donation FROM donor ORDER BY id ASC limit 10";

$result = $conn->query($sql);

$labels = array();
$donations = array();

while($row = $result->fetch_assoc()){
    $labels[] = $row['name'];
    $donations[] = $row['total_donation'];
}

$data = array(
    "labels" => $labels,
    "donations" => $donations
);

header("Content-Type: application/json");
echo json_encode($data);

$conn->close();

?>