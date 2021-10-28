<?php
$mysqli = new mysqli("remotemysql.com", "7eDLZapyNW","adwPdVBerE", "7eDLZapyNW");
if($mysqli->connect_errno){
	header("refresh:1;url=http://postoean.epizy.com/");
	echo "Fallo al intentar acceder a la base de datos";
}

?>