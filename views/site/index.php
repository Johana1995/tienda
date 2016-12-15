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
            Bienvenido al Controlador del la Pagina Web "Site" :)  <i class='glyphicon glyphicon-star-empty'></i>  <i class='glyphicon glyphicon-star-empty'></i> </h4>
    </div>
    <div class="panel-body">



<a href="#">logout</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Producto&action=index'?>">Productos</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Empleado&action=index'?>">Empleados</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Cliente&action=index'?>">Clientes</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Sucursal&action=index'?>">Sucursal</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Venta&action=index'?>">Ventas</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Cargo&action=index'?>">Cargos</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Reporte&action=index'?>">Reportes</a>

</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>