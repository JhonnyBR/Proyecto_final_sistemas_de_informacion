<?php
session_start();
    if(isset($_SESSION['Email'])==null){
        header("Location:http://postoean.freecluster.eu/");
    }elseif($_SESSION['Rol']!="proveedor"){
        header("refresh:0.1;url=http://localhost/postobon/salir.php");
        echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
    }
$precio=$_POST["price"];
$iva=$_POST["iva"];
$material=$_POST["material"];
$producto=$_POST["Producto"];
$cantidad=$_POST["cantidad"];
$zonahoraria = date_default_timezone_get();
$dtz = new DateTimeZone("America/Bogota");
$dt = new DateTime("now", $dtz);
$fecha=$dt->format("Y-m-d G:i:s ");
include "connection.php";
$consulta1=$mysqli->query("INSERT INTO `precio`(`material`, `producto`, `valor`, `iva`, `cantidad`, `fecha`, `proveedor_id_proveedor`) VALUES ('$material','$producto','$precio','$iva','$cantidad','$fecha', '".$_SESSION['ID']."')");
header("refresh:0.1;url=http://postoean.freecluster.eu/precios.php");
        echo '<script language="javascript"> alert("Gracias. nos encargaremos de ver tus precios. 😁")</script>';
?>