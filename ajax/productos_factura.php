<?php
require_once "../libs/DataBase.php";
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$db= DataBase::singleton();
	$sql = 'SELECT p.id,p.codigo,p.detalle,p.precioPackinVenta as precioPack,p.precioUnidadVenta as precioU,
               q.cantUnidades as Upaquete,d.descripcion as depto,ps.cantidadExistente,
               ps.cantidadPackExistente,ps.cantidadUnidadMinima
                from producto p, producto_sucursal ps,departamento d,paquete q
                where p.id=ps.producto and ps.sucursal=1 and p.paquete_id=q.id and d.id=p.depto_id limit 30';
	$query = $db->prepare($sql);
	$query->execute();
	$productos= $query->fetchAll(PDO::FETCH_OBJ);
	?>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>ID</th>
				<TH>CODIGO</TH>
				<th>DETALLE</th>
				<TH>PAQ UN</TH>
				<TH>DEPTO</TH>
				<TH>CANT U. EXIST</TH>
				<TH>CANT. PACK EXIST</TH>
				<TH>CANT. U. MIN</TH>
				<TH>UND $</TH>
				<TH>PACK $</TH>

				<th><span class="pull-right">UNIDAD</th>
				<th><span class="pull-right">PAQUETE</th>
				<th class='text-center'>agregar</th>
			</tr>
			<?php
			foreach ($productos as $row):
				$id_producto=$row->id;
				$codigo=$row->codigo;
				$detalle=$row->detalle;
				$depto=$row->depto;
				$precioP=$row->precioPack;
				$precioP=number_format($precioP,2,'.','');
				$precioU=$row->precioU;
				$precioU=number_format($precioU,2,'.','');
				$cantPack=$row->Upaquete;
				$existU=$row->cantidadExistente;
				$existP=$row->cantidadPackExistente;
				$minimo=$row->cantidadUnidadMinima;
				?>
				<tr>
					<td><?php echo $id_producto;?></td>
					<td><?php echo $codigo; ?></td>
					<td><?php echo $detalle; ?></td>
					<td><?php echo $cantPack; ?></td>
					<td><?php echo $depto; ?></td>
					<td><?php echo $existU; ?></td>
					<td><?php echo $existP; ?></td>
					<td><?php echo $minimo; ?></td>
					<td><?php echo $precioU; ?></td>
					<td><?php echo $precioP; ?></td>
					<td class='col-xs-1'>
						<div class="pull-right">
							<input type="number" class="form-control" style="text-align:right" id="U_<?php echo $id_producto; ?>"  value="4" >
						</div></td>
					<td class='col-xs-2'><div class="pull-right">
							<input type="number" class="form-control" style="text-align:right" id="P_<?php echo $id_producto; ?>"  value="2" >
						</div></td>
					<td class='text-center'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto ?>')">
							<i class="glyphicon glyphicon-plus"></i></a></td>
				</tr>
				<?php
			endforeach;
			?>
		</table>
	</div>
	<?php
}
?>