<?php
session_start();
if(isset($_SESSION['Email'])==null){
    header("Location:http://postoean.freecluster.eu/");
}elseif($_SESSION['Rol']!="proveedor"){
    header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
    echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
}
$nombre=$_FILES['archivo']["name"];
$tipo =$_FILES['archivo']["type"];
$ubicacion_temp=$_FILES['archivo']['tmp_name'];
$size=$_FILES['archivo']['size'];
include "connection.php";
$fp = fopen($ubicacion_temp, "rb");
$contenido = fread($fp, $size);
$contenido = addslashes($contenido);
fclose($fp);
$consulta = "UPDATE `proveedor` SET `nombre_doc`='$nombre',`titulo`='$nombre',`contenido`='$contenido',`tipo`='$tipo' WHERE `id_proveedor`='".$_SESSION['ID']."'";
if($resultado = $mysqli->query($consulta)){
	header("refresh:0.1;url=http://postoean.freecluster.eu/proveedor.php");
        echo '<script language="javascript"> alert("Gracias por cargar tu documento")</script>';
}else{
	header("refresh:0.1;url=http://postoean.freecluster.eu/proveedor.php");
        echo '<script language="javascript"> alert("Por favor intenta de nuevo.")</script>';
}

?>