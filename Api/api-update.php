<?php
header('content-type:application/json');
header('Access-control-Allow-origin:*');
header('Access-control-Allow-Methods:PUT');
header('Access-control-Allow-Headers:Content-type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Include your database configuration file
include "config.php";

// Assuming you have a parameter in the URL for the record ID, e.g., ?id=1
$recordId = isset($_GET['id']) ? $_GET['id'] : null;

// Check if the record ID is provided
if (!$recordId) {
    echo json_encode(array('message' => 'Record ID not provided', 'status' => false));
    exit;
}

// Assuming you are receiving JSON data in the request body
$data = json_decode(file_get_contents("php://input"), true);

// Check if JSON data is provided
if (!$data) {
    echo json_encode(array('message' => 'Invalid or missing data', 'status' => false));
    exit;
}

// Update the record in the database
$sql = "UPDATE student SET name = '{$data['name']}', city = '{$data['city']}', email = '{$data['email']}' WHERE id = {$recordId}";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(array('message' => 'Record updated successfully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Failed to update record', 'status' => false));
}

mysqli_close($conn);
?>
