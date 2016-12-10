<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>producto</title>
</head>
<body>
<form action="" method="post">
    <input type="number" name="id" value="<?= $producto->id?>">
    <br>
    <input type="text" name="codigo" value="<?= $producto->codigo?>" >
    <br>
    <input type="text" name="barra" value="<?= $producto->codigobarra?>">
    <br>
    <input type="text" name="detalle" value="<?= $producto->detalle?>">
    <br>
    <input type="number" name="ufabrica" value="<?= $producto->precioFabricaU?>">
    <br>
    <input type="number" name="packfabrica" value="<?= $producto->precioFabricaPack?>">
    <br>
    <input type="text" name="imagen" value="<?= $producto->imagen?>">
    <br>
    <input type="number" name="uventa" value="<?= $producto->precioUnidadVenta?>">
    <br>
    <input type="number" name="packventa" value="<?= $producto->precioPackinVenta?>">
    <br>
    <select name="paquete">
        <?php foreach ($paquetes as $paquete):?>

            <option value="<?= $paquete->id?>" <?php if($producto->paquete_id==$paquete->id) echo 'selected';?>><?= $paquete->cantUnidades?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="depto">
        <?php foreach ($deptos as $depto):?>
            <option value="<?= $depto->id?>" <?php if($producto->depto_id==$depto->id) echo 'selected';?>><?= $depto->descripcion?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" name="producto" value="Guardar">
</form>
</body>
</html>