<?php
	session_start();
	if(isset($_SESSION['Email'])==null){
		header("Location:http://localhost/postobon/login.html");
	}elseif($_SESSION['Rol']!="Administrador"){
        header("refresh:0.1;url=http://localhost/postobon/salir.php");
        echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="https://www.districhapinero.com/assets/media/logo-post.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/h2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
    <title>Index Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="https://www.postobon.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Postob%C3%B3n_S._A._logo.svg/1280px-Postob%C3%B3n_S._A._logo.svg.png" alt="logo" width="90px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Inicio </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Administrador<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Proveedor</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">Produccion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
    <br><br>
    <center>
        <a class="btn btn-primary" href="crearrol.php" role="button">Crear usuario</a>
        <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesion</a>
    </center>   
    <br><br><br>
    <h1><center>Tabla de precios Proveedores</center></h1>   
    <br><br><br> 
    <div class="container-sm">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Número</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Iva</th>
                    <th scope="col">Materiales</th>
                    <th scope="col">Documentos</th>
                </tr>
            </thead>
            <?php
                 include("connection.php");
                 $consulta= $mysqli->query("SELECT * FROM proveedor");
                if($consulta->num_rows>=1){
                    while($fila = $consulta->fetch_assoc()){
                        if($fila['Nombre_doc']==""){
                           echo "<tbody>
                            <tr>
                                <th scope='row'>".$fila["id_proveedor"]."</th>
                                <td>".$fila["usuario"]."</td>
                                <td>".$fila["correo_electronico"]."</td>
                                <td>".$fila["numero_contacto"]."</td>
                                <td>".$fila["precio"]."</td>
                                <td>".$fila["iva"]."</td>
                                <td>".$fila["materiales"]."</td>
                            </tr>
                        </tbody>"; 
                        }else{
                              echo "<tbody>
                            <tr>
                                <th scope='row'>".$fila["id_proveedor"]."</th>
                                <td>".$fila["usuario"]."</td>
                                <td>".$fila["correo_electronico"]."</td>
                                <td>".$fila["numero_contacto"]."</td>
                                <td>".$fila["precio"]."</td>
                                <td>".$fila["iva"]."</td>
                                <td>".$fila["materiales"]."</td>
                                <td> <a href='download.php?id=".$fila["codigo_proveedor"]."'>Descargar</a> </td>
                            </tr>
                        </tbody>";
                        }
                        
                    }
                }else{
                    echo "<h2 class='title-if'>Actualmente no tiene contratado ningún proveedor 😔 </h2>";
                }
            ?>
        </table>
    </div>
</body>
</html>