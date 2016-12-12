<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta-View</title>
</head>
<body>
<div>
    <h2>Detalle </h2>
<table >
    <tr>
        <th>ID</th>
        <th>NUMERO</th>
        <th>DATE</th>
        <th>SUBTOTAL</th>
        <th>-DESCUENTO</th>
        <th>IVA</th>
        <th>CLIENTE</th>
        <th>EMPLEADO</th>
        <th>CAJA</th>
        <th>SUCURSAL</th>
        <th>ESTADO</th>

    </tr>
     <tr>
            <td><?= $venta->id?></td>
            <td><?= $venta->numero?></td>
            <td><?= $venta->fechahora?></td>
            <td><?= $venta->subtotal?></td>
            <td><?= $venta->descuento?></td>
            <td><?= $venta->iva?></td>
         <td><?= $venta->cliente()->apellido?></td>
            <td><?= $venta->empleado()->apellido?></td>
         <td><?= $venta->caja()->numero?></td>
         <td><?= $venta->sucursal()->nombre?></td>
            <td><?php if($venta->anulado==0) echo 'ACTIVO'; else echo 'DESACTIVO';?></td>
        </tr>

</table>

</div>

<div >
    <h2>Productos </h2>
    <table >
        <tr>
            <th>ID PROD</th>
            <th>CODIGO</th>
            <th>PRECIO U.</th>
            <th>PRECIO PACK.</th>
            <th>PACK CANT.</th>
            <th>DEPTO</th>
            <th>U VENTA</th>
            <th>PACK VENTA</th>
        </tr>

        <?php foreach ($productos as $producto):?>
            <tr>
                <td><?= $producto->producto?></td>
                <td><?= $producto->codigo?></td>
                <td><?= $producto->precioU?></td>
                <td><?= $producto->precioP?></td>
                <td><?= $producto->cantP?></td>
                <td><?= $producto->depto?></td>
                <td><?= $producto->cantidadU?></td>
                <td><?= $producto->cantidadP?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
</body>
</html>