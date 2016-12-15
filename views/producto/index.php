<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto</title>
    <?php include("head.php");?>

</head>
<body>

<?php
include("navbar.php");
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a  href="<?= $config->get('url').'index.php?controller=Producto&action=create'?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus" ></span> Nuevo </a>
            </div>

            <form class="form-horizontal" role="form" id="datos_cotizacion">

                <div class="form-group row">
                    <div class="col-md-5">
                    </div>

                </div>
            </form>
        </div>
        <div class="panel-body">
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>CODIGO</th>
        <th>BARRA</th>
        <th>DETALLE</th>
        <th>U.FABRICA $</th>
        <th>PACK. FABRICA $</th>
        <th>IMAGEN</th>
        <th>U.VENTA $</th>
        <th>PACK.VENTA $</th>
        <th>U. EN PACK</th>
        <th>DEPTO</th>

    </tr>

    <?php foreach ($productos as $producto):?>
    <tr>
        <td><?= $producto->id?></td>
        <td><?= $producto->codigo?></td>
        <td><?= $producto->codigobarra?></td>
        <td><?= $producto->detalle?></td>
        <td><?= $producto->precioFabricaU?></td>
        <td><?= $producto->precioFabricaPack?></td>
        <td><?= $producto->imagen?></td>
        <td><?= $producto->precioUnidadVenta?></td>
        <td><?= $producto->precioPackinVenta?></td>
        <td><?= $producto->paquete()->cantUnidades?></td>
        <td><?= $producto->departamento()->descripcion?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Producto&action=edit&id='.$producto->id?>">edit</a></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Producto&action=delete&id='.$producto->id?>">delete</a></td>
        <td><a href="<?= $config->get('url').'?controller=Producto&action=imagen&id='.$producto->id?>">Imagenes</a></td>
    </tr>
    <?php endforeach;?>
</table>

        </div>
        <?php
        include("footer.php");
        ?>
    </div>
</div>
</body>
</html>