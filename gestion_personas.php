<?php
include('connection.php');

function registrarPersona($con, $username, $id, $cel, $password) {
    // Verifica si el número de identificación ya existe
    $query1 = "SELECT * FROM login WHERE id='$id'";
    $result1 = mysqli_query($con, $query1);
    // Verifica si el usuario ya existe
    $query2 = "SELECT * FROM login WHERE username='$username'";
    $result2 = mysqli_query($con, $query2);

    if (mysqli_num_rows($result1) > 0) {
        // Número de identificación ya existe
        echo json_encode(['success' => false, 'message' => 'Número de identificación ya registrado']);
    } elseif (mysqli_num_rows($result2) > 0) {
        // Usuario ya existe
        echo json_encode(['success' => false, 'message' => 'Usuario ya existente.']);
    } else {
        // El número de identificación no existe, procede con la inserción
        $hashedPassword = hash('sha256', $password);
        $insertQuery = "INSERT INTO login (username, id, cel, password) VALUES ('$username', '$id', '$cel', '$hashedPassword')";

        if(mysqli_query($con, $insertQuery)) {
            // Inserción exitosa
            echo json_encode(['success' => true, 'message' => 'Registro exitoso.']);
        } else {
            // Error en la inserción
            echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario.']);
        }
    }
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Recibe los datos del formulario
    $username = mysqli_real_escape_string($con, stripslashes($_POST['user']));
    $id = mysqli_real_escape_string($con, stripslashes($_POST['id']));
    $cel = mysqli_real_escape_string($con, stripslashes($_POST['cel']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['pass']));

    switch ($action) {
        case 'registrar':
            registrarPersona($con, $username, $id, $cel, $password);
            break;
        case 'actualizar':
            // actualizarPersona(); // Asegúrate de definir esta función
            break;
        // Agrega más casos según sea necesario
    }

    mysqli_close($con);
}



?>
