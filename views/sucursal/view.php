<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucursal-Productos</title>
    <?php include("head.php");?>
</head>
<body>
<?php
include("navbar.php");
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-edit'></i> Sucursal</h4>


            <div class="form-group row">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>NUMERO</th>
                        <th>DIRECCION</th>
                        <th>NOMBRE</th>
                    </tr>
                    <tr>
                        <td><?= $sucursal->id ?></td>
                        <td><?= $sucursal->numero ?></td>
                        <td><?= $sucursal->direccion ?></td>
                        <td><?= $sucursal->nombre ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel-body">

            <div class="row-fluid">


                <h2>Productos:</h2>
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <TH>CODIGO</TH>
                        <th>DETALLE</th>
                        <TH>PACK $</TH>
                        <TH>UND $</TH>
                        <TH>PAQ ID</TH>
                        <TH>PAQ UN</TH>
                        <TH>DEPTO ID</TH>
                        <TH>DEPARTAMENTO</TH>
                        <TH>CANT U. EXIST</TH>
                        <TH>CANT. PACK EXIST</TH>
                        <TH>CANT. U. MIN</TH>
                    </tr>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= $producto->id ?></td>
                            <td><?= $producto->codigo ?></td>
                            <td><?= $producto->detalle ?></td>
                            <td><?= $producto->precioPackinVenta ?></td>
                            <td><?= $producto->precioUnidadVenta ?></td>
                            <td><?= $producto->paquete_id ?></td>
                            <td><?= $producto->cantUnidades ?></td>
                            <td><?= $producto->depto_id ?></td>
                            <td><?= $producto->descripcion ?></td>
                            <td><?= $producto->cantidadExistente ?></td>
                            <td><?= $producto->cantidadPackExistente ?></td>
                            <td><?= $producto->cantidadUnidadMinima ?></td>
                            <td>
                                <a href="<?= $config->get('url') . 'index.php?controller=Sucursal&action=deleteProducts&producto=' . $producto->id . '&sucursal=' . $sucursal->id ?>">Remove</a>
                            </td>
                            <td>
                                <a href="<?= $config->get('url') . 'index.php?controller=Sucursal&action=stock&producto=' . $producto->id . '&sucursal=' . $sucursal->id ?>">Ingresar stock</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </table>

            </div>
        </div>
        <div class="row-fluid">

            <h2>Otros Productos </h2>

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
                <?php foreach ($otrosProductos as $producto): ?>
                    <tr>
                        <td><?= $producto->id ?></td>
                        <td><?= $producto->codigo ?></td>
                        <td><?= $producto->codigobarra ?></td>
                        <td><?= $producto->detalle ?></td>
                        <td><?= $producto->precioFabricaU ?></td>
                        <td><?= $producto->precioFabricaPack ?></td>
                        <td><?= $producto->imagen ?></td>
                        <td><?= $producto->precioUnidadVenta ?></td>
                        <td><?= $producto->precioPackinVenta ?></td>
                        <td><?= $producto->paquete()->cantUnidades ?></td>
                        <td><?= $producto->departamento()->descripcion ?></td>
                        <td>
                            <a href="<?= $config->get('url') . 'index.php?controller=Sucursal&action=addProducts&producto=' . $producto->id . '&sucursal=' . $sucursal->id ?>">agregar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>

            <?php
            include("footer.php");
            ?>
        </div>
    </div>
</body>
</html>