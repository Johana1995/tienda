<?php
require 'models/Empleado.php';
class EmpleadoController extends Controller
{
    public function indexAction()
    {
        $model = new Empleado();
        $empleados = $model->listar();
        return $this->view->show('producto/index',['empleados' => $empleados]);
    }
    public function createAction()
    {
        if(!empty($_POST))
        {
            $persona=new Persona();
            $persona->apellido=$_POST['apellido'];
            $persona->nombre=$_POST['nombre'];
            $persona->direccion=$_POST['direccion'];
            $persona->nacimiento=$_POST['nacimiento'];
            $persona->genero_id=$_POST['genero'];
            $persona_id=$persona->crear();


            $empleado= new Empleado();
            $empleado->persona_id=$persona_id;
            $empleado->correo=$_POST['correo'];
            $empleado->username=$_POST['username'];
            $empleado->password=$_POST['password'];
            $empleado->rol_id=$_POST['rol'];;
            $empleado->crear();
            header('Location: index.php?controller=Producto&action=index');
        }
        $rol= new Rol();
        $paquetes=$paquete->listar();
        $depto= new Departamento();
        $deptos=$depto->listar();
        return $this->view->show('producto/create',[
            'paquetes'=>$paquetes,
            'deptos'=>$deptos,
                ]);
    }
    public function editAction()
    {
        if(!empty($_POST))
        {
            $producto= new Producto();
            $producto->id=$_POST['id'];
            $producto->codigo=$_POST['codigo'];
            $producto->codigobarra=$_POST['barra'];
            $producto->detalle=$_POST['detalle'];
            $producto->precioFabricaU=$_POST['ufabrica'];;
            $producto->precioFabricaPack=$_POST['packfabrica'];
            $producto->imagen=$_POST['imagen'];
            $producto->precioUnidadVenta=$_POST['uventa'];
            $producto->precioPackinVenta=$_POST['packventa'];
            $producto->paquete_id=$_POST['paquete'];;
            $producto->depto_id=$_POST['depto'];
            $producto->update();
            header('Location: index.php?controller=Producto&action=index');
        }
        if(!empty($_GET['id']))
        {
            $model=new Producto();
            $producto=$model->findById($_GET['id']);
            if(!is_null($producto))
            {
                $paquete= new Paquete();
                $paquetes=$paquete->listar();
                $depto= new Departamento();
                $deptos=$depto->listar();
                return $this->view->show('producto/edit',[
                    'producto'=>$producto,
                    'paquetes'=>$paquetes,
                    'deptos'=>$deptos,
                ]);
            }
        }else
        {
            header('Location: index.php?controller=Producto&action=index');
        }

    }
    public function deleteAction(){
        if($_GET['id'])
        {
            $model= new Producto();
            $model->id=$_GET['id'];
            if($model->eliminar())
            {
                header('Location: index.php?controller=Producto&action=index');
            }

        }
    }
}