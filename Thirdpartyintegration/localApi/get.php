<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    $posts = array();

    // Fetch data rows
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($posts);
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();
?>
