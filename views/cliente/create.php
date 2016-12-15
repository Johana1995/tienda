<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLIENTE</title>
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
        <label for="nit" class="control-label">NIT </label>
        <input type="number" class="form-control"name="nit" placeholder="NIT" >
    </div>

    <div class="form-group">
        <label for="fecha_creacion" class="control-label">Creacion </label>
        <input type="date" class="form-control" name="fecha_creacion" placeholder="fecha de creacion" value="<?php echo Date("Y-m-d");?>">
    </div>
    <br>
    <div class="form-group">
    <label for="tipo" class="control-label">Tipo </label>
    <select class="form-control"  name="tipo">
        <?php foreach ($tipos as $tipo):?>
            <option value="<?= $tipo->id?>" ><?= $tipo->descripcion?></option>
        <?php endforeach; ?>
    </select>
   </div>
    <div class="form-group">
    <label for="apellido" class="control-label">Apellido </label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" ">
    </div>
    <div class="form-group">
    <label for="nombre" class="control-label">Nombre </label>
    <input type="text" class="form-control"name="nombre" placeholder="Nombres">
    </div>
    <div class="form-group">
    <label for="direccion" class="control-label">Direccion </label>
    <input type="text" class="form-control" name="direccion" placeholder="Direccion ">
    </div>
    <div class="form-group">
    <label for="nacimiento"  class="control-label">Nacimiento </label>
    <input type="date"  class="form-control" name="nacimiento" >
    </div>
    <div class="form-group">
    <label for="genero" class="control-label">Genero </label>
    <select name="genero">
        <?php foreach ($generos as $genero):?>
            <option value="<?= $genero->id?>" ><?= $genero->descripcion?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <input type="submit" class="btn btn-primary" name="empleado" value="Guardar">
</form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
