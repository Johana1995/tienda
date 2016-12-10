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
<input type="text" name="codigo" placeholder="codigo" >
<br>
<input type="text" name="barra" placeholder="codigo barra">
<br>
<input type="text" name="detalle" placeholder="detalle del producto">
<br>
<input type="number" name="ufabrica" placeholder="precio unidad de fabrica ">
<br>
<input type="number" name="packfabrica" placeholder="precio pack de fabrica">
<br>
<input type="text" name="imagen" placeholder="imagen">
<br>
<input type="number" name="uventa" placeholder="precio unidad venta">
<br>
<input type="number" name="packventa" placeholder="precio pack venta">
<br>
<select name="paquete">
    <?php foreach ($paquetes as $paquete):?>
    <option value="<?= $paquete->id?>"><?= $paquete->cantUnidades?></option>
    <?php endforeach; ?>
</select>
<br>
<select name="depto">
    <?php foreach ($deptos as $depto):?>
        <option value="<?= $depto->id?>"><?= $depto->descripcion?></option>
    <?php endforeach; ?>
</select>
    <input type="submit" name="producto" value="Crear">
</form>
</body>
</html>