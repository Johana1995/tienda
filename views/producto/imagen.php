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
<h2>Imagenes</h2>
<a href="<?= $config->get('url').'index.php?controller=Producto&action=upload&id='.$producto_id?>">Subir</a>
<table >
    <?php foreach ($imagenes as $image):?>
    <tr>
        <td><?= $image->id?></td>
        <td><?= $image->producto_id?></td>
        <td>
            <img style="width: 200px" src="<?=$config->get('imagenruta').$image->url?>" alt="<?= $image->url?>">
        </td>
        <td><a href="<?= $config->get('url').'index.php?controller=Producto&action=deleteImage&producto='.$image->producto_id.'&imagen='.$image->id?>">Eliminar</a></td>
    </tr>
    <?php endforeach;  ?>

</table>
</body>
</html>