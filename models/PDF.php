<?php

require('fpdf181/fpdf.php');

//Creamos la nueva clase pdf que hereda de fpdf

class PDF extends FPDF
{

// utilizamos la funcion Header() y la personalizamos para que muestre la cabecera de página
    function Header()

    {
        $config=Config::singleton();
        $this->Image($config->get('logo-reporte'),10,10,35);

        // seteamos el tipo de letra Arial Negrita 16
        $this->SetFont('Arial','B',15);

        // ponemos una celda sin contenido para centrar el titulo o la celda del titulo a la derecha
        $this->Cell(70);

        // definimos la celda el titulo
        $this->Cell(40,10,utf8_decode($config->get('nombreSistema')),0,0,'C');

        // Salto de línea salta 20 lineas
        $this->Ln(25);
        $this->SetFont('Arial','B',10);
        $this->Cell(0,10,utf8_decode($config->get('ubicacion')),0,'L');
        $this->Ln(4);
        $this->Cell(0,10,utf8_decode($config->get('telefono')),0,'L');
        $this->Ln(4);
        $this->Cell(0,10,utf8_decode($config->get('correo')),0,'L');
        $this->Ln(4);
        $this->Cell(30,10,utf8_decode('Usuario: '.User::singleton()->nombre).' |',0,'L');
        $this->Cell(0,10,date("d-m-Y"),0,'L');
        $this->Ln(6);
        $this->Cell(0,10,utf8_decode($config->get('nombre-reporte')),0,0,'C');
        $this->Ln();
    }


// utilizamos la funcion Footer() y la personalizamos para que muestre el pie de página
    function Footer()

    {
        // Seteamos la posicion de la proxima celda en forma fija a 1,5 cm del final de la pagina

        $this->SetY(-15);
        // Seteamos el tipo de letra Arial italica 10

        $this->SetFont('Arial','I',8);
        // Número de página

        $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'',0,0,'C');
    }

}