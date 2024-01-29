<?php
header('content-type:application/json');
header('Access-control-Allow-origin:*');
header('Access-control-Allow-Methods:GET');
header('Access-control-Allow-Headers:Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Include your database configuration file
include "config.php";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode(array('message' => 'Records found', 'status' => true, 'data' => $rows));
} else {
    echo json_encode(array('message' => 'No records found', 'status' => false));
}

mysqli_close($conn);
?>
