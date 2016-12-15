<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php include("head.php");?>
    <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<div class="card card-container">
    <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
    <p id="profile-name" class="profile-name-card"></p>
<form action="" method="post" class="form-signin">
    <?=
    $mensaje;
    ?>
    <input class="form-control" type="text" name="username" placeholder="username... ">
    <br>
    <input class="form-control" type="password" name="password" placeholder="password">
    <br>
    <select class="form-control" name="sucursal">
        <?php foreach ($sucursales as $sucursal):?>
            <option value="<?= $sucursal->id?>"><?= 'Nº'.$sucursal->numero.' >>Sucursal '.$sucursal->nombre?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select class="form-control" name="caja">
        <?php foreach ($cajas as $caja):?>
            <option value="<?= $caja->id?>"><?= 'Caja '.$caja->numero?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input class="btn btn-lg btn-success btn-block btn-signin" type="submit" value="Ingresar" name="login">
</form>
    <?php
    include("footer.php");
    ?>
    </div>
</body>
</html>