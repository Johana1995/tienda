<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traspasos</title>
    <?php include "head.php";?>

</head>
<body>

<?php
include "navbar.php";
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">

            <form class="form-horizontal" role="form" id="datos_cotizacion">

                <div class="form-group row">
                    <div class="col-md-5">
                        <h3> TRASPASO DE PRODUCTOS DE LA SUCURSAL <h2><?php $sucursalE ?></h2> A LA SUCURSAL   <h2><?php $sucursalR?></h2></h3>
                    </div>

                </div>
            </form>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>CODIGO</th>
                    <th>PAQUETE</th>
                    <th>DEPTO</th>
                    <th>U EXISTENTE</th>
                    <th>PACK EXISTENTE</th>
                    <th>U. MINIMA</th>
                </tr>
                <?php foreach ($prodR as $venta):?>
                    <tr>
                        <td><?= $venta->id?></td>
                        <td><?= $venta->codigo?></td>
                        <td><?= $venta->paquete?></td>
                        <td><?= $venta->cantidadExistente?></td>
                        <td><?= $venta->cantidadPackExistente?></td>
                        <td><?= $venta->cantidadUnidadMinima?></td>

                        <td><a href="<?= $config->get('url').'index.php?controller=&action=view&id='.$venta->id?>">Ver</a></td>
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