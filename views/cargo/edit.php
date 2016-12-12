<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo-Edit</title>
</head>
<body>
<form action="" method="post">
    <input type="number" name="id" value="<?= $cargo->id?>">
    <br>
    <input type="text" name="nombre" value="<?= $cargo->nombre?>" >
    <br>
    <input type="text" name="descripcion" value="<?= $cargo->descripcion?>">
    <br>
    <input type="submit" name="" value="Guardar">
</form>
</body>
</html>