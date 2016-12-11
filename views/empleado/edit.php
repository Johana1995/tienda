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
    <label for="empleado_id">Empleado </label>
    <input type="number" name="empleado_id" value="<?= $empleado->empleado_id?>">
    <br>
    <label for="correo">Correo </label>
    <input type="text" name="correo" value="<?= $empleado->correo?>" >
    <br>
    <label for="username">Username </label>
    <input type="text" name="username" value="<?= $empleado->username?>">
    <br>
    <label for="password">Password </label>
    <input type="password" name="password" value="<?= $empleado->password?>">
    <br>
    <label for="rol">Cargo </label>
    <select name="rol">
        <?php foreach ($cargos as $cargo):?>
            <option value="<?= $cargo->id?>" <?php if($cargo->id==$empleado->rol_id) echo 'selected';?>><?= $cargo->nombre?></option>
        <?php endforeach; ?>
    </select>
   <br>

    <label for="persona_id">Persona </label>
    <input type="text" name="persona_id" value="<?= $empleado->persona_id?>">
    <br>
    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" value="<?= $empleado->apellido?>">
    <br>
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" value="<?= $empleado->nombre?>">
    <br>
    <label for="direccion">Direccion </label>
    <input type="text" name="direccion" value="<?= $empleado->direccion?>">
    <br>
    <label for="nacimiento">Nacimiento </label>
    <input type="date" name="nacimiento"  value="<?= $empleado->nacimiento?>">
    <br>
    <label for="genero">Genero </label>
    <select name="genero">
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" <?php if($genero->id==$empleado->genero_id) echo 'selected';?>><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" name="empleado" value="Guardar">
</form>
</body>
</html>