<?php
session_start();
    if(isset($_SESSION['Email'])==null){
        header("Location:http://postoean.epizy.com/");
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
$fecha=$dt->format("d/M/Y g:i a");
include "connection.php";
$consulta1=$mysqli->query("INSERT INTO `precios`(`proveedor_codigo_proveedor`, `proveedor_clave`, `proveedor_usuario`, `material`,`Producto`, `precios`,`iva`,`Cantidad`, `fecha`) VALUES ('".$_SESSION['DOC']."','".$_SESSION['pass']."','".$_SESSION['USER']."','$material','$producto','$precio','$iva','$cantidad','$fecha')");

header("refresh:0.1;url=http://postoean.epizy.com/precios.php");
        echo '<script language="javascript"> alert("Gracias. nos encargaremos de ver tus precios. 😁")</script>';
?>