<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <?php include "head.php";?>

</head>
<body>

<?php
include "navbar.php";
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a  href="<?= $config->get('url').'index.php?controller=Venta&action=create'?>" class="btn btn-info">
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
        <th>NUMERO</th>
        <th>DATE</th>
        <th>SUBTOTAL</th>
        <th>-DESCUENTO</th>
        <th>IVA</th>
        <th>TOTAL</th>
        <th>CLIENTE</th>
        <th>EMPLEADO</th>
        <th>CAJA</th>
        <th>SUCURSAL</th>
        <th>ESTADO</th>

    </tr>

    <?php foreach ($ventas as $venta):?>
    <tr>
        <td><?= $venta->id?></td>
        <td><?= $venta->numero?></td>
        <td><?= $venta->fechahora?></td>
        <td><?= $venta->subtotal?></td>
        <td><?= $venta->descuento?></td>
        <td><?= $venta->iva?></td>
        <td><?= $venta->total?></td>
        <td><?= $venta->cliente()->nombre?></td>
        <td><?= $venta->empleado()->apellido?></td>
        <td><?= $venta->caja()->numero?></td>
        <td><?= $venta->sucursal()->nombre?></td>
        <td><?php if($venta->anulado==0) echo 'ACTIVO'; else echo 'DESACTIVO';?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Venta&action=view&id='.$venta->id?>">Ver</a></td>
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