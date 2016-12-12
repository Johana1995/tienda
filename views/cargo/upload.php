<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
$_SERVER['PHP_SELF']<?php echo $_SERVER['PHP_SELF'] ?>
<br>
$_SERVER['DOCUMENT_ROOT']<?php echo  $_SERVER['DOCUMENT_ROOT']?>
<br>
$_SERVER['HTTP_HOST']<?php echo $_SERVER['HTTP_HOST'] ?>
<br>
<?php $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
echo $directory_self;?>
<br>
<?php
echo $mensaje;
?>
<br>

<form action="" enctype="multipart/form-data" method="post">
    <input type="text" value="<?= $producto_id?>" name="producto_id">
    <label for="imagen">Imagen:</label>
    <input  name="imagen" size="30" type="file" />
    <input type="submit" name="imagen" value="Cambiar datos" />
</form>
</body>
</html>