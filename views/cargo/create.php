<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo-Create</title>
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
        <label for="nombre" class="control-label">Id</label>
        <input type="text" class="form-control" name="nombre" placeholder="Cargo..." >
    </div>
    <div class="form-group">
        <label for="descripcion" class="control-label">Nombre</label>
        <input type="text" class="form-control" name="descripcion" placeholder="Descripcion de las funciones">
    </div>
    <input type="submit" class="btn btn-primary" name="" value="Crear">
</form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
