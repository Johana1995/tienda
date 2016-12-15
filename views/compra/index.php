<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compras</title>
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
                <a  href="<?= $config->get('url').'index.php?controller=Compra&action=create'?>" class="btn btn-info">
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
        <th>TOTAL</th>
        <th>EMPLEADO</th>
        <th>PROVEEDOR</th>
        <th>SUCURSAL</th>

    </tr>

    <?php foreach ($compras as $compra):?>
    <tr>
        <td><?= $compra->id?></td>
        <td><?= $compra->numero?></td>
        <td><?= $compra->fechahora?></td>
        <td><?= $compra->total?></td>
        <td><?= $compra->proveedor()->encargado?></td>
        <td><?= $compra->empleado()->apellido?></td>
        <td><?= $compra->sucursal()->nombre?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Compra&action=view&id='.$compra->id?>">Ver</a></td>
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