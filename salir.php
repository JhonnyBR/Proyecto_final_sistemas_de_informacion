<?php
	session_start();
	session_destroy();
	header("Location:http://localhost/postobon/login.html");
?>