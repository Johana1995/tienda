<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucursal Create</title>
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
    <label for="numero"class="control-label">Ejemplo de Numeracion: A,B,C ó N1,N2,N3,</label>
    <input type="text" class="form-control" name="numero" placeholder="ingrese la numeracion ">
    </div>

    <div class="form-group">
    <label class="control-label"for="direccion">Direccion:</label>
    <input type="text" class="form-control" name="direccion" placeholder="direccion de la sucursal">
    </div>

    <div class="form-group">
    <label class="control-label"for="nombre">Nombre De Suc.:</label>
    <input type="text" class="form-control" name="nombre" placeholder="nombre de La sucursal">
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
</form>
</body>
</html>