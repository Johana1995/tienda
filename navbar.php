
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Simple Invoice</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <ul class="nav navbar-nav navbar-left dropdown">
          <a class="dropdown-toggle btn btn-primary" type="button" data-toggle="dropdown">MOVIMIENTO
            <i class='glyphicon glyphicon-barcode'></i> </a>
          <ul class="dropdown-menu">
            <li><a href="<?= $config->get('url').'index.php?controller=Cliente&action=index'?>">clientes</a></li>
            <li><a href="<?= $config->get('url').'index.php?controller=Venta&action=index'?>">ventas</a></li>
            <li><a href="#">stock</a></li>
            <li><a href="<?= $config->get('url').'index.php?controller=Producto&action=index'?>">productos</a></li>
            <li><a href="#">traspasos</a></li>
            <li><a href="#">bajas Productos</a></li>
          </ul>

        </ul>
        <ul class="nav navbar-nav navbar-left dropdown">
          <a class="dropdown-toggle btn btn-primary" type="button" data-toggle="dropdown">SITIO
            <i class='glyphicon glyphicon-barcode'></i> </a>
          <ul class="dropdown-menu">
            <li><a href="<?= $config->get('url').'index.php?controller=Sucursal&action=index'?>">Sucursales</a></li>
            <li><a href="#">proveedores</a></li>
            <li><a href="<?= $config->get('url').'index.php?controller=Empleado&action=index'?>">Empleados</a></li>

            <li><a href="<?= $config->get('url').'index.php?controller=Cargo&action=index'?>">Cargos</a></li>
          </ul>

        </ul>
        <li> <a href="<?= $config->get('url').'index.php?controller=Reporte&action=index'?>" >
            <i class='glyphicon glyphicon-list-alt'></i>REPORTES</a></li>

        <li><a href="#">SUCURSAL: <?= User::singleton()->sucursal()?>  CAJA: <?=User::singleton()->caja();?> </a></li>

      </ul>
      <?php if(User::singleton()->isLogin())
      {
        ?>
        <ul class="nav navbar-nav navbar-right dropdown">
          <a class="dropdown-toggle btn btn-primary" type="button" data-toggle="dropdown"><?= User::singleton()->nombre.'['.User::singleton()->rol().']';?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="<?= $config->get('url').'index.php?controller=Site&action=logout'?>"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
          </ul>

        </ul>
     <?php }
      else {
        ?>
      <ul class="nav navbar-nav navbar-right dropdown">
        <li>NO IDENTIF.</li>
      </ul>
        <?php
      }
      ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">

