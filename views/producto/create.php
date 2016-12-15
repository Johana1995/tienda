<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRODUCTO-CREATE</title>
    <?php include("head.php");?>
</head>
<body>

<?php
include("navbar.php");
?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-edit'></i> Crear </h4>
        </div>
        <div class="panel-body">
<form action="" method="post">

<div class="form-group">
    <label for="codigo" class="control-label">codigo </label>
    <input class="form-control" type="text" name="codigo" placeholder="codigo" >
</div>

    <div class="form-group">
        <label for="barra" class="control-label">barra </label>
<input class="form-control"type="text" name="barra" placeholder="codigo barra">
    </div>

    <div class="form-group">
        <label for="detalle" class="control-label">detalle </label>
        <input class="form-control"type="text" name="detalle" placeholder="detalle del producto">
    </div>

    <div class="form-group">
        <label for="ufabrica" class="control-label">Precio de Fabrica(Unidades): </label>
        <input class="form-control" type="number" name="ufabrica" placeholder="precio unidad de fabrica ">
    </div>

    <div class="form-group">
        <label for="packfabrica" class="control-label">Precio de Fabrica(Paquete): </label>
        <input class="form-control" type="number" name="packfabrica" placeholder="precio pack de fabrica">
    </div>

    <div class="form-group">
        <label for="imagen" class="control-label">Imagenes:</label>
        <input class="form-control"type="text" name="imagen" placeholder="imagen">
    </div>

    <div class="form-group">
        <label for="uventa" class="control-label">Precio de Venta(Unidades): </label>
        <input class="form-control" type="number" name="uventa" placeholder="precio unidad venta">
    </div>

    <div class="form-group">
        <label for="packventa" class="control-label">Precio de Venta(Paquetes): </label>
        <input class="form-control" type="number" name="packventa" placeholder="precio pack venta">
    </div>

    <div class="form-group">
        <label for="paquete" class="control-label">Unidades en paquete: </label>

        <select class="form-control" name="paquete">
    <?php foreach ($paquetes as $paquete):?>
    <option value="<?= $paquete->id?>"><?= $paquete->cantUnidades?></option>
    <?php endforeach; ?>
</select>
    </div>

    <div class="form-group">
        <label for="depto" class="control-label">Departamento: </label>
        <select class="form-control" name="depto">
    <?php foreach ($deptos as $depto):?>
        <option value="<?= $depto->id?>"><?= $depto->descripcion?></option>
    <?php endforeach; ?>
</select>
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="producto" value="Crear">
        </div>
</form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
