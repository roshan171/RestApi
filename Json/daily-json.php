<?php

$conn = mysqli_connect("localhost","root","","mydb");

$sql= "select * From student";

$result=mysqli_query($conn,$sql);

$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_data= json_encode($output, JSON_PRETTY_PRINT);

$filename= "my-". date("y-d-m"). ".json";

if(file_put_contents("jsonfile/{$filename}",$json_data)){
    echo "File Created".$filename;
}
else{
    echo "cant insrted data in a file";
}


?>