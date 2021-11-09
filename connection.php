<?php
$mysqli = new mysqli("remotemysql.com", "omPtncYGOo","BIskWnur7S", "omPtncYGOo");
if($mysqli->connect_errno){
	header("refresh:1;url=http://postoean.freecluster.eu/");
	echo "Fallo al intentar acceder a la base de datos";
}

?>