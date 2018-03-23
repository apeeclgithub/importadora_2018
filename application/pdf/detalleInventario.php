<?php 
include_once('../../library/fpdf/fpdf.php'); 
header("Content-Type: text/html; charset=iso-8859-1 ");
require_once '../model/classDatabase.php';


class PDF extends FPDF
{
   //Cabecera de página
  function Header()
  {

    $this->Image('../../public/img/logo.png',130,8,33);

    $this->SetFont('Arial','B',12);
    $this->Ln(10);
    $this->Ln(10);
    $this->Cell(0,10, utf8_decode('Importadora y Comercializadora de artículos Ópticos'),1,0,'C');
    $this->Ln(10);
    $this->Cell(0,10, 'Rut: 76.371.666-k',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,10, 'Mac Iver 180, Oficina 35',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,10, 'Importadoralypltda@gmail.com',0,0,'C');
    $this->Ln(10);
    $this->Ln(10);
    $this->Cell(15,10, utf8_decode('N°'),1,0,'C');
    $this->Cell(50,10, utf8_decode('Código'),1,0,'C');
    $this->Cell(100,10, utf8_decode('Descripción'),1,0,'C');
    $this->Cell(45,10, utf8_decode('Color'),1,0,'C');
    $this->Cell(45,10, utf8_decode('Marca'),1,0,'C');
    $this->Cell(20,10, utf8_decode('Stock'),1,0,'C');
    $this->Ln();
  }

function CabeceraProds(){
  //Pie de página
}
function Productos()
{
    require_once '../model/classProducto.php';
    $objProduct = new Producto();
    $objProduct->selectProductAll();

    foreach ((array) $objProduct as $key) {
      foreach ($key as $key2 => $value) {
        $key2 = $key2+1;
        $this->Cell(15,10, utf8_decode($key2),1,0,'C');
        $this->Cell(50,10,$value['pro_codigo'],1,0);
        $this->Cell(100,10,utf8_decode($value['pro_descripcion']),1,0);
        $this->Cell(45,10,$value['col_nombre'],1,0);
        $this->Cell(45,10,$value['mar_nombre'],1,0);
        $this->Cell(20,10,$value['pro_stock'],1,0);
        $this->Ln(10);


      }
    }
}

//Pie de página
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

}
//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->Productos();




$pdf->Output();
?> 