<?php
session_start();
if(isset($_SESSION['Email'])==null){
    header("Location:http://postoean.epizy.com/");
}elseif($_SESSION['Rol']!="proveedor"){
    header("refresh:0.1;url=http://postoean.epizy.com/salir.php");
    echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
}
$localizacion=$_POST["location"];
$region=$_POST["region"];
$celular=$_POST["celular"];
$consulta1="UPDATE `administrador` SET `numero_contacto`='$celular',`direccion`='$localizacion',`region`='$region' WHERE `Documento`=".$_SESSION['DOC'];
$consulta2= "UPDATE `proveedor` SET `direccion`='$localizacion',`region`='$region', `numero_contacto`='$celular' WHERE `codigo_proveedor`='".$_SESSION['DOC']."'";
include "connection.php";
$mysqli->query($consulta1);
$mysqli->query($consulta2);
header("refresh:0.1;url=http://postoean.epizy.com/proveedor-actualizar.php");
    echo '<script language="javascript"> alert("Gracias por actualizar tus datos. 😊")</script>';
?>