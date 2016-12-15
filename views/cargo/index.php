<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo-Index</title>
    <?php include("head.php");?>

</head>
<body>

<?php
include("navbar.php");
?>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a  href="<?= $config->get('url').'index.php?controller=Cargo&action=create'?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus" ></span> Nuevo </a>
            </div>

            <form class="form-horizontal" role="form" id="datos_cotizacion">

                <div class="form-group row">
                    <div class="col-md-5">
                    </div>

                </div>
            </form>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr >
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                </tr>

                <?php foreach ($cargos as $cargo):?>
                    <tr>
                        <td><?= $cargo->id?></td>
                        <td><?= $cargo->nombre?></td>
                        <td><?= $cargo->descripcion?></td>
                        <td><a href="<?= $config->get('url').'index.php?controller=Cargo&action=edit&id='.$cargo->id?>">edit</a></td>
                        <td><a href="<?= $config->get('url').'index.php?controller=Cargo&action=delete&id='.$cargo->id?>">delete</a></td>
                    </tr>
                <?php endforeach;?>

            </table>

            </div>
        <?php
        include("footer.php");
        ?>
    </div>
    </div>
</body>
</html>