<?php
//CODIGO CON EL PET para mandar valores de distancia
$servername = "localhost";
$dbname = "login";
$username = "pet";
$password = "Pet12345.";
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $sensor = $sensor1 = $location = $value1 = $value2 = $Distancia="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $sensor = test_input($_POST["sensor"]);
        $value1 = test_input($_POST["value1"]);
        $sensor1 = test_input($_POST["sensor1"]);
        $value2 = test_input($_POST["value2"]);
        $location = test_input($_POST["location"]);
        $Distancia = test_input($_POST["Distancia"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO sensorespet (api_key, sensor, value1, location, sensor1, value2, Distancia) 
        VALUES ('" . $api_key . "', '" . $sensor . "', '" . $value1 . "', '" . $location . "', '" . $sensor1 . "', '" . $value2 . "','" . $Distancia. "')";
        
        if ($conn->query($sql) == TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        
       

        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>