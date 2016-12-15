<!DOCTYPE html>
<html lang="es">
  <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Nueva-Compra</title>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva </h4>
			<a class="btn btn-danger" href="<?= $config->get('url').'index.php?controller=Compra&action=clearTemp'?>">REINICIAR</a>
		</div>
		<div class="panel-body">
		<?php
			include("buscar_productos.php");
		?>
			<form class="form-horizontal" role="form" action="" method="post" >
				<div class="form-group row">

					<label for="vendedor" class="col-md-1 control-label">Proveedor</label>
					<div class="col-md-3">
						<select class="form-control input-sm" name="proveedor">
							<?php foreach ($proveedores as $p):?>
								<option value="<?= $p->id?>" >[<?= $p->nit.'], '.$p->encargado?></option>
							<?php endforeach; ?>
						</select>
					</div>
                   				 </div>
				<div class="form-group row">
					<label for="vendedor" class="col-md-1 control-label">Vendedor</label>
					<div class="col-md-3">

						<select class="form-control input-sm" name="vendedor">
							<?php foreach ($empleados as $empleado):?>
								<option value="<?= $empleado->empleado_id?>" ><?= $empleado->apellido.', '.$empleado->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<label for="tel2" class="col-md-1 control-label">Fecha</label>
					<div class="col-md-2">
						<input type="datetime" class="form-control input-sm" name="fecha" value="<?= date("Y/m/d H:m");?>" readonly>
					</div>
					<label for="email" class="col-md-1 control-label">Pago</label>
					<div class="col-md-3">
						<select class='form-control input-sm' id="condiciones">
							<option value="1">Efectivo</option>
						</select>
					</div>

				</div>
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="load()">
						 <span class="glyphicon glyphicon-search"></span> Buscar productos
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Guardar
						</button>
					</div>
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			</div>	
		 </div>
	</div>
	<hr>

	<?php

	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<!--	<script type="text/javascript" src="js/nueva_factura.js"></script>-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);


							 }
						});


					});

	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT ||
							event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN ||
							event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");

						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});

		$(document).ready(function(){
			load(1);
		});

		function load(){

			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_facturaC.php?action=ajax',
				beforeSend: function(objeto){
					$('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
				},
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');

				}
			})
		}
		function agregar (id)
		{
			var unidades=document.getElementById('U_'+id).value;
			var paquetes=document.getElementById('P_'+id).value;

			alert('id='+id+' p---------------->'+paquetes+' u->'+unidades);
			$.ajax({
				type: "POST",
				url: "./ajax/agregar_facturacionC.php",
				data: "id="+id+"&paquetes="+paquetes+"&unidades="+unidades,
				beforeSend: function(objeto){
					$("#resultados").html("Mensaje: Cargando...");
				},
				success: function(datos){
					$("#resultados").html(datos);
				}
			});
		}

		function eliminar (id)
		{
			alert('id'+id);
			$.ajax({
				type: "GET",
				url: "./ajax/agregar_facturacionC.php",
				data: "id="+id,
				beforeSend: function(objeto){
					$("#resultados").html("Mensaje: Cargando...");
				},
				success: function(datos){
					$("#resultados").html(datos);
				}
			});
		}



	</script>

  </body>
</html>