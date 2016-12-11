<?php
require 'models/Empleado.php';
require 'models/Cargo.php';
require 'models/Genero.php';
class EmpleadoController extends Controller
{
    public function indexAction()
    {
        $model = new Empleado();
        $empleados = $model->listar();
        return $this->view->show('empleado/index',[
            'empleados' => $empleados
        ]);
    }
    public function createAction()
    {
        if(!empty($_POST))
        {
            $persona=new Empleado();
            $persona->apellido=$_POST['apellido'];
            $persona->nombre=$_POST['nombre'];
            $persona->direccion=$_POST['direccion'];
            $persona->nacimiento=$_POST['nacimiento'];
            $persona->genero_id=$_POST['genero'];


            $persona->correo=$_POST['correo'];
            $persona->username=$_POST['username'];
            $persona->password=$_POST['password'];
            $persona->rol_id=$_POST['rol'];;
            $persona->crear();
            header('Location: index.php?controller=Empleado&action=index');
        }else
        {
            $cargo= new Cargo();
            $cargos=$cargo->listar();
            $genero=new Genero();
            $generos=$genero->listar();
            return $this->view->show('empleado/create',[
                'cargos'=>$cargos,
                'generos'=>$generos,
            ]);
        }

    }
    public function editAction()
    {
        if(!empty($_POST))
        {
            $empleado= new Empleado();
            $empleado->empleado_id=$_POST['persona_id'];
            $empleado->apellido=$_POST['apellido'];
            $empleado->nombre=$_POST['nombre'];
            $empleado->direccion=$_POST['direccion'];
            $empleado->nacimiento=$_POST['nacimiento'];;
            $empleado->genero_id=$_POST['genero'];

            $empleado->persona_id=$_POST['empleado_id'];
            $empleado->correo=$_POST['correo'];
            $empleado->username=$_POST['username'];
            $empleado->password=$_POST['password'];
            $empleado->rol_id=$_POST['rol'];;
            $empleado->update();
            header('Location: index.php?controller=Empleado&action=index');
        }
        if(!empty($_GET['id']))
        {
            $model=new Empleado();
            $empleado=$model->findById($_GET['id']);
            if(!is_null($empleado))
            {
                $cargo= new Cargo();
                $cargos=$cargo->listar();
                $genero=new Genero();
                $generos=$genero->listar();
                return $this->view->show('empleado/edit',[
                    'empleado'=>$empleado,
                    'cargos'=>$cargos,
                    'generos'=>$generos,
                ]);
            }
        }else
        {
            header('Location: index.php?controller=Empleado&action=index');
        }

    }
    public function deleteAction(){
        if($_GET['persona'] and $_GET['empleado'])
        {
            $model= new Empleado();
            $model->empleado_id=$_GET['persona'];
            $model->persona_id=$_GET['persona'];
            if($model->eliminar())
            {
                header('Location: index.php?controller=Empleado&action=index');
            }

        }
    }
}