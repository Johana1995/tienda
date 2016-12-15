<?php
require 'models/Traspaso.php';
require 'models/Sucursal.php';
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
            $emisor=$_POST['emisor'];
            $receptor=$_POST['receptor'];
            if($emisor==$receptor)
            {
                $modelCliente= new Sucursal();
                $proveedores= $modelCliente->listar();
                return $this->view->show('traspaso/seleccion', [
                    'sucursales'=>$proveedores,
                    'mensaje'=>'LAS SUCURSALES DEBEN SER DISTINTAS',
                ]);

            }else {

                $modelCliente= new Sucursal();
                $modelCliente->id=$receptor;
                $Sreceptor=$modelCliente->buscar();
                $modelCliente->id=$emisor;
                $Semisor=$modelCliente->buscar();

                $productos = new ProductoSucursal();
                $prodEmisor = $productos->listar($emisor);
                $prodReceptor = $productos->listar($receptor);
                return $this->view->show('traspaso/nuevo', [
                    'sucursalE'=>$Semisor,
                    'sucursalR'=>$Sreceptor,
                    'prodE'=>$prodEmisor,
                    'prodR'=>$prodReceptor,
                ]);
            }

        }else {//
            $modelCliente= new Sucursal();
            $proveedores= $modelCliente->listar();

            return $this->view->show('traspaso/seleccion', [
                'sucursales'=>$proveedores,
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