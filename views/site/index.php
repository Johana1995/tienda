<div>


    <?php if(User::singleton()->isLogin())
    {
        ?>
    <label>Usuario: <?= User::singleton()->nombre;?></label>
    <br>
    <label>Sucursal: <?= User::singleton()->sucursal();?></label>
    <br>
    <label>Caja: <?= User::singleton()->caja();?></label>
    <?php }
    else {
        ?>
        <label>Usuario no registrado.</label>
        <?php
    }
    ?>
</div>

<h1>Bienvenido al Controlador del la Pagina Web "Site" :)</h1>
<br>

<a href="<?= $config->get('url').'index.php?controller=Site&action=logout'?>">logout</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Producto&action=index'?>">Productos</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Empleado&action=index'?>">Empleados</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Cliente&action=index'?>">Clientes</a>
<br>
<a href="<?= $config->get('url').'index.php?controller=Sucursal&action=index'?>">Sucursal</a>

