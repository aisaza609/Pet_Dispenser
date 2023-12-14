<?php      
include('connection.php');  

$Distancia = $_POST['sensorDistancia'];  
      
// Evitar la inyección SQL  
$Distancia = stripcslashes($Distancia);  
$Distancia = mysqli_real_escape_string($con, $Distancia);  

// Obtener el IDx del último registro
$sql = "SELECT IDx FROM sensorespet ORDER BY IDx DESC LIMIT 1";
if($result=$con->query($sql)){
    $row = mysqli_fetch_assoc($result);
    $lastIDx = implode($row);

    // Actualizar el valor en la columna 'distancia' para el último registro
    $updateSql = "UPDATE sensorespet SET distancia = '$Distancia' WHERE IDx = '$lastIDx'";
    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        echo "Valor actualizado exitosamente";
    } else {
        echo "Error al actualizar el valor: " . mysqli_error($con);
    }
} else {
    echo "Error al obtener el último IDx: " . mysqli_error($con);
}

mysqli_close($con);
?>
