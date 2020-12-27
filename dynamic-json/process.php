<?php
$connect = new mysqli("localhost", "root", "", "jay_db");

$select = "select * from persons";
$query = $connect->query($select);
// $outcome = "";
// while($result = $query->fetch_assoc()){
//    echo $result;
// }
$result = $query->fetch_all(MYSQLI_ASSOC);
$outcome = json_encode($result);



print_r($outcome);


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