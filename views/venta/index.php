<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
</head>
<body>
<td><a href="<?= $config->get('url').'index.php?controller=Venta&action=create'?>">Nueva Venta</a></td>

<table >
    <tr>
        <th>ID</th>
        <th>NUMERO</th>
        <th>DATE</th>
        <th>SUBTOTAL</th>
        <th>-DESCUENTO</th>
        <th>IVA</th>
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
        <td><?= $venta->subtotal?></td>
        <td><?= $venta->descuento?></td>
        <td><?= $venta->iva?></td>
        <td><?= $venta->caja?></td>
        <td><?= $venta->sucursal?></td>
        <td><?= $venta->estado?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Venta&action=view&venta='.$venta->id?>">Ver</a></td>
    </tr>
    <?php endforeach;?>

</table>

</body>
</html>