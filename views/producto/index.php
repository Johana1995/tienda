<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto</title>
</head>
<body>

<table >
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

</body>
</html>