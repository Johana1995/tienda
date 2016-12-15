<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLIENTE-EDIT</title>
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
    <label class="control-label"for="cliente_id">Empleado </label>
    <inputclass="form-control"  type="number" name="cliente_id" value="<?= $cliente->cliente_id?>">
    </div>
    <div class="form-group">
    <label class="control-label"for="nit">NIT </label>
    <input  class="form-control" type="number" name="nit" value="<?= $cliente->nit?>" >
    </div>
    <div class="form-group">
    <label class="control-label"for="fecha_creacion">Creacion </label>
    <input class="form-control" type="date" name="fecha_creacion" value="<?= $cliente->fecha_creacion?>">
    </div>
    <div class="form-group">

    <label class="control-label"for="tipo">Tipo </label>
    <select class="form-control"  name="tipo">
        <?php foreach ($tipos as $tipo):?>
            <option value="<?= $tipo->id?>" <?php if($tipo->id==$cliente->tipo_id) echo 'selected';?>><?= $tipo->descripcion?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">
    <label class="control-label" for="persona_id">Persona </label>
    <input class="form-control"  type="text" name="persona_id" value="<?= $cliente->persona_id?>">
    </div>

    <div class="form-group">
    <label for="apellido">Apellido </label>
    <input class="form-control"  type="text" name="apellido" value="<?= $cliente->apellido?>">
    </div>

    <div class="form-group">
    <label class="control-label"for="nombre">Nombre </label>
    <input class="form-control"  type="text" name="nombre" value="<?= $cliente->nombre?>">
    </div>

    <div class="form-group">
    <label class="control-label" for="direccion">Direccion </label>
    <input class="form-control"  type="text" name="direccion" value="<?= $cliente->direccion?>">
    </div>

    <div class="form-group">
    <label class="control-label" for="nacimiento">Nacimiento </label>
    <input class="form-control"  type="date" name="nacimiento"  value="<?= $cliente->nacimiento?>">
    </div>

    <div class="form-group">
    <label class="control-label" for="genero">Genero </label>
    <select class="form-control"  name="genero">
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" <?php if($genero->id==$cliente->genero_id) echo 'selected';?>><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="empleado" value="Guardar">
    </div>

</form>
</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>
