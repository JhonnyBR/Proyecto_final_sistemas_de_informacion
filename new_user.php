<?php
	session_start();
	if(isset($_SESSION['Email'])==null){
		header("Location:http://postoean.freecluster.eu/");
	}elseif($_SESSION['Rol']!="Administrador"){
        header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
        echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
    }
   $documento=$_POST['id'];
   $tipodoc=$_POST['tipdoc'];
   $nombre=$_POST['nombre'];
   $email=$_POST['email'];
   $numero=$_POST['celular'];
   $usuario=$_POST['user'];
   $password=$_POST['password'];
   $rol=$_POST['rol'];
   $dir=$_POST['dir'];
   $reg=$_POST['reg'];
   $password = md5($password);
   include "connection.php";
   if($rol=="proveedor"){
   	$insert_ad="INSERT INTO `administrador`(`usuario`, `clave`, `rol`, `tipo_de_documento`, `Documento`, `nombre`, `email`, `numero_contacto`) VALUES ('$usuario','$password','$rol','$tipodoc','$documento','$nombre','$email','$numero')";
   	$insert_pro="INSERT INTO `proveedor`( `nombre`, `direccion`, `region`, `TIpo_doc`, `Documento`) VALUES ('$nombre','$dir','$reg','$tipodoc','$documento')";
   		$mysqli->query($insert_ad);
   		$mysqli->query($insert_pro);
   		header("refresh:0.1;url=http://postoean.freecluster.eu/crearrol.php");
		echo '<script language="javascript"> alert("Genial! Ahora tienes un nuevo proveedor 😊")</script>';
   }else{
   		$insert_ad="INSERT INTO `administrador`(`usuario`, `clave`, `rol`, `tipo_de_documento`, `Documento`, `nombre`, `email`, `numero_contacto`) VALUES ('$usuario','$password','$rol','$tipodoc','$documento','$nombre','$email','$numero')";
   		$mysqli->query($insert_ad);
   		header("refresh:0.1;url=http://postoean.freecluster.eu/crearrol.php");
		echo '<script language="javascript"> alert("Genial ahora cuentas con un nuevo $rol")</script>';
   }
?>