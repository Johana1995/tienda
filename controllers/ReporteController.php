<?php

class ReporteController extends Controller
{

    public function indexAction()
    {
        return $this->view->show('reporte/index',[]);
    }
}