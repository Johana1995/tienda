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

}