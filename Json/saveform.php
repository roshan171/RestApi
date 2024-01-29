<?php

if($_POST['id']!='' && $_POST['name']!='' && $_POST['city']!=''&& $_POST['email']!=''){
  if(file_exists('jsonfile/student-data.json')){

    $current_data= file_get_contents('jsonfile/student-data.json');
  $array_data= json_decode($current_data,true);
  $new_data= array(
    'id'=> $_POST['id'],
    'name'=> $_POST['name'],
    'city'=> $_POST['city'],
    'email'=> $_POST['email']
  );

$array_data[]=$new_data;
$json_data= json_encode($array_data, JSON_PRETTY_PRINT);
if(file_put_contents('jsonfile/student-data.json',$json_data))
{
    echo "Successfully Saved Data In Json File";
}
else {
   echo "Unsuccessfully Saved Data In Json File";
}
}else{
    echo "File Not Exists";
}
}
else{
    echo "All fields are Required";
}


?>