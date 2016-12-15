<?php
require 'models/Reporte.php';
class ReporteController extends Controller
{

    public function indexAction()
    {
        return $this->view->show('reporte/index',[]);
    }
    public function empleadosAction()
    {
        $reporte = new Reporte();
        return $reporte->reporteEmpleados();
    }
    public function ventasAction()
    {
        $reporte = new Reporte();
        return $reporte->reporteVentas();
    }
    public function productosAction()
    {
        $reporte = new Reporte();
        return $reporte->reporteProductos();
    }
}