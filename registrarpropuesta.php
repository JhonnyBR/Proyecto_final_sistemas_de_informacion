<?php
session_start();
    if(isset($_SESSION['Email'])==null){
        header("Location:http://postoean.freecluster.eu/");
    }elseif($_SESSION['Rol']!="proveedor"){
        header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
        echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
    }

$propuesta=$_POST['propuesta'];
$operacion=$_POST['operacion'];
$zonahoraria = date_default_timezone_get();
$dtz = new DateTimeZone("America/Bogota");
$dt = new DateTime("now", $dtz);
$dia=$dt->format("Y-m-d G:i:s");
include "connection.php";
$consulta=$mysqli->query("INSERT INTO `propuesta`( `fecha_registro`, `propuesta`,`plan_operacion`,`proveedor_id_proveedor`) VALUES ('$dia','$propuesta','$operacion',".$_SESSION['ID'].")");
header("refresh:0.1;url=http://postoean.freecluster.eu/propuesta.php");
        echo '<script language="javascript"> alert("Gracias por registrar la propuesta, la revisaremos 😎")</script>';
?>