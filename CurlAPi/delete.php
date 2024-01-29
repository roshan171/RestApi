
<!-- The DELETE Method -->

<?php

$url = 'https://kvstore.p.rapidapi.com/collections';
$collection_name = 'RapidAPI';
$request_url = $url . '/' . $collection_name;

$curl = curl_init($request_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: kvstore.p.rapidapi.com',
  'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxxx',
  'Content-Type: application/json'
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response . PHP_EOL;