<?php
// Initialize cURL session
$localApiEndpoint = 'http://localhost/API%20Tutorial/Thirdpartyintegration/localApi/local-api.php';
$ch = curl_init($localApiEndpoint);

// Set cURL options for POST request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // Set as POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, ''); // No need to attach JSON data
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: 0'
));

// Execute cURL session and store the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Display the response
    echo $response;
}

// Close cURL session
curl_close($ch);
?>
