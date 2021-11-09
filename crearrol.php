<?php
    session_start();
    if(isset($_SESSION['Email'])==null){
        header("Location:http://postoean.freecluster.eu/");
    }elseif($_SESSION['Rol']!="Administrador"){
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
        <title>Actualizar usuario</title>
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
                        <a class="nav-link" href="admin.php">Administrador<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="admin.php">Menu principal</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="salir.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br>
        <h2 id="titulo">CREAR ROLES <i class="fas fa-user-alt"></i></h2>

        <center>
        <form action="new_user.php" method="post">
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="id">Documento</label>
                <input type="text" class="form-control" name="id" placeholder= "Documento" pattern="[0-9-]{3-45}" required>
            </div>
            <div class="group">
                <label for="tipo">Tipo Documento</label>
                <br>
                <!--<input type="text" class="form-control" name="tipo" value="Tipo">-->
                <select name="tipdoc"  type="text" class="form-control" required>
                            <option value="cedula">Cédula</option>
                            <option value="NIT">NIT</option>
                            <option value="Tarjeta de extranjería">Tarjeta de extranjería</option>
                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                            <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="nombre">Dirección</label>
                <input type="text" class="form-control" name="dir" placeholder="Dirección" required>
            </div>
            <div class="form-group">
                <label for="nombre">Región</label>
                <input type="text" class="form-control" name="reg" placeholder="Región" required>
            </div>
            <!--<div class="form-group">
                <label for="nombre">Materilaes</label>
                <input type="text" class="form-control" name="mat" placeholder="Materilaes" required>
            </div>
            <div class="form-group">
                <label for="nombre">Precio</label>
                <input type="text" class="form-control" name="precio" placeholder="Precio" required>
            </div>
            <div class="form-group">
                <label for="nombre">Valor IVA</label>
                <input type="text" class="form-control" name="v_iva" placeholder="Valor IVA" required>
            </div>
            <div class="form-group">
                <label for="nombre">Porcentaje del iva</label>
                <input type="text" class="form-control" name="p_iva" placeholder="Porcentaje del iva" required>
            </div>-->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" name="celular" placeholder="Celular" required>
            </div>
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" name="user" placeholder="User" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="password" required>
            </div>
            <div class="form-select">
                <label for="rol">Rol</label>
                <br>
                <!--<input type="text" class="form-control" name="rol" placeholder="rol">-->
                <select name="rol"  type="text" class="form-control">
                            <option value="Administrador">Administrador</option>
                            <option value="proveedor">proveedor</option>
                            <option value="produccion">produccion</option>
                </select>
            
            </div>
            <br>
            <button type="submit" class="btn btn-success">Crear</button>

            <br>
            <br>
            <br>
            <br>
        </form>
        </center>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>