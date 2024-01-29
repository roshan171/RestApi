<?php
// Read JSON file content
$jsonFile = file_get_contents('data.json');

// Decode JSON data
$jsonData = json_decode($jsonFile, true);

// Check if decoding was successful
if ($jsonData === null) {
    die('Error decoding JSON file.');
}

// Initialize cURL session
$apiEndpoint = 'https://jsonplaceholder.typicode.com/posts';
$ch = curl_init($apiEndpoint);

// Set cURL options for POST request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // Set as POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsonData)); // Attach the JSON data
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($jsonData))
));

// Execute cURL session and store the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Process the data as needed
    if ($data !== null) {
        // Display or use the retrieved data
        echo "Data inserted via API\n";
        echo "<pre>";
        print_r($data);

        // Store data in MySQL database
        $conn = new mysqli("localhost", "root", "", "mydb");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Loop through the retrieved data and insert into the 'posts' table
        foreach ($data as $post) {
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
        echo 'Error decoding JSON response.';
    }
}

// Close cURL session
curl_close($ch);
?>
