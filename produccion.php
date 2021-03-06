<?php
session_start();
if(isset($_SESSION['Email'])==null){
    header("Location:http://postoean.freecluster.eu/");
}elseif($_SESSION['Rol']!="produccion"){
    header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
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
    <title>Index produccion</title>
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
                <li class="nav-item ">
                    <a class="nav-link active" href="produccion.html">Produccion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="salir.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <h1>
        <center> Tabla de inventario </center>
    </h1>   
    <br><br><br> 
    <div class="container-sm">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Material</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                $query=$mysqli->query("SELECT * FROM precios");
                $ids= array();
                if($query->num_rows!=0){
                    while($row = $query->fetch_assoc()){
                        array_push($ids, $row['proveedor_codigo_proveedor']);
                    }
                    $longitud=sizeof($ids);
                    while($longitud>=1){
                        echo "<tr><th scope='row'>".$ids[$longitud-1]."</th>";
                        $longitud=$longitud-1;
                        $consulta=$mysqli->query("SELECT nombre FROM administrador WHERE Documento=".$ids[$longitud]);
                        while($fila = $consulta->fetch_assoc()){
                            echo "<td>".$fila['nombre']."</td>";
                        }
                        $consulta2= $mysqli->query("SELECT * FROM precios WHERE proveedor_codigo_proveedor=".$ids[$longitud]);
                        while($datos= $consulta2->fetch_assoc()){
                            echo"<td>".$datos['Producto']."</td>
                            <td>".$datos['material']."</td>
                            <td>".$datos['Cantidad']."</td>
                            <td>".$datos['precios']."</td>";
                        }

                    }
            }else{
                echo "<h2 class='title-if'>Actualmente no tienen contratado ningún proveedor 😔</h2>";
            }
            ?>

        </tbody>
    </table>
</div>
</body>
</html>