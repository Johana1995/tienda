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
            if(!empty($_POST))
            {

                $venta= new Venta();
                $venta->fechahora=$_POST['fecha'];
                $venta->empleado=$_POST['vendedor'];
                $venta->cliente=$_POST['id_cliente'];
                $venta->anulado=$_POST['estado'];
                $venta->sucursal=User::singleton()->sucursal;
                $venta->caja=User::singleton()->caja;
                $id_venta=$venta->save();

                $producto_venta=new ProductoVenta();
                $producto_venta->guardarProductos($id_venta);
                header('Location: index.php?controller=Venta&action=index');

            }else {//
                $modelCliente= new Cliente();
                $clientes= $modelCliente->listar();

                $model = new ProductoSucursal();
                $productos = $model->listar(1);

                $modelEmpleado=new Empleado();
                $empleados= $modelEmpleado->listar();
                return $this->view->show('venta/create', [
                    'clientes'=>$clientes,
                    'productos' => $productos,
                    'empleados'=>$empleados
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
    public function saveAction()
    {
        $mensa='';
        if( !empty( $_GET['cliente']))
        {
            $mensa=$_GET['cliente'];
        }
        $this->view->show('venta/prueba',['m'=>$_GET['cliente']]);
    }
}