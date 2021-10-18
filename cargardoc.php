<?php
session_start();
if(isset($_SESSION['Email'])==null){
    header("Location:http://localhost/postobon/login.html");
}elseif($_SESSION['Rol']!="proveedor"){
    header("refresh:0.1;url=http://localhost/postobon/salir.php");
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
$consulta = "UPDATE `proveedor` SET `Nombre_doc`='$nombre',`Titulo`='$nombre',`Contenido`='$contenido',`Tipo`='$tipo' WHERE `correo_electronico`='".$_SESSION['Email']."'";
if($resultado = $mysqli->query($consulta)){
	echo "Listo";
}else{
	printf("Fallido ", $mysqli->error); 
}

?>