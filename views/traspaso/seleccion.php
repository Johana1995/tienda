<!DOCTYPE html>
<html lang="es">
  <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Nueva-Venta</title>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> SELECCION de SUCURSALES </h4>

		</div>
		<div class="panel-body">

			<form class="form-horizontal" role="form" action="" method="post" >
				<div class="form-group row">
			<h2>	<?php if(isset($mensaje)) echo $mensaje;?></h2>
					<div class="col-md-3">
						<label for="emisor" class="col-md-1 control-label">EMISOR</label>
						<select class="form-control input-sm" name="emisor">
							<?php foreach ($sucursales as $s):?>
								<option value="<?= $s->id?>" ><?= $s->direccion.', '.$s->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-3">
						<label for="receptor" class="col-md-1 control-label">RECEPTOR</label>
						<select class="form-control input-sm" name="receptor">
							<?php foreach ($sucursales as $s):?>
								<option value="<?= $s->id?>" ><?= $s->direccion.', '.$s->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>

				</div>
				<div class="col-md-12">
					<input class="btn btn-danger" type="submit" value="CONTINUAR">
				</div>
			</form>	
			

		</div>

	</div>
	<hr>

	<?php

	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<!--	<script type="text/javascript" src="js/nueva_factura.js"></script>-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  </body>
</html>