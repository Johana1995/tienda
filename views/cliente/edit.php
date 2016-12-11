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
    <label for="cliente_id">Empleado </label>
    <input type="number" name="cliente_id" value="<?= $cliente->cliente_id?>">
    <br>
    <label for="nit">NIT </label>
    <input type="number" name="nit" value="<?= $cliente->nit?>" >
    <br>
    <label for="fecha_creacion">Creacion </label>
    <input type="date" name="fecha_creacion" value="<?= $cliente->fecha_creacion?>">
    <br>

    <br>
    <label for="tipo">Tipo </label>
    <select name="tipo">
        <?php foreach ($tipos as $tipo):?>
            <option value="<?= $tipo->id?>" <?php if($tipo->id==$cliente->tipo_id) echo 'selected';?>><?= $tipo->descripcion?></option>
        <?php endforeach; ?>
    </select>
   <br>

    <label for="persona_id">Persona </label>
    <input type="text" name="persona_id" value="<?= $cliente->persona_id?>">
    <br>
    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" value="<?= $cliente->apellido?>">
    <br>
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" value="<?= $cliente->nombre?>">
    <br>
    <label for="direccion">Direccion </label>
    <input type="text" name="direccion" value="<?= $cliente->direccion?>">
    <br>
    <label for="nacimiento">Nacimiento </label>
    <input type="date" name="nacimiento"  value="<?= $cliente->nacimiento?>">
    <br>
    <label for="genero">Genero </label>
    <select name="genero">
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" <?php if($genero->id==$cliente->genero_id) echo 'selected';?>><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" name="empleado" value="Guardar">
</form>
</body>
</html>