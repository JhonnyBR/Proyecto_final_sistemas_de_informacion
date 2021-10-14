<?php
$mysqli = new mysqli("localhost", "root","", "postoean");
if($mysqli->connect_errno){
	header("refresh:1;url=http://localhost/postobon/login.html");
	echo "Fallo al intentar acceder a la base de datos";
}

?>