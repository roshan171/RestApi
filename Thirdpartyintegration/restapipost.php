
<?php
// API endpoint URL
$apiEndpoint = 'https://jsonplaceholder.typicode.com/posts';

// Data to be sent in the POST request
$postData = array(
    'title' => 'Roshan',
    'body' => 'This is the body of the new post.',
    'userId' => 1
);

// Convert the data to JSON format
$jsonData = json_encode($postData);

// Initialize cURL session
$ch = curl_init($apiEndpoint);

// Set cURL options for POST request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // Set as POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Attach the JSON data
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
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
        echo "Data inserted";
        echo "<pre>";
        print_r($data);
    } else {
        echo 'Error decoding JSON response.';
    }
}

// Close cURL session
curl_close($ch);
?>