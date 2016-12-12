<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<?=
$mensaje;
?>
<form action="" method="post">
    <input type="text" name="username" placeholder="username... ">
    <br>
    <input type="password" name="password" placeholder="password">
    <br>
    <select name="sucursal">
        <?php foreach ($sucursales as $sucursal):?>
            <option value="<?= $sucursal->id?>"><?= 'Nº'.$sucursal->numero.' >>Sucursal '.$sucursal->nombre?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="caja">
        <?php foreach ($cajas as $caja):?>
            <option value="<?= $caja->id?>"><?= 'Caja '.$caja->numero?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Ingresar" name="login">
</form>

</body>
</html>