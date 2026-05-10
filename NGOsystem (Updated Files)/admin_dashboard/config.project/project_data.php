<?php

$conn = new mysqli("localhost", "root", "", "ngosystem");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT 
        YEAR(end_date) as year,
        COUNT(id) as total_projects
    FROM projects
    WHERE end_date IS NOT NULL
    GROUP BY YEAR(end_date)
    ORDER BY YEAR(end_date) ASC
";

$result = $conn->query($sql);

$years = array();
$projects = array();

while($row = $result->fetch_assoc()){
    $years[] = $row['year'];
    $projects[] = $row['total_projects'];
}

$data = array(
    "years" => $years,
    "projects" => $projects
);

header("Content-Type: application/json");
echo json_encode($data);

$conn->close();

?>