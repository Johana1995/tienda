<?php
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['paquetes'])){$paquetes=$_POST['paquetes'];}
if (isset($_POST['unidades'])){$unidades=$_POST['unidades'];}
require_once "../libs/DataBase.php";
if (isset($_GET['id']) )//codigo elimina un elemento del array
{
	$id=intval($_GET['id']);
	$db= DataBase::singleton();
	$sql = "DELETE FROM tmp_compra WHERE producto='".$id."' and sucursal=1";
	$query = $db->prepare($sql);
	$query->execute();
}
else
{
	if (!empty($id) and !empty($paquetes) and !empty($unidades))
	{
		$db= DataBase::singleton();
		$sql = "SELECT count(*) AS numrows from tmp_compra WHERE producto='".$id."' and sucursal=1 ";
		$query = $db->prepare($sql);
		$query->execute();
		$row=$query->fetch(PDO::FETCH_OBJ);
		$numrows = $row->numrows;
		if($numrows>0)
		{
			$db= DataBase::singleton();
			$sql = "UPDATE tmp_compra set paquete=paquete+'$paquetes', unidad=unidad+'$unidades' WHERE producto='$id' and sucursal=1";
			$query = $db->prepare($sql);
			$query->execute();
		}else
		{
			$db= DataBase::singleton();
			$sql = "INSERT INTO tmp_compra  VALUES (1,'$id','$paquetes','$unidades')";
			$query = $db->prepare($sql);
			$query->execute();
		}
	}
	else
	{
	}
}
?>
<table class="table">
	<tr>
		<th>ID</th>
		<TH>CODIGO</TH>
		<th>DETALLE</th>
		<TH>PAQ UN</TH>

		<TH>UND $</TH>
		<TH>PACK $</TH>
		<TH>U.VENTA</TH>
		<TH>PACK.VENTA</TH>
		<TH>SUBTOTAL</TH>
		<th class='text-center'>agregar</th>

	</tr>
	<?php
	$db= DataBase::singleton();
	$sql = "select p.id,p.codigo,p.detalle,p.precioPackinVenta as precioPack,p.precioUnidadVenta as precioU,
            				   q.cantUnidades as Upaquete, t.unidad , t.paquete
            				   from producto p,paquete q, tmp_compra t where q.id=p.paquete_id and p.id=t.producto and t.sucursal=1";
	$query = $db->prepare($sql);
	$query->execute();
	$productos= $query->fetchAll(PDO::FETCH_OBJ);
	$total_venta=0;
	foreach ($productos as $row):
		$producto_id=$row->id;
		$codigo=$row->codigo;
		$detalle=$row->detalle;
		$precioP=$row->precioPack;
		$precioP=number_format($precioP,2,'.','');
		$precioP=str_replace(",","",$precioP);//Reemplazo las comas
		$precioU=$row->precioU;
		$precioU=number_format($precioU,2,'.','');
		$precioU=str_replace(",","",$precioU);//Reemplazo las comas
		$cantPack=$row->Upaquete;//unidades en un paquete
		$unidadventa=$row->unidad;//cantidad de unides en la venta
		$paqueteventa=$row->paquete;//paq en la venta
		$precio_producto=($precioP*$paqueteventa)+($precioU* $unidadventa);
		$precio_producto_f=number_format($precio_producto,2);//Precio total formateado
		$precio_producto_r=str_replace(",","",$precio_producto_f);//Reemplazo las comas
		$total_venta+=$precio_producto_r;//Sumador
		?>
		<tr>
			<td><?php echo $producto_id; ?></td>
			<td><?php echo $codigo; ?></td>
			<td><?php echo $detalle; ?></td>
			<td><?php echo $cantPack; ?></td>
			<td><?php echo $precioU; ?></td>
			<td><?php echo $precioP; ?></td>
			<td><?php echo $unidadventa; ?></td>
			<td><?php echo $paqueteventa; ?></td>
			<td class='text-right'><?php  echo $precio_producto;?></td>
			<td class='text-right'><a href="#" onclick="eliminar('<?php echo $producto_id ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
		<?php
	endforeach;

	$subtotal=number_format($total_venta,2,'.','');

	?>
	<tr>
		<td></td><td></td><td></td><td></td>
		<td class='text-right' colspan=4>TOTAL </td>
		<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	</tr>


</table>