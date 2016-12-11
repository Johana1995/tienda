<?php
require 'models/Cliente.php';
require 'models/Tipo.php';
require 'models/Genero.php';
class ClienteController extends Controller
{
    public function indexAction()
    {
        $model = new Cliente();
        $clientes = $model->listar();
        return $this->view->show('cliente/index',[
            'clientes' => $clientes
        ]);
    }
    public function createAction()
    {
        if(!empty($_POST))
        {
            $cliente=new Cliente();
            $cliente->apellido=$_POST['apellido'];
            $cliente->nombre=$_POST['nombre'];
            $cliente->direccion=$_POST['direccion'];
            $cliente->nacimiento=$_POST['nacimiento'];
            $cliente->genero_id=$_POST['genero'];


            $cliente->nit=$_POST['nit'];
            $cliente->fecha_creacion=$_POST['fecha_creacion'];
            $cliente->tipo_id=$_POST['tipo'];
            $cliente->crear();
            header('Location: index.php?controller=Cliente&action=index');
        }else
        {
            $tipo= new Tipo();
            $tipos=$tipo->listar();
            $genero=new Genero();
            $generos=$genero->listar();
            return $this->view->show('cliente/create',[
                'tipos'=>$tipos,
                'generos'=>$generos,
            ]);
        }

    }
    public function editAction()
    {
        if(!empty($_POST))
        {
            $cliente= new Cliente();
            $cliente->persona_id=$_POST['persona_id'];
            $cliente->apellido=$_POST['apellido'];
            $cliente->nombre=$_POST['nombre'];
            $cliente->direccion=$_POST['direccion'];
            $cliente->nacimiento=$_POST['nacimiento'];;
            $cliente->genero_id=$_POST['genero'];

            $cliente->cliente_id=$_POST['cliente_id'];
            $cliente->nit=$_POST['nit'];
            $cliente->fecha_creacion=$_POST['fecha_creacion'];
            $cliente->tipo_id=$_POST['tipo'];
            $cliente->update();
            header('Location: index.php?controller=Cliente&action=index');
        }else
        if(!empty($_GET['id']))
        {
            $model=new Cliente();
            $cliente=$model->findById($_GET['id']);
            if(!is_null($cliente))
            {
                $tipo= new Tipo();
                $tipos=$tipo->listar();
                $genero=new Genero();
                $generos=$genero->listar();
                return $this->view->show('cliente/edit',[
                    'cliente'=>$cliente,
                    'tipos'=>$tipos,
                    'generos'=>$generos,
                ]);
            }
        }else
        {
            header('Location: index.php?controller=Empleado&action=index');
        }

    }
    public function deleteAction(){
        if($_GET['persona'] and $_GET['cliente'])
        {
            $model= new Cliente();
            $model->cliente_id=$_GET['cliente'];
            $model->persona_id=$_GET['persona'];
            if($model->eliminar())
            {
                header('Location: index.php?controller=Cliente&action=index');
            }

        }
    }
}