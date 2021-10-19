<?php
session_start();
if(isset($_SESSION['Email'])==null){
    header("Location:http://localhost/postobon/login.html");
}elseif($_SESSION['Rol']!="proveedor"){
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
    <title>Proveedor</title>
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
                    <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Proveedor</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>
    <br><br>
    <center>
        <a class="btn btn-primary" href="proveedor-actualizar.php" role="button">Actualizar datos</a>
        <a class="btn btn-success" href="propuesta.php" role="button">Plan de operacion y propuesta</a>
        <a class="btn btn-danger" href="#cierre" role="button">Cerrar sesion</a>
    </center>   
    <br>
    <center>
        <h1>Bienvenido Proveedor</h1>
        <h6>Por favor actualice sus datos si no lo ha hecho</h6>
    </center>
    <br>
    <div class="card">
        <div class="card-header">
            Cargue sus documentos
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <div class="form-group">
                    <label for="user">Usuario</label>
                    <input type="text" class="form-control" id="user"
                    readonly value=<?php echo $_SESSION['USER'];?>>
                </div>
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" class="form-control" id="documento"
                    readonly value=<?php echo $_SESSION['DOC'];?>>
                </div>
                <form action="cargardoc.php" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="archivo">Adjuntar un archivo</label>
                        <input type="file" name="archivo" accept="application/pdf" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </blockquote>
        </div>
    </div>
    <br><br>
    <div class="card">
        <div class="card-header">
            Cargue sus precios
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Numero</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Iva</th>
                            <th scope="col">Material</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>

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
                            <td>Botellas 300 ml</td>
                            <td>3000</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Medplast</td>
                            <td>user@example.com</td>
                            <td>12345</td>
                            <td>$200.000 kg</td>
                            <td>2%</td>
                            <td>PET</td>
                            <td>Botellas 300 ml</td>
                            <td>3000</td>
                        </tr>
                    </tbody>
                </table>
                <center>
                    <a class="btn btn-success" href="precios.php" role="button">Agregar</a>
                </center>   
            </blockquote>
        </div>
    </div>
    <br><br>
</body>
</html>