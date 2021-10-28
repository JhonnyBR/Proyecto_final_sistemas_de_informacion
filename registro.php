<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
$passc=$_POST['passc'];
$mail=$_POST['email'];
$nit=$_POST['nit'];
$telefono=$_POST["Telefono"];
$direccion=$_POST["direccion"];
$nombre=$_POST["nombre"];
if($passc!=$pass){
	header("refresh:0.1;url=http://postoean.epizy.com/");
		echo '<script language="javascript"> alert("Parece que las contraseñas no coinciden 🤔.")</script>';
}else{
	include "connection.php";
	$consulta = $mysqli->query("SELECT * FROM administrador WHERE Usuario='$user'");
	if($consulta->num_rows>=1){
		header("refresh:0.1;url=http://postoean.epizy.com/");
		echo '<script language="javascript"> alert("Lo sentimos pero el correo ya se encuentra registrado. 😅")</script>';
	}else{
		$pass=md5($pass);
		$mysqli->query("INSERT INTO `proveedor`(`codigo_proveedor`, `usuario`, `clave`, `rol`, `direccion`, `region`, `correo_electronico`, `numero_contacto`, `NIT`, `materiales`, `precio`, `iva`, `porcentaje_iva`) VALUES ('$nit','$user','$pass','proveedor','$direccion','N/A','$mail','$telefono','$nit','N/A',0,0,0);");
		$mysqli->query("INSERT INTO `administrador`( `usuario`, `clave`, `rol`, `tipo_de_documento`, `Documento`, `nombre`, `email`, `numero_contacto`) VALUES ('$user','$pass','proveedor','NIT','$nit','$nombre','$mail', '$telefono');");
		header("refresh:0.1;url=http://postoean.epizy.com/");
		echo '<script language="javascript"> alert("Gracias! ahora podras ser prooveedor. 😍")</script>';
		
	}
}
?>