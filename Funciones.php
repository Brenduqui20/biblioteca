<?php 
function CantidadRegistros($NombreTabla = ''){
require("conexion.php");  
$Contador = 0;
$consulta = "SELECT * FROM ".$NombreTabla."";
$resultado = mysqli_query($conexion, $consulta);
while ($fila = mysqli_fetch_array($resultado)) {
    $Contador++;
}   
return $Contador;
mysqli_close($conexion);

}
?>