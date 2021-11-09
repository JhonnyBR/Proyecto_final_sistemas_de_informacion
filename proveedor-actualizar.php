<?php
session_start();
if(isset($_SESSION['Email'])==null){
    header("Location:http://postoean.freecluster.eu/");
}elseif($_SESSION['Rol']!="proveedor"){
    header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
    echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Proveedor</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="shortcut icon" href="https://www.districhapinero.com/assets/media/logo-post.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/163b70c708.js" crossorigin="anonymous"></script>
    </head>
    <style media="screen">
    #titulo{
        text-align: center;
        color: #000000;
    }
    </style>
    <body id="body">
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
                        <a class="nav-link" href="#">Proveedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proveedor.php">Menú principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br>
        <br>
        <h2 id="titulo">Actualizar Datos <i class="fas fa-user-alt"></i></h2>

        <center>
            <div class="card">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                            <form action="actualizar_proveedor.php" method="post">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" name="id" readonly="readonly" value=<?php echo $_SESSION['DOC'];?>  >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tipo">Direccion</label>
                                <input type="text" class="form-control" name="location" placeholder="Direccion" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Región</label>
                                <input type="text" class="form-control" name="region" placeholder="Region" required>
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" placeholder="Telefono" required>
                            </div>
                
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </form>
                    </blockquote>
                </div>
            </div>
        </center>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>