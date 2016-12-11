<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleado</title>
</head>
<body>

<form action="" method="post">
    <label for="correo">Correo </label>
    <input type="email" name="correo" placeholder="nombre@dominio.com" required>
    <br>
    <label for="username">Username </label>
    <input type="text" name="username" placeholder="user name" required>
    <br>
    <label for="password">Password </label>
    <input type="password" name="password" placeholder="password" required>
    <br>
    <label for="rol">Cargo </label>
    <select name="rol" required>
        <?php foreach ($cargos as $cargo):?>
            <option value="<?= $cargo->id?>" ><?= $cargo->nombre?></option>
        <?php endforeach; ?>
    </select >
    <br>
    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" placeholder="Apellidos" required>
    <br>
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" placeholder="Nombres" required>
    <br>
    <label for="direccion">Direccion </label>
    <input type="text" name="direccion" placeholder="Direccion o domicilio" required>
    <br>
    <label for="nacimiento">Nacimiento </label>
    <input type="date" name="nacimiento" value="1995/01/01" required>
    <br>
    <label for="genero">Genero </label>
    <select name="genero" required>
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" ><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" name="empleado" value="Guardar">
</form>
</body>
</html>