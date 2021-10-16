<?php
$user=$_POST["user"];
$pass=$_POST['pass'];
if($user=="" or null){
	header("Location:http://localhost/postobon/login.html");
}else{
	$pass=md5($pass);
	include "connection.php";
	$consulta=$mysqli->query("SELECT * FROM Administrador WHERE USUARIO= '$user'");
	if($consulta->num_rows>=1){
		while($fila = $consulta->fetch_assoc()){
			if($pass==$fila["clave"]){
				session_start();
				$_SESSION['logged_in_user_id']=$fila["Id"];
				$_SESSION['Rol']=$fila["rol"];
				$_SESSION['Email']=$fila["email"];
				$_SESSION["Telefono"]=$fila["numero_contacto"];
				if($_SESSION['Rol']=="Administrador"){
					header("Location:http://localhost/postobon/admin.php");
				}elseif ($_SESSION['Rol']=="proveedor") {
					// code...
				}elseif ($_SESSION['Rol']=="produccion") {
					// code...
				}
				
			}else{
				header("refresh:0.1;url=http://localhost/postobon/login.html");
		echo '<script language="javascript"> alert("Por favor valide los datos ingresados 🤔.")</script>';
			}
		}
	}else{
		header("refresh:0.1;url=http://localhost/postobon/login.html");
		echo '<script language="javascript"> alert("Lo sentimos pero al parecer el usuario brindado no se encuentra registrado 😥.")</script>';
	}
}
?>