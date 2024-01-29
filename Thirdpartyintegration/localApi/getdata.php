<?php
// API endpoint URL for fetching data
$apiEndpoint = 'http://localhost/API%20Tutorial/Thirdpartyintegration/localApi/get.php';

// Initialize cURL session
$ch = curl_init($apiEndpoint);

// Set cURL options for GET request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string

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
        echo "Data retrieved via API\n";
        echo "<pre>";
        print_r($data);
    } else {
        echo 'Error decoding JSON response.';
    }
}

// Close cURL session
curl_close($ch);
?>
