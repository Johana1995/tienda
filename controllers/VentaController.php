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

        }else{
            $sucursal= new Sucursal(1);
            $productos=$sucursal->productos();
            return $this->view->show('cliente/create',[
                'tipos'=>$tipos,
                'generos'=>$generos,
            ]);
        }
    }

    public function viewAction(){
        if(!empty($_GET['venta']))
        {
            $model= new Venta();
            $model->id=$_GET['venta'];
            $venta=$model->buscar();

            $productos=$venta->productos();
            return $this->view->show('venta/view',[
                'venta'=>$venta,
                'productos'=>$productos,
            ]);
        }
    }
}