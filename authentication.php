<?php      
    include('connection.php');  
    $id = $_POST['id'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $id = stripcslashes($id);  
        $password = stripcslashes($password);  
        $id = mysqli_real_escape_string($con, $id);  
        $password = mysqli_real_escape_string($con, $password);

        $hashedPassword = hash('sha256', $password);
      
        $sql = "select *from login where id = '$id' and password = '$hashedPassword'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: Principal.html");
            exit();
        }  
        else{  
            echo "<h1> Login failed. Invalid id or password.</h1>"; 
        }     
?>