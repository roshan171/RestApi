<?php 

$conn =mysqli_connect("localhost","root","","mydb");

$sql= "SELECT * FROM crudddimg";

$result= mysqli_query($conn,$sql);

$output=mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($output);

// echo "<pre>";
// print_r($output);
// echo "</pre>";




?>