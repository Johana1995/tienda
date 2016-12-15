<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta-View</title>
    <?php include("head.php");?>
</head>
<body>
<?php
include("navbar.php");
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-edit'></i> Venta</h4>


            <div class="form-group row">
         <table class="table table-hover">
        <tr>
            <th>Numero</th>
            <th>Fecha</th>

            <th>Cliente</th>
            <th>Empleado</th>
            <th>Sucursal</th>
            <th>Caja</th>
            <th>Estado</th>

        </tr>
        <tr>
            <td><?= $venta->numero ?></td>
            <td><?= $venta->fechahora ?></td>

            <td><?= $venta->cliente()->apellido ?></td>
            <td><?= $venta->empleado()->apellido ?></td>
            <td><?= $venta->sucursal()->nombre ?></td>
            <td><?= $venta->caja()->numero ?></td>
            <td><?php if($venta->anulado==0) echo 'ACTIVO'; else echo 'DESACTIVO';?></td>
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
            <TH>SUBTOTAL</TH>


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
        <td ><?= $producto->subtotal;?></td>
        </tr>
        <?php endforeach; ?>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>SubtotalVenta </td>
                        <td><?= $venta->subtotal ?> </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>IVA </td>
                        <td><?= $venta->iva  ?> </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>Descuento </td>
                        <td><?= $venta->descuento ?></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>TOTAL </td>
                        <td><?= $venta->total ?></td>
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