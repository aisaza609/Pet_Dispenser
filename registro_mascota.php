<?php      
    include('connection.php');  

    // Recibe los datos del formulario.
    $nmascota = $_POST['nmascota'];
    $raza = $_POST['raza'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];

    // Genera un ID aleatorio para la mascota.
    $Id__Mascotas = rand(10000, 99999);

    // Resto del proceso de limpieza y validación de la entrada.
    $nmascota = stripcslashes($nmascota);  
    $raza = stripcslashes($raza);  
    $edad = stripcslashes($edad);  
    $peso = stripcslashes($peso); 

    $nmascota = mysqli_real_escape_string($con, $nmascota);  
    $raza = mysqli_real_escape_string($con, $raza);  
    $edad = mysqli_real_escape_string($con, $edad);  
    $peso = mysqli_real_escape_string($con, $peso);  

    // Prepara la sentencia SQL con el ID aleatorio.
    $sql = "INSERT INTO mascotas (Id_Mascotas, nmascota, raza, edad, peso) VALUES ('" . $Id__Mascotas . "', '" . $nmascota . "', '" . $raza . "','" . $edad . "','" . $peso . "')";
    
    // Ejecuta la consulta.
    $result = mysqli_query($con, $sql);
    if ($result == TRUE) {
        header("Location: PrincipalMascota.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }    
?>
