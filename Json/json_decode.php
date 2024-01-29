<?php 

$json_string="jsonfile/myjson.json";

$jsondata = file_get_contents($json_string);

$data=json_decode($jsondata,true);
// echo "<pre>";
// print_r($data);
// echo "</pre>";

echo '<table border="1" cellpadding="10px" width="100%">';
foreach($data as list("id"=>$id,"name"=>$name,"age"=>$age)){
    echo "<tr>
    <td>{$id}</td>
    <td>{$name}</td>
    <td>{$age}</td>

    </tr>";
}
echo "</table>";



?>