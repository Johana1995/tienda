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
    <label for="nit">NIT </label>
    <input type="number" name="nit" placeholder="NIT" >
    <br>
    <label for="fecha_creacion">Creacion </label>
    <input type="date" name="fecha_creacion" placeholder="fecha de creacion" value="<?php echo Date("Y-m-d");?>">
    <br>

    <br>
    <label for="tipo">Tipo </label>
    <select name="tipo">
        <?php foreach ($tipos as $tipo):?>
            <option value="<?= $tipo->id?>" ><?= $tipo->descripcion?></option>
        <?php endforeach; ?>
    </select>
   <br>

    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" placeholder="Apellidos" ">
    <br>
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" placeholder="Nombres">
    <br>
    <label for="direccion">Direccion </label>
    <input type="text" name="direccion" placeholder="Direccion ">
    <br>
    <label for="nacimiento">Nacimiento </label>
    <input type="date" name="nacimiento" >
    <br>
    <label for="genero">Genero </label>
    <select name="genero">
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" ><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" name="empleado" value="Guardar">
</form>
</body>
</html>