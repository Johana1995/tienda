<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMPLEADO</title>
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
                <a  href="<?= $config->get('url').'index.php?controller=Empleado&action=create'?>" class="btn btn-info">
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

<table class="table table-hover" >
    <tr>
        <td>ID</td>
        <td>CORREO</td>
        <td>USERNAME</td>
        <td>PASSWORD</td>
        <td>CARGO</td>
        <td>ID PERSONA</td>
        <td>APELLIDO</td>
        <td>NOMBRE</td>
        <td>DIRECCION</td>
        <td>NACIMIENTO</td>
        <td>GENERO</td>
         </tr>
    <?php foreach ($empleados as $empleado):?>
    <tr>
        <td><?= $empleado->empleado_id?></td>
        <td><?= $empleado->correo?></td>
        <td><?= $empleado->username?></td>
        <td><?= $empleado->password?></td>
        <td><?= $empleado->cargo?></td>
        <td><?= $empleado->persona_id?></td>
        <td><?= $empleado->apellido?></td>
        <td><?= $empleado->nombre?></td>
        <td><?= $empleado->direccion?></td>
        <td><?= $empleado->nacimiento?></td>
        <td><?= $empleado->genero?></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Empleado&action=edit&id='.$empleado->empleado_id?>">edit</a></td>
        <td><a href="<?= $config->get('url').'index.php?controller=Empleado&action=delete&empleado='.$empleado->empleado_id.'&persona='.$empleado->persona_id?>">delete</a></td>
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