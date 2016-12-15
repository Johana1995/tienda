<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIENDAS-IVONNE</title>
    <?php include("head.php");?>

</head>
<body>
<?php
include("navbar.php");
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h4><i class='glyphicon glyphicon-star-empty'></i>  <i class='glyphicon glyphicon-star-empty'></i>
            Bienvenido a la seccion de Reportes del la Pagina Tiendas "Ivonne" :)  <i class='glyphicon glyphicon-star-empty'></i>  <i class='glyphicon glyphicon-star-empty'></i> </h4>
    </div>
    <div class="panel-body">
        <div class="container">
            <div class="row">
                <h2 ><span class="glyphicon glyphicon-print"" aria-hidden="true"></span> Reportes del Sistema</h2>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><h4><a target="_blank" href="<?= $config->get('url').'index.php?controller=Reporte&action=empleados'?>"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Generar Reporte de Empleados</a></h4></li>
                        <li role="presentation"><h4><a target="_blank" href="<?= $config->get('url').'index.php?controller=Reporte&action=ventas'?>"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Generar Reporte de Ventas</a></h4></li>
                        <li role="presentation"><h4><a target="_blank" href="<?= $config->get('url').'index.php?controller=Reporte&action=productos'?>"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Generar Reporte de Productos Para Reabastecimiento</a></h4></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
include("footer.php");
?>
</body>
</html>