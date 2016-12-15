<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD-STOCK-PRODUCTO</title>
    <?php include("head.php");?>
</head>
<body>

<?php
include("navbar.php");
?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-edit'></i> STOCK  </h4>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label class="control-label"for="nit">SUCURSAL: <?= $dato->nombre?></label>
                    <input  class="form-control" type="text" name="sucursal" value="<?= $dato->sucursal?>" readonly >
                </div>
                <div class="form-group">
                    <label class="control-label"for="producto">PRODUCTO: <?= $dato->codigo.'['.$dato->detalle.']'?></label>
                    <input class="form-control" type="text" name="producto" value="<?= $dato->producto?>" readonly>
                </div>
                <div class="form-group">

                    <label class="control-label"for="unidad">UN. EXISTENTE </label>
                    <input class="form-control" type="text" name="unidad" value="<?= $dato->cantidadExistente?>" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="paquete">PACK. EXISTENTE </label>
                    <input class="form-control"  type="text" name="paquete" value="<?= $dato->cantidadPackExistente?>" required>
                </div>

                <div class="form-group">
                    <label for="apellido">UNIDADES. MINIMAS </label>
                    <input class="form-control"  type="text" name="minima" value="<?= $dato->cantidadUnidadMinima?>">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Guardar">
                </div>

            </form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
