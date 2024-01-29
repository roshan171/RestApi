<?php
header('content-type:application/json');
header('Access-control-Allow-origin:*');
header('Access-control-Allow-Methods:GET');
header('Access-control-Allow-Headers:Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Include your database configuration file
include "config.php";

// Assuming you have a parameter in the URL for the record ID, e.g., ?id=1
$recordId = isset($_GET['id']) ? $_GET['id'] : null;

// Check if the record ID is provided
if (!$recordId) {
    echo json_encode(array('message' => 'Record ID not provided', 'status' => false));
    exit;
}

$sql = "SELECT * FROM student WHERE id = {$recordId}";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array('message' => 'Record found', 'status' => true, 'data' => $row));
} else {
    echo json_encode(array('message' => 'Record not found', 'status' => false));
}

mysqli_close($conn);
?>
