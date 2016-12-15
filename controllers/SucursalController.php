<?php
require 'models/Sucursal.php';

class SucursalController extends Controller
{

    public function indexAction(){
        $model= new Sucursal();
        $sucursales=$model->listar();
        return $this->view->show('sucursal/index',[
            'sucursales'=>$sucursales,
        ]);
    }
    public function viewAction(){

        if(!empty($_GET['id']))
        {
            $sucursalModel= new Sucursal();
            $sucursalModel->id=$_GET['id'];
            $sucursal=$sucursalModel->buscar();
            $productos=$sucursal->productos();

            $otrosProductosModel = new ProductoSucursal();
            $otrosProductos=$otrosProductosModel->otrosProductos($_GET['id']);//estas son clases de Productos
            return $this->view->show('sucursal/view',[
                'sucursal'=>$sucursal,
                'productos'=>$productos,
                'otrosProductos'=>$otrosProductos,
            ]);
        }
    }
    public function addProductsAction(){
        if(!empty($_GET['producto']) and !empty($_GET['sucursal']))
        {
            $productoSucursal= new ProductoSucursal();
            $productoSucursal->addproducto($_GET['sucursal'],$_GET['producto'],0,0,0);
            header('Location: index.php?controller=Sucursal&action=view&id='.$_GET['sucursal']);
        }
    }
    public function deleteProductsAction(){
        if (!empty($_GET['producto']) and !empty($_GET['sucursal']))
        {
            $productosucursal= new ProductoSucursal();
            $productosucursal->eliminarproducto($_GET['sucursal'],$_GET['producto']);
            header('Location: index.php?controller=Sucursal&action=view&id='.$_GET['sucursal']);
        }
    }
    public function deleteAction(){
        if(!empty($_GET['sucursal']))
        {
            $sucursal= new Sucursal();
            $sucursal->id=$_GET['sucursal'];
            $sucursal->eliminar();
            header('Location: index.php?controller=Sucursal&action=index');
        }
    }
    public function createAction(){
        if(!empty($_POST))
        {
            $sucursal=new Sucursal();
            $sucursal->numero=$_POST['numero'];
            $sucursal->direccion=$_POST['direccion'];
            $sucursal->nombre=$_POST['nombre'];
            $sucursal->crear();
            header('Location: index.php?controller=Sucursal&action=index');

        }else{
            return $this->view->show('sucursal/create',
            [

            ]);
        }
    }
    public function stockAction()
    {
        if(!empty($_POST))
        {

            $model= new ProductoSucursal();
            $sucursal=$_POST['sucursal'];
            $producto=$_POST['producto'];
            $unidad=$_POST['unidad'];
            $paquete= $_POST['paquete'];
            $minima=$_POST['minima'];
            $model->aumentarStock($sucursal,$producto,$unidad,$paquete,$minima);

            header('Location: index.php?controller=Sucursal&action=view&id='.$sucursal);

        }else{
            if(!empty($_GET['producto']) and !empty($_GET['sucursal']))
            {
                $productosucursal= new ProductoSucursal();
                    $stock=$productosucursal->stockProducto($_GET['sucursal'],$_GET['producto']);

                return $this->view->show('sucursal/addstock',
                    [
                        'dato'=>$stock,
                    ]);
            }

        }



    }

}