<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>producto</title>
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

        <div class="form-group">    <label class="control-label"for="id">ID </label>
    <input type="number"class="form-control" name="id" value="<?= $producto->id?>">
        </div>
    <div class="form-group">    <label class="control-label"for="codigo">CODIGO </label>
    <input type="text" class="form-control"name="codigo" value="<?= $producto->codigo?>" >
    </div>
    <div class="form-group">    <label class="control-label"for="barra">Codigo Barra: </label>
    <input type="text" class="form-control"name="barra" value="<?= $producto->codigobarra?>">
    </div>
    <div class="form-group">    <label class="control-label"for="detalle">Detalle: </label>
    <input type="text" class="form-control"name="detalle" value="<?= $producto->detalle?>">
    </div>
    <div class="form-group">    <label class="control-label"for="ufabrica">Precio Unidad Fabrica: </label>
    <input type="number" class="form-control" name="ufabrica" value="<?= $producto->precioFabricaU?>">
    </div>
    <div class="form-group">    <label class="control-label"for="packfabrica">Precio Paquete Fabrica: </label>
    <input type="number"class="form-control" name="packfabrica" value="<?= $producto->precioFabricaPack?>">
    </div>
    <div class="form-group">    <label class="control-label"for="imagen">Imagen </label>
    <input type="text" class="form-control" name="imagen" value="<?= $producto->imagen?>">
    </div>
    <div class="form-group">    <label class="control-label"for="uventa">Precio Unidad Venta: </label>
    <input type="number"class="form-control"name="uventa" value="<?= $producto->precioUnidadVenta?>">
    </div>
    <div class="form-group">    <label class="control-label"for="username">Precio Paquete Venta: </label>
    <input type="number"class="form-control" name="packventa" value="<?= $producto->precioPackinVenta?>">
    </div>
    <div class="form-group">    <label class="control-label"for="paquete">Unidades En Paquete </label>
    <select class="form-control"name="paquete">
        <?php foreach ($paquetes as $paquete):?>

            <option value="<?= $paquete->id?>" <?php if($producto->paquete_id==$paquete->id) echo 'selected';?>><?= $paquete->cantUnidades?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">    <label class="control-label"for="depto">Departamento: </label>
    <select class="form-control"name="depto">
        <?php foreach ($deptos as $depto):?>
            <option value="<?= $depto->id?>" <?php if($producto->depto_id==$depto->id) echo 'selected';?>><?= $depto->descripcion?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary"   name="producto" value="Guardar">
    </div>
</form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
