<?php
require 'models/Sucursal.php';


class SiteController extends Controller
{
    public function indexAction()
    {
        $mensaje = 'Mensaje enviado desde el controlador';
        $parametros = ['mensaje' => $mensaje,];
        $this->view->show('site/index', $parametros);
    }
    public function loginAction(){

        $mensaje='';
        if(!empty($_POST['login'])) {

            if (User::singleton()->login($_POST['username'], $_POST['password'],$_POST['sucursal'],$_POST['caja'])) {
                header('Location: index.php?controller=Site&action=index');
            }
            else {
                $mensaje='Datos inválidos, intente de nuevo.';
            }
        }
        $modelsucursal= new Sucursal();
        $sucursales= $modelsucursal->listar();

        $modelCaja=new Caja();
        $cajas=$modelCaja->listar();


        return $this->view->show('site/login',[
            'sucursales'=>$sucursales,
            'cajas'=>$cajas,
            'mensaje'=>$mensaje,
        ]);

    }
    public function logoutAction(){
        $user = User::singleton();
        $user::logout();
        header('Location: index.php?controller=Site&action=login');
    }

}