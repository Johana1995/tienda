<?php
require 'models/Venta.php';

class VentaController extends Controller
{

    public function indexAction(){
        $model=new Venta();
        $ventas= $model->listar();
        return $this->view->show('venta/index',[
            'ventas'=>$ventas,
                ]
        );
    }
    public function createAction(){

        if(User::singleton()->rol()=='ADMINISTRADOR') {
            if(!empty($_POST))
            {//se crear la venta

            }else {//
                $model = new ProductoSucursal();
                $productos = $model->listar(User::singleton()->sucursal);

                $modelC = new Cliente();
                $clientes = $modelC->listar();

                $modelCarrito=new ProductoVenta();

                $carrito=$modelCarrito->tempProductos();

                return $this->view->show('venta/create', [
                    'carrito'=>$carrito,
                    'productos' => $productos,
                    'clientes' => $clientes,
                ]);
            }
        }
        else
        {

            $mensaje='Para realizar ventas usted debe ser Un Empleado Vendedor e ingresar a una Sucursal y Caja';
            return $this->view->show('venta/error', [
                'mensaje' => $mensaje,
            ]);
        }
    }
    public function viewAction(){

        if(!empty($_GET['id']))
        {
            $model= new Venta();
            $model->id=$_GET['id'];
            $venta=$model->buscar();
            $productos=$venta->productos();

            return $this->view->show('venta/view',[
                'venta'=>$venta,
                'productos'=>$productos,
            ]);
        }
    }
    public function addProductsAction(){
         if(!empty($_GET['producto'])) {
             $productoventa = new ProductoVenta();
             $productoventa->addproducto($_GET['producto']);

         }
        header('Location: index.php?controller=Venta&action=create');

    }
    public function removeProductsAction()
    {
          if(!empty($_GET['producto'])) {

                $productoventa = new ProductoVenta();
                $productoventa->removeProducts($_GET['producto']);

            }
            header('Location: index.php?controller=Venta&action=create');
    }
}