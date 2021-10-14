<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
$passc=$_POST['passc'];
$mail=$_POST['email'];
if($passc!=$pass){
	header("refresh:0.1;url=http://localhost/postobon/login.html");
		echo '<script language="javascript"> alert("Parece que las contraseñas no coinciden 🤔.")</script>';
}else{
	include "connection.php";
	$consulta = $mysqli->query("SELECT * FROM Administrador WHERE Usuario='$user'");
	if($consulta->num_rows>=1){
		header("refresh:0.1;url=http://localhost/postobon/login.html");
		echo '<script language="javascript"> alert("Lo sentimos pero el correo ya se encuentra registrado. 😅")</script>';
	}else{
		$pass=md5($pass);
		$mysqli->query("INSERT INTO `administrador`( `Usuario`, `Clave`, `Rol`, `Tipo_De_Documento`, `Nombre`, `Email`, `Numero_Contacto`) VALUES ('$user','$pass','proveedor','N/A','N/A','$mail','00000')");
		header("refresh:0.1;url=http://localhost/postobon/login.html");
		echo '<script language="javascript"> alert("Gracias! ahora podras ser prooveedor. 😍")</script>';
	}
}
?>