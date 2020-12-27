<?php
$connect = new mysqli("localhost", "root", "", "jay_db");
date_default_timezone_set("Asia/Kolkata");
$select = "select * from persons order by firstname";
$query = $connect->query($select);
// $outcome = "";
// while($result = $query->fetch_assoc()){
//    echo $result;
// }
$result = $query->fetch_all(MYSQLI_ASSOC);
$json_data = json_encode($result, JSON_PRETTY_PRINT);
$json_file = "my_".date("d-m-y h-i-sa").".json";

if(file_put_contents("my-json/".$json_file, $json_data, )){
    echo $json_data." File Created.";
}

//print_r($json_data);


?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>json-process</title>
</head>
<body>
    
</body>
</html>