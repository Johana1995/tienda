<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleado</title>
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
    <label for="correo" class="control-label">Correo </label>
    <input type="email" class="form-control" name="correo" placeholder="nombre@dominio.com" required>
        </div>

    <div class="form-group">
    <label for="username" class="control-label">Username </label>
    <input type="text" class="form-control" name="username" placeholder="user name" required>
    </div>

    <div class="form-group">
    <label for="password" class="control-label">Password </label>
    <input type="password" class="form-control" name="password" placeholder="password" required>
    </div>

    <div class="form-group">
    <label for="rol" class="control-label">Cargo </label>
    <select class="form-control" name="rol" required>
        <?php foreach ($cargos as $cargo):?>
            <option value="<?= $cargo->id?>" ><?= $cargo->nombre?></option>
        <?php endforeach; ?>
    </select >
    </div>

    <div class="form-group">
    <label for="apellido" class="control-label">Apellido </label>
    <input  class="form-control"type="text" name="apellido" placeholder="Apellidos" required>
    </div>

    <div class="form-group">
    <label for="nombre" class="control-label">Nombre </label>
    <input class="form-control" type="text" name="nombre" placeholder="Nombres" required>
    </div>

    <div class="form-group">
    <label for="direccion" class="control-label">Direccion </label>
    <input class="form-control" type="text" name="direccion" placeholder="Direccion o domicilio" required>
    </div>

    <div class="form-group">
    <label for="nacimiento" class="control-label">Nacimiento </label>
    <input class="form-control" type="date" name="nacimiento" value="1995/01/01" required>
    </div>

    <div class="form-group">
    <label for="genero" class="control-label">Genero </label>
    <select class="form-control" name="genero" required>
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" ><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    </div>

    <div class="form-group">
    <input  class="btn btn-primary" type="submit" name="empleado" value="Guardar">
        </div>
</form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
