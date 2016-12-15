<?php
require 'models/Traspaso.php';

class TraspasoController extends Controller
{

    public function indexAction()
    {
        $model=new Traspaso();
        $ventas= $model->listar();
        return $this->view->show('traspaso/index',[
                'traspasos'=>$ventas,
            ]
        );
    }
    public function viewAction(){

        if(!empty($_GET['id']))
        {
            $model= new Compra();
            $model->id=$_GET['id'];
            $venta=$model->buscar();
            $productos=$venta->productos();

            return $this->view->show('compra/view',[
                'compra'=>$venta,
                'productos'=>$productos,
            ]);
        }
    }
    public function createAction(){
        if(!empty($_POST))
        {
            $venta= new Compra();
            $venta->fechahora=$_POST['fecha'];
            $venta->empleado=$_POST['vendedor'];
            $venta->proveedor=$_POST['proveedor'];
            $venta->sucursal=User::singleton()->sucursal;
            $id_venta=$venta->save();

            $producto_venta=new ProductoCompra();
            $producto_venta->guardarProductos($id_venta);
            header('Location: index.php?controller=Compra&action=index');

        }else {//
            $modelCliente= new Proveedor();
            $proveedores= $modelCliente->listar();

            $model = new ProductoSucursal();
            $productos = $model->listar(User::singleton()->sucursal);
            $modelEmpleado=new Empleado();
            $empleados= $modelEmpleado->listar();
            return $this->view->show('compra/create', [
                'proveedores'=>$proveedores,
                'productos' => $productos,
                'empleados'=>$empleados
            ]);
        }
    }
    public function clearTempAction()
    {
        $model = new ProductoCompra();
        $model->limpiar();
        header('Location: index.php?controller=Compra&action=create');
    }
}