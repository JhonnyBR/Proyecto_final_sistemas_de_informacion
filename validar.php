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
				$_SESSION['DOC']=$fila['Documento'];
				if($_SESSION['Rol']=="Administrador"){
					header("Location:http://localhost/postobon/admin.php");
				}elseif ($_SESSION['Rol']=="proveedor") {
					$_SESSION['Name']=$fila["nombre"];
					$_SESSION['DOC']=$fila['Documento'];
					$_SESSION['USER']=$user;
					$_SESSION['pass']=$pass;
					/*$doc=$_SESSION['DOC'];
					$consulta_aux=$mysqli->query("SELECT * FROM proveedor where codigo_proveedor='$doc'");
					while($resultado=$consulta_aux->fetch_assoc()){
						$_SESSION['Precio']=$resultado['precio'];
						$_SESSION['Iva']=$resultado['iva'];
						$_SESSION['Materiales']=$resultado['materiales'];
						$_SESSION['Precio']=$resultado['precio'];
					}*/
					header("Location:http://localhost/postobon/precios.php");
				}elseif ($_SESSION['Rol']=="produccion") {
					$_SESSION['logged_in_user_id']=$fila["Id"];
					$_SESSION['Rol']=$fila["rol"];
					$_SESSION['Email']=$fila["email"];
					$_SESSION["Telefono"]=$fila["numero_contacto"];
					$_SESSION['DOC']=$fila['Documento'];
					$_SESSION['Name']=$fila["nombre"];
					$_SESSION['DOC']=$fila['Documento'];
					$_SESSION['USER']=$user;
					$_SESSION['pass']=$pass;
					header("Location:http://localhost/postobon/produccion.php");
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