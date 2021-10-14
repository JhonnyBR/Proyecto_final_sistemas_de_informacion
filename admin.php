<?php
	session_start();
	if(isset($_SESSION['Email'])==null){
		header("Location:http://localhost/postobon/login.html");
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
                    <a class="nav-link" href="admin.html">Administrador<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="proveedor.html">Proveedor</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="produccion.html">Produccion</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>
    <center>
        <a class="btn btn-primary" href="crearrol.html" role="button">Crear rol</a>
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
                    <th scope="col">Numero</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Iva</th>
                    <th scope="col">Materiales</th>
                    <th scope="col">Editar</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Distriplas</td>
                    <td>user@example.com</td>
                    <td>12345</td>
                    <td>$200.000 kg</td>
                    <td>2%</td>
                    <td>PET</td>
                    <td><a class="btn btn-success" href="validarrol.html" role="button">Validar rol</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Medplast</td>
                    <td>user@example.com</td>
                    <td>12345</td>
                    <td>$200.000 kg</td>
                    <td>2%</td>
                    <td>PET</td>
                    <td><a class="btn btn-success" href="validarrol.html" role="button">Validar rol</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Colplast</td>
                    <td>user@example.com</td>
                    <td>12345</td>
                    <td>$200.000 kg</td>
                    <td>2%</td>
                    <td>PET</td>
                    <td><a class="btn btn-success" href="validarrol.html" role="button">Validar rol</a></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Plasticos la montaña</td>
                    <td>user@example.com</td>
                    <td>12345</td>
                    <td>$200.000 kg</td>
                    <td>2%</td>
                    <td>PET</td>
                    <td><a class="btn btn-success" href="validarrol.html" role="button">Validar rol</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>