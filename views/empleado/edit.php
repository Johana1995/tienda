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
        <div class="form-group">
    <label class="control-label"for="empleado_id">Empleado </label>
    <input class="form-control" type="number" name="empleado_id" value="<?= $empleado->empleado_id?>">
        </div>
    <div class="form-group">    <labelclass="control-label" for="correo">Correo </label>
    <input class="form-control" type="text" name="correo" value="<?= $empleado->correo?>" >
    </div>
    <div class="form-group">    <label class="control-label"for="username">Username </label>
    <input class="form-control" type="text" name="username" value="<?= $empleado->username?>">
    </div>
    <div class="form-group">    <label class="control-label"for="password">Password </label>
    <input class="form-control" type="password" name="password" value="<?= $empleado->password?>">
    </div>
    <div class="form-group">    <labelclass="control-label" for="rol">Cargo </label>
    <select class="form-control" name="rol">
        <?php foreach ($cargos as $cargo):?>
            <option value="<?= $cargo->id?>" <?php if($cargo->id==$empleado->rol_id) echo 'selected';?>><?= $cargo->nombre?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">

    <label class="control-label" for="persona_id">Persona </label>
    <input class="form-control" type="text" name="persona_id" value="<?= $empleado->persona_id?>">
    </div>
    <div class="form-group">    <label class="control-label"for="apellido">Apellido </label>
    <input class="form-control" type="text" name="apellido" value="<?= $empleado->apellido?>">
    </div>
    <div class="form-group">    <label class="control-label"for="nombre">Nombre </label>
    <input class="form-control" type="text" name="nombre" value="<?= $empleado->nombre?>">
    </div>
    <div class="form-group">    <label class="control-label"for="direccion">Direccion </label>
    <input class="form-control" type="text" name="direccion" value="<?= $empleado->direccion?>">
    </div>
    <div class="form-group">    <label class="control-label"for="nacimiento">Nacimiento </label>
    <input class="form-control" type="date" name="nacimiento"  value="<?= $empleado->nacimiento?>">
    </div>
    <div class="form-group">    <label class="control-label"for="genero">Genero </label>
    <select class="form-control" name="genero">
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" <?php if($genero->id==$empleado->genero_id) echo 'selected';?>><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">    <input class="btn btn-primary" type="submit" name="empleado" value="Guardar">
        </div>
</form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
