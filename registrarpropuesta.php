<?php
session_start();
    if(isset($_SESSION['Email'])==null){
        header("Location:http://localhost/postobon/login.html");
    }elseif($_SESSION['Rol']!="proveedor"){
        header("refresh:0.1;url=http://localhost/postobon/salir.php");
        echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
    }

$propuesta=$_POST['propuesta'];
$operacion=$_POST['operacion'];
$zonahoraria = date_default_timezone_get();
$dtz = new DateTimeZone("America/Bogota");
$dt = new DateTime("now", $dtz);
$dia=$dt->format("d/M/Y g:i a");
include "connection.php";
$consulta=$mysqli->query("INSERT INTO `propuesta`( `fecha_registro`, `propuesta`, `proveedor_codigo_proveedor`, `proveedor_usuario`, `proveedor_clave`) VALUES ('$dia','$propuesta','".$_SESSION['DOC']."','".$_SESSION['USER']."','".$_SESSION['pass']."')");
header("refresh:0.1;url=http://localhost/postobon/propuesta.php");
        echo '<script language="javascript"> alert("Gracias por registrar la propuesta, la revisaremos 😎")</script>';
?>