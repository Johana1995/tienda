<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo-Index</title>
</head>
<body>
<td><a href="<?= $config->get('url').'index.php?controller=Cargo&action=create'?>">Nuevo</a></td>

<table >
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
    </tr>

    <?php foreach ($cargos as $cargo):?>
    <tr>
        <td><?= $cargo->id?></td>
        <td><?= $cargo->nombre?></td>
        <td><?= $cargo->descripcion?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Cargo&action=edit&id='.$cargo->id?>">edit</a></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Cargo&action=delete&id='.$cargo->id?>">delete</a></td>
    </tr>
    <?php endforeach;?>

</table>

</body>
</html>