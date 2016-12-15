<?php
require 'models/PDF.php';
/**
 * Created by PhpStorm.
 * User: German
 * Date: 14/12/2016
 * Time: 11:08 PM
 */
class Reporte extends Model
{

    public function reporteEmpleados(){
        $sql  = 'select e.id as codigo, e.correo,e.username,c.nombre as cargo';
        $sql .= ' FROM empleado e, cargo c';
        $sql .= ' WHERE e.rol_id=c.id';
        $sql .= ' GROUP BY cargo';
        $query = $this->db->prepare($sql);
        $query->execute();
        $empleados = $query->fetchAll(PDO::FETCH_OBJ);

        $config=Config::singleton();
        $config->set('nombre-reporte','Reporte de Empleados');
        $pdf=new PDF('P','mm','Letter');
        $header=['Codigo','Email','Usuario','Cargo'];

        $pdf->SetFont('Arial','',10);
        $pdf->AddPage();
        // Generamos tabla

            // Cabecera
        $pdf->SetFillColor(207, 200, 236);
            foreach ($header as $col)
            {
                $pdf->Cell(45,7,$col,1,0,'L',true);

            }$pdf->Ln();
            //Datos
        foreach ($empleados as $empleado)
        {
            // 37.5
            $pdf->Cell(45,6,utf8_decode($empleado->codigo),1);
            $pdf->Cell(45,6,utf8_decode($empleado->correo),1);
            $pdf->Cell(45,6,utf8_decode($empleado->username),1);
            $pdf->Cell(45,6,utf8_decode($empleado->cargo),1);
            $pdf->Ln();

        }


        // fin generar tabla


//Mostramos el documento pdf
        $pdf->Output();
    }

    public function reporteVentas(){
        $sql  = 'select v.id,v.fechahora,v.total,cl.nit,ep.username,cj.numero,su.nombre,v.anulado';
        $sql .= ' FROM venta v,cliente cl,empleado ep,caja cj,sucursal su ';
        $sql .= ' WHERE v.cliente=cl.id and v.empleado=ep.id and v.caja=cj.id and v.sucursal=su.id';
        $sql .= ' ORDER BY v.fechahora DESC ';
        $query = $this->db->prepare($sql);
        $query->execute();
        $ventas = $query->fetchAll(PDO::FETCH_OBJ);

        $config=Config::singleton();
        $config->set('nombre-reporte','Reporte de Ventas');
        $pdf=new PDF('P','mm','Letter');
        $header=['Codigo','Fecha','Total Bs.','Nit Cliente','Empleado','Caja','Sucursal','Estado'];

        $pdf->SetFont('Arial','',10);
        $pdf->AddPage();
        // Generamos tabla

        // Cabecera
        $pdf->SetFillColor(207, 200, 236);

            $pdf->Cell(20,7,$header[0],1,0,'L',true);
            $pdf->Cell(38,7,$header[1],1,0,'L',true);
            $pdf->Cell(20,7,$header[2],1,0,'L',true);
            $pdf->Cell(30,7,$header[3],1,0,'L',true);
            $pdf->Cell(20,7,$header[4],1,0,'L',true);
            $pdf->Cell(20,7,$header[5],1,0,'L',true);
            $pdf->Cell(20,7,$header[6],1,0,'L',true);
            $pdf->Cell(20,7,$header[7],1,0,'L',true);
        $pdf->Ln();
        //Datos
        foreach ($ventas as $venta)
        {
            // 37.5
            $pdf->Cell(20,6,utf8_decode($venta->id),1);
            $pdf->Cell(38,6,utf8_decode($venta->fechahora),1);
            $pdf->Cell(20,6,utf8_decode($venta->total),1);
            $pdf->Cell(30,6,utf8_decode($venta->nit),1);
            $pdf->Cell(20,6,utf8_decode($venta->username),1);
            $pdf->Cell(20,6,utf8_decode($venta->numero),1);
            $pdf->Cell(20,6,utf8_decode($venta->nombre),1);
            $pdf->Cell(20,6,utf8_decode($venta->anulado == 0 ? 'ACTIVO' : 'DESACTIVO'),1);
            $pdf->Ln();

        }


        // fin generar tabla


//Mostramos el documento pdf
        $pdf->Output();
    }








    public function reporteProductos(){
        $sql  = 'SELECT  s.nombre,p.codigo,ps.cantidadExistente as unidad, ps.cantidadPackExistente as pack,im.url ';
        $sql .= ' FROM producto_sucursal ps,sucursal s,producto p, imagen im ';
        $sql .= ' where ps.producto=p.id and ps.sucursal=s.id and im.producto_id=p.id';
        $sql .= ' GROUP BY s.nombre,p.codigo  ';
        $query = $this->db->prepare($sql);
        $query->execute();
        $ventas = $query->fetchAll(PDO::FETCH_OBJ);

        $config=Config::singleton();
        $config->set('nombre-reporte',' Reporte de Productos Para Reabastecimiento');
        $pdf=new PDF('P','mm','Letter');
        $header=['Sucursal','Producto','Stock por Unidad','Stock por Paquete','Imagen'];

        $pdf->SetFont('Arial','',10);
        $pdf->AddPage();
        // Generamos tabla

        // Cabecera
        $pdf->SetFillColor(207, 200, 236);

        $pdf->Cell(30,7,$header[0],1,0,'L',true);
        $pdf->Cell(30,7,$header[1],1,0,'L',true);
        $pdf->Cell(35,7,$header[2],1,0,'L',true);
        $pdf->Cell(35,7,$header[3],1,0,'L',true);
        $pdf->Cell(60,7,$header[4],1,0,'L',true);
        $pdf->Ln();
        //Datos
        foreach ($ventas as $venta)
        {
            // 37.5
            $pdf->Cell(30,25,utf8_decode($venta->nombre),1,0,'C');
            $pdf->Cell(30,25,utf8_decode($venta->codigo),1,0,'C');
            $pdf->Cell(35,25,utf8_decode($venta->unidad),1,0,'C');
            $pdf->Cell(35,25,utf8_decode($venta->pack),1,0,'C');
            $pdf->Cell(60,25,$pdf->Image($config->get('imagenes').$venta->url, $pdf->GetX()+15, $pdf->GetY()+2, 0,20) ,1);

            //$pdf->Image($config->get('imagenes').$venta->url,10,10,35);
            $pdf->Ln();

        }


        // fin generar tabla


//Mostramos el documento pdf
        $pdf->Output();
    }


}