<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLIENTE</title>
</head>
<body>
<a href="<?= $config->get('url').'index.php?controller=Cliente&action=create'?>">Nuevo</a>
<br>
<table >
    <tr>
        <td>ID</td>
        <td>NIT</td>
        <td>CREACION</td>
        <td>TIPO</td>
        <td>ID PERSONA</td>
        <td>APELLIDO</td>
        <td>NOMBRE</td>
        <td>DIRECCION</td>
        <td>NACIMIENTO</td>
        <td>GENERO</td>
         </tr>
    <?php foreach ($clientes as $cliente):?>
    <tr>
        <td><?= $cliente->cliente_id?></td>
        <td><?= $cliente->nit?></td>
        <td><?= $cliente->fecha_creacion?></td>
        <td><?= $cliente->tipo?></td>
        <td><?= $cliente->persona_id?></td>
        <td><?= $cliente->apellido?></td>
        <td><?= $cliente->nombre?></td>
        <td><?= $cliente->direccion?></td>
        <td><?= $cliente->nacimiento?></td>
        <td><?= $cliente->genero?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Cliente&action=edit&id='.$cliente->cliente_id?>">edit</a></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Cliente&action=delete&cliente='.$cliente->cliente_id.'&persona='.$cliente->persona_id?>">delete</a></td>
    </tr>
    <?php endforeach;?>
</table>

</body>
</html>