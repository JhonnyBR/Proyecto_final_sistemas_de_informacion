<?php
session_start();
if(isset($_SESSION['Email'])==null){
  header("Location:http://postoean.freecluster.eu/");
}elseif($_SESSION['Rol']!="Administrador"){
    header("refresh:0.1;url=http://postoean.freecluster.eu/salir.php");
    echo '<script language="javascript"> alert("Lo sentimos pero estas accediendo a zonas restringodas 😮😤")</script>';
}
$proveedores=array();
$cantidades=array();
include("connection.php");
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
    <style>
        #chartdiv {
          width: 100%;
          height: 500px;
      }
  </style>
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
                    <a class="nav-link" href="crearrol.php">Crear usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Proveedor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produccion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="salir.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
</nav> 
<br><br><br>
<h1><center>Gráficas</center></h1>   
<div id="chartdiv"></div>
<?php
$consulta=$mysqli->query("SELECT SUM(cantidad) AS Cantidad, proveedor_id_proveedor AS Proveedor FROM `precio` WHERE fecha>='2021-01-01' GROUP BY proveedor_id_proveedor");
if($consulta->num_rows>=1){
    while($fila = $consulta->fetch_assoc()){
        $proveedor=$mysqli->query("SELECT nombre FROM proveedor WHERE id_proveedor=".$fila['Proveedor']);
        while ($row=$proveedor->fetch_assoc()) {
            $nom_proveedor=$row["nombre"];
            array_push($proveedores,$nom_proveedor);
        }
        $cantidad_pro=$fila["Cantidad"];
        array_push($cantidades,$cantidad_pro);
    }
}
?>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX"
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "country",
  tooltip: am5.Tooltip.new(root, {
    labelText:"{valueY}"
  })
}));

series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


// Set data
<?php
$longitud=sizeof($cantidades);
echo "var data=[";
while($longitud>0){
    echo "{";
    echo "country: '".$proveedores[$longitud-1]."',";
    echo "value: ". $cantidades[$longitud-1]."";
    $longitud=$longitud-1;
    echo"},";
}
echo"];";
?>

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script>
</body>
</html>