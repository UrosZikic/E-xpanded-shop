<?php
// Include database connection
include 'connection.php';

// Query to fetch data
$query = "SELECT * FROM `products_regular`";
$result_products = $conn->query($query);

// Convert data to JSON format
$data = array();
while ($row = mysqli_fetch_assoc($result_products)) {
  $data[] = $row;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($data);
