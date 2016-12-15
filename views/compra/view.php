<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra-View</title>
    <?php include("head.php");?>
</head>
<body>
<?php
include("navbar.php");
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-edit'></i> COMPRA</h4>


            <div class="form-group row">
         <table class="table table-hover">
        <tr>
            <th>Numero</th>
            <th>Fecha</th>
            <th>TOTAL</th>
            <th>Empleado</th>
            <th>Proveedor</th>
            <th>Sucursal</th>

        </tr>
        <tr>
            <td><?= $compra->numero ?></td>
            <td><?= $compra->fechahora ?></td>
            <td><?= $compra->total ?></td>
            <td><?= $compra->proveedor()->encargado ?></td>
            <td><?= $compra->empleado()->apellido ?></td>
            <td><?= $compra->sucursal()->nombre ?></td>
        </tr>
    </table>
            </div>
        </div>
        <div class="panel-body">

            <div class="row-fluid">

    <h2>Productos </h2>
                <table class="table table-hover">        <tr>

        </tr>
        <tr>
            <th>ID</th>
            <TH>CODIGO</TH>
            <th>PRECIO U</th>
            <TH>PRECIO PACK</TH>
            <TH>UNIDADES PACK</TH>
            <TH>DEPTO.</TH>
            <TH>UNIDADES</TH>
            <TH>PAQUETES</TH>


        </tr>
        <?php
        foreach ($productos as $producto):
        ?>
        <tr>
        <td><?= $producto->id; ?></td>
        <td><?= $producto->codigo; ?></td>
        <td><?= $producto->precioU; ?></td>
        <td><?= $producto->precioP; ?></td>
        <td><?= $producto->cantP; ?></td>
        <td><?= $producto->depto; ?></td>
        <td><?= $producto->cantidadU; ?></td>
        <td><?= $producto->cantidadP; ?></td>
        </tr>
        <?php endforeach; ?>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>

                        <td>TOTAL</td>
                        <td><?= $compra->total ?> </td>
                    </tr>

                </table>

            </div>

            <?php
            include("footer.php");
            ?>
        </div>
    </div>
</body>
</html>