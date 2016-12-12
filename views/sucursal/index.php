<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucursal</title>
</head>
<body>
<a href="<?= $config->get('url').'index.php?controller=Sucursal&action=create'?>">Nuevo</a>
<br>
<table >
    <tr>
        <td>ID</td>
        <td>NUMERO</td>
        <td>DIRECCION</td>
        <td>NOMBRE</td>
    </tr>
    <?php foreach ($sucursales as $sucursal):?>
    <tr>
        <td><?= $sucursal->id?></td>
        <td><?= $sucursal->numero?></td>
        <td><?= $sucursal->direccion?></td>
        <td><?= $sucursal->nombre?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Sucursal&action=view&id='.$sucursal->id?>">Ver</a></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Sucursal&action=delete&sucursal='.$sucursal->id?>">delete</a></td>
    </tr>
    <?php endforeach;?>
</table>

</body>
</html>