<?php
$connect = new mysqli("localhost", "root", "", "jay_db");
date_default_timezone_set("Asia/Kolkata");

$select = "select * from persons order by firstname";
$query = $connect->query($select);
$result = $query->fetch_all(MYSQLI_ASSOC);
$json_data = json_encode($result, JSON_PRETTY_PRINT);
$json_file = "my_".date("d-m-y h-i-sa").".json";



if (isset($_POST["submit"])) {

    if(file_put_contents("my-json/".$json_file, $json_data, )){
        echo $json_file." File Created.";
    }


    $form_data = array(
        "id" => $_POST["id"],
        "firstname" => $_POST["fname"],
        "lastname" => $_POST["lname"],
        "email" => $_POST["email"],
        "city" => $_POST["city"]
    );

  

    if (file_exists("my-json/form.json")) {
        $current_data = file_get_contents("my-json/form.json");
        $array_data = json_decode($current_data, true);
        $array_data[] = $form_data;
        $json_array = json_encode($array_data, JSON_PRETTY_PRINT);

        if (file_put_contents("my-json/form.json", $json_array)) {
            echo "<h3>Sucessfully Done!!</h3>";
        }
    }
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label>My Id:</label><br>
            <input type="text" name="id" id="id"><br>
        </div>
        <div>
            <label>First Name:</label><br>
            <input type="text" name="fname" id="fname"><br>
        </div>
        <div>
            <label>Last Name:</label><br>
            <input type="text" name="lname" id="lname"><br>
        </div>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" id="email"><br>
        </div>
        <div>
            <label>City:</label><br>
            <input type="text" name="city" id="city"><br>
        </div>
        <br>
        <div>
            <input type="submit" value="SUBMIT" name="submit">
        </div>
    </form>
</body>

</html>