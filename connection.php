<?php      
    $host = "localhost";  
    $user = "Andrea";  
    $password = 'Admin12345';  
    $db_name = "petplate_dispenser";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  