<?php
// API endpoint URL
// $apiEndpoint = 'https://api.example.com/data';
$apiEndpoint = 'https://jsonplaceholder.typicode.com/todos/';

// Initialize cURL session
$ch = curl_init($apiEndpoint);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
// Add other options as needed, e.g., headers, authentication

// Execute cURL session and store the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Decode the JSON response (assuming it's JSON)
    $data = json_decode($response, true);

    // Process the data as needed
    if ($data !== null) {
        // Display or use the retrieved data
        echo "<pre>";
        print_r($data);
    } else {
        echo 'Error decoding JSON response.';
    }
}

// Close cURL session
curl_close($ch);
?>