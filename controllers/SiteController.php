<?php


class SiteController extends Controller
{
    public function indexAction()
    {
        $mensaje = 'Mensaje enviado desde el controlador';
        $parametros = ['mensaje' => $mensaje,];
        $this->view->show('site/index', $parametros);
    }

}