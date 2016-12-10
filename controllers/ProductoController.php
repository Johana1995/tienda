<?php
require 'models/Producto.php';

class ProductoController extends Controller
{

    public function indexAction()
    {
        $model = new Producto();
        $productos = $model->listar();
        return $this->view->show('producto/index',['productos' => $productos]);
    }
    public function createAction()
    {
        if(!empty($_POST))
        {
            $producto= new Producto();

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
            $producto->crear();
            header('Location: index.php?controller=Producto&action=index');
        }
        $paquete= new Paquete();
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
    public function imagenAction()
    {
        if(!empty($_GET['id'])){
            $producto=new Producto();
            $producto->id=$_GET['id'];
            $imagenes=$producto->imagenes();
            return $this->view->show('producto/imagen',[
                'imagenes'=>$imagenes,
                'producto_id'=>$_GET['id'],
            ]);
        }
    }

    public function deleteImageAction(){
        if(!empty($_GET['producto']) and !empty($_GET['imagen'])){
            $producto=new Producto();
            $producto->id= $_GET['producto'];
            $producto->eliminarImagen($_GET['imagen']);
            header('Location: index.php?controller=Producto&action=imagen&id='.$_GET['producto']);

        }else
            {

            }
    }
    public function uploadAction(){

        if (!empty($_POST['imagen']))
        {
            // Recibo los datos de la imagen
            $nombre_img = $_FILES['imagen']['name'];
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];
            $error='';
            //Si existe imagen y tiene un tamaño correcto
            if (($nombre_img == !NULL) && ($tamano <= 200000))
            {
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($tipo == "image/gif") || ($tipo == "image/jpeg") || ($tipo == "image/jpg")|| ($tipo == "image/png"))
                {
                    // Ruta donde se guardarán las imágenes que subamos
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/tienda/imagenes/producto/';


                    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$_POST['producto_id'].'-'.$nombre_img);
                    $producto=new Producto();
                    $producto->id=$_POST['producto_id'];
                    $producto->addImagen($_POST['producto_id'].'-'.$nombre_img);
                    header('Location: index.php?controller=Producto&action=imagen&id='.$_POST['producto_id']);
                }
                else
                {
                    $error= "No se puede subir una imagen con ese formato ";

                }
            }
                            //si existe la variable pero se pasa del tamaño permitido
            if($nombre_img == !NULL) $error="La imagen es demasiado grande ";
            return $this->view->show('producto/upload',[
                'producto_id'=>$_POST['producto_id'],
                'mensaje'=>$error,
            ]);

        }
        else
        if(!empty($_GET['id']))
        {
            $error='';
            $producto_id=$_GET['id'];
            return $this->view->show('producto/upload',[
                'producto_id'=>$producto_id,
                'mensaje'=>$error,
            ]);
        }
    }
}