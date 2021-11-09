<?php
if(isset($_GET['id'])){
	session_start();
	include "connection.php";
	$consulta_doc= "SELECT Tipo, Contenido FROM proveedor WHERE codigo_proveedor='".$_GET['id']."'";
	$res = $mysqli->query($consulta_doc);
	while($row = $res->fetch_assoc()){
		$tipo= $row['Tipo'];
		$contenido = $row['Contenido'];
		header("Content-type: $type");
		header("Content-Disposition: attachment; filename=documento-".$_GET['id']."");
		ob_clean();
		flush();
		echo $contenido;
		header("Location:http://postoean.freecluster.eu/");
}
}
else{
		header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
		echo '<script language="javascript"> alert("No hemos encontrado el archivo cargado, pidele al proveedor que lo vuelva a subir. 😬😎")</script>';
}

?>