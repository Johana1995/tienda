<?php
require 'models/Cargo.php';

class CargoController extends Controller
{

    public function indexAction()
    {
        $model = new Cargo();
        $cargos = $model->listar();
        return $this->view->show('cargo/index',['cargos' => $cargos]);
    }
    public function createAction()
    {
        if(!empty($_POST))
        {
            $cargo= new Cargo();
            $cargo->nombre=$_POST['nombre'];
            $cargo->descripcion=$_POST['descripcion'];
            $cargo->crear();
            header('Location: index.php?controller=Cargo&action=index');
        }
        return $this->view->show('cargo/create',[
                ]);
    }
    public function editAction()
    {
        if(!empty($_POST))
        {
            $cargo= new Cargo();
            $cargo->id=$_POST['id'];
            $cargo->nombre=$_POST['nombre'];
            $cargo->descripcion=$_POST['descripcion'];
            $cargo->update();
            header('Location: index.php?controller=Cargo&action=index');
        }
        if(!empty($_GET['id']))
        {
            $model=new Cargo();
            $cargo=$model->findById($_GET['id']);
            if(!is_null($cargo))
            {
                return $this->view->show('cargo/edit',[
                    'cargo'=>$cargo,
                ]);
            }
        }else
        {
            header('Location: index.php?controller=Cargo&action=index');
        }

    }
    public function deleteAction(){
        if($_GET['id'])
        {
            $model= new Cargo();
            $model->id=$_GET['id'];
            if($model->eliminar())
            {
                header('Location: index.php?controller=Cargo&action=index');
            }

        }
    }
}