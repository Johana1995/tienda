
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

        <li ><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Facturas <span class="sr-only">(current)</span></a></li>
        <li ><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Productos</a></li>
		<li ><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
		<li><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
		<li><a href="perfil.php"><i  class='glyphicon glyphicon-cog'></i> Configuración</a></li>
        <li><a href="#"><i  class='glyphicon glyphicon-cog'></i><?= User::singleton()->sucursal().' Caja:'.User::singleton()->caja();?> </a></li>

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

