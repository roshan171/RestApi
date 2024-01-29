<?php
header('content-type:application/json');
header('Access-control-Allow-origin:*');
header('Access-control-Allow-Methods:POST');
header('Access-control-Allow-Headers:Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

// Check if the required keys exist in the $data array
if (!isset($data['sname']) || !isset($data['scity']) || !isset($data['semail'])) {
    echo json_encode(array('message' => 'Invalid data format', 'status' => false));
    exit;
}

$name = $data['sname'];
$city = $data['scity'];
$email = $data['semail'];

// Include your database configuration file
include "config.php";

$sql = "INSERT INTO student(name, city, email) VALUES('{$name}', '{$city}', '{$email}')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Data Inserted', 'status' => true));
} else {
    echo json_encode(array('message' => 'Not Inserted.', 'status' => false));
}

mysqli_close($conn);
?>
