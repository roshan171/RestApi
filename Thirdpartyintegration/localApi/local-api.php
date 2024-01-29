<?php
// Read JSON file content
$jsonFile = file_get_contents('demo.json');

// Decode JSON data
$jsonData = json_decode($jsonFile, true);

// Check if decoding was successful
if ($jsonData === null) {
    die('Error decoding JSON file.');
}

// Process the data as needed
if (!empty($jsonData)) {
    // Store data in MySQL database
    $conn = new mysqli("localhost", "root", "", "mydb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through the retrieved data and insert into the 'posts' table
    foreach ($jsonData as $post) {
        // Check if the post contains the necessary data
        if (isset($post['title'], $post['body'], $post['userId'])) {
            $title = $post['title'];
            $body = $post['body'];
            $userId = $post['userId'];

            $sql = "INSERT INTO posts (`title`, `body`, `userId`) VALUES ('$title', '$body', '$userId')";

            if ($conn->query($sql) !== true) {
                echo "Error inserting data into MySQL database: " . $conn->error;
            }
        }
    }

    echo "Data inserted into MySQL database";

    // Close MySQL connection
    $conn->close();
} else {
    echo 'No data to process.';
}
?>
