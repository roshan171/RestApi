<!-- Perform a PUT Request -->

<?php

$url = 'https://kvstore.p.rapidapi.com/collections';
$collection_name = 'RapidAPI';
$request_url = $url . '/' . $collection_name;

$data = [
  'public_write' => true
];

$curl = curl_init($request_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: kvstore.p.rapidapi.com',
  'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
  'Content-Type: application/json'
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response . PHP_EOL;