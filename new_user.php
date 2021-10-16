<?php
	session_start();
	if(isset($_SESSION['Email'])==null){
		header("Location:http://localhost/postobon/login.html");
	}elseif($_SESSION['Rol']!="Administrador"){
        header("refresh:0.1;url=http://localhost/postobon/salir.php");
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
   $mat=$_POST['mat'];
   $v_iva=$_POST['v_iva'];
   $p_iva=$_POST['p_iva'];
   $precio=$_POST['precio'];
   include "connection.php";
   if($rol=="proveedor"){
   	$insert_ad="INSERT INTO `administrador`(`usuario`, `clave`, `rol`, `tipo_de_documento`, `Documento`, `nombre`, `email`, `numero_contacto`) VALUES ('$usuario','$password','$rol','$tipodoc','$documento','$nombre','$email','$numero')";
   	$insert_pro="INSERT INTO `proveedor`(`codigo_proveedor`, `usuario`, `clave`, `rol`, `direccion`, `region`, `correo_electronico`, `numero_contacto`, `NIT`, `materiales`, `precio`, `iva`, `porcentaje_iva`) VALUES ('$documento','$usuario','$password','$rol','$dir','$reg','$email','$numero','$documento','$mat','$precio','$v_iva','$p_iva')";
   		$mysqli->query($insert_ad);
   		$mysqli->query($insert_pro);
   		header("refresh:0.1;url=http://localhost/postobon/crearrol.php");
		echo '<script language="javascript"> alert("Genial! Ahora tienes un nuevo proveedor 😊")</script>';
   }else{
   		$insert_ad="INSERT INTO `administrador`(`usuario`, `clave`, `rol`, `tipo_de_documento`, `Documento`, `nombre`, `email`, `numero_contacto`) VALUES ('$usuario','$password','$rol','$tipodoc','$documento','$nombre','$email','$numero')";
   		$mysqli->query($insert_ad);
   		header("refresh:0.1;url=http://localhost/postobon/crearrol.php");
		echo '<script language="javascript"> alert("Genial ahora cuentas con un nuevo $rol")</script>';
   }
?>