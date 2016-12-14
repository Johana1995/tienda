<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <table>
        <tr>
            <th>Datos de la Tienda:</th>
            <th>Datos del Empleado:</th>
        </tr>
        <tr>
            <td><label>Sucursal: <?= User::singleton()->sucursal() ?></label><br><label>Caja: <?= User::singleton()->caja() ?></label></td>
            <td><label>Empleado: <?= User::singleton()->nombre ?>( <?= User::singleton()->rol() ?>)</label></td>
        </tr>
        <tr><th>Datos del Cliente</th></tr>
        <tr>
            <td><select name="cliente">
                    <?php foreach ($clientes as $cliente):?>
                        <option value="<?= $cliente->cliente_id?>"><?= $cliente->apellido.', '.$cliente->nombre.'('.$cliente->nit.')'?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </table>
</div>

<div style="border-style: solid">
<table
</div>

<h2>Carrito:</h2>
<form method="post">
<table style="border-style: solid">
    <tr>
        <th>ID PROD.</th>
        <TH>CODIGO</TH>
        <th>UNID. ($)</th>
        <TH>PACK. ($(</TH>
        <TH>CANT-PACK</TH>
        <TH>DEPTO.</TH>
        <TH>U.VENTA</TH>
        <TH>PACK. VENTA</TH>
    </tr>
    <?php foreach ($carrito as $producto):?>
        <tr>

            <td><?= $producto->producto?></td>
            <td><?= $producto->codigo?></td>
            <td><?= $producto->precioU?></td>
            <td><?= $producto->precioP?></td>
            <td><?= $producto->cantP?></td>
            <td><?= $producto->depto?></td>
            <td><?= $producto->cantidadU?></td>
            <td><?= $producto->cantidadP?></td>
            <td><a href="<?= $config->get('url').'index.php?controller=Venta&action=removeProducts&producto='.$producto->producto?>">Remover</a></td>
        </tr>
    <?php endforeach;?>
</table>
    <input value="GUARDAR" type="submit">
</form>
<div>
    <h2>Productos Disponibles:</h2>
    <table style="border-style: solid">
        <tr>
            <th>ID</th>
            <TH>CODIGO</TH>
            <th>DETALLE</th>
            <TH>PACK $</TH>
            <TH>UND $</TH>
            <TH>PAQ UN</TH>
            <TH>DEPTO</TH>
            <TH>CANT U. EXIST</TH>
            <TH>CANT. PACK EXIST</TH>
            <TH>CANT. U. MIN</TH>
        </tr>
        <?php foreach ($productos as $producto):?>
            <tr>

                <td><?= $producto->id?></td>
                <td><?= $producto->codigo?></td>
                <td><?= $producto->detalle?></td>
                <td><?= $producto->precioPackinVenta?></td>
                <td><?= $producto->precioUnidadVenta?></td>
                <td><?= $producto->paquete?></td>
                <td><?= $producto->depto?></td>
                <td><?= $producto->cantidadExistente?></td>
                <td><?= $producto->cantidadPackExistente?></td>
                <td><?= $producto->cantidadUnidadMinima?></td>
                <td><a href="<?= $config->get('url').'index.php?controller=Venta&action=addProducts&producto='.$producto->id?>">Agregar</a></td>

            </tr>
        <?php endforeach;?>
    </table>

</div>
</body>
</html>