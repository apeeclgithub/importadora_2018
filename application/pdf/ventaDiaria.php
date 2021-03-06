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

    $this->SetFont('Arial','',12);
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
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


require_once '../model/classVenta.php';
require_once '../model/classCheque.php';

$fecha = $_GET['date'];
//$fecha = '2016-2-11';
$objVenta = new Venta();
$objVenta->selectTotal($fecha);

$total;

foreach((array)$objVenta as $key){
    foreach($key as $key2){
        $total = $key2['SUM(ven_valor_neto)'];
    }
}

$objCheque = new Cheque();
$objCheque->selectTotalCheque($fecha);

$totalCheque;

foreach((array)$objCheque as $key){
    foreach($key as $key2){
        $totalCheque = $key2['SUM(che_monto)'];
    }
}

$selectNumeroCheque;




$pdf->Cell(95,10, utf8_decode('Fecha'),1,0,'C');
$pdf->Cell(95,10, utf8_decode($fecha),1,0,'C');
$pdf->Ln(20);

$pdf->Cell(95,10, utf8_decode('Monto Efectivo'),1,0,'C');
$pdf->Cell(95,10, utf8_decode(number_format($total-$totalCheque,0,',','.')),1,0,'C');
$pdf->Ln(10);
$pdf->Cell(95,10, utf8_decode('Monto Cheque'),1,0,'C');
$pdf->Cell(95,10, utf8_decode(number_format($totalCheque,0,',','.')),1,0,'C');

$pdf->Ln(20);
$pdf->Cell(95,10, utf8_decode('Total Diario'),1,0,'C');
$pdf->Cell(95,10, utf8_decode(number_format($total,0,',','.')),1,0,'C');
$pdf->Ln(20);

$objCheques = new Cheque();
$objCheques->listChequeFecha($fecha);

foreach((array)$objCheques as $key){
    $pdf->Cell(50,10, utf8_decode('Cantidad de cheques: '.count($key)));
    $pdf->Ln(10);
    $pdf->Cell(30,10, utf8_decode('Número'),1,0,'C');
    $pdf->Cell(40,10, utf8_decode('Banco'),1,0,'C');
    $pdf->Cell(60,10, utf8_decode('Titular'),1,0,'C');
    $pdf->Cell(30,10, utf8_decode('Fecha'),1,0,'C');
    $pdf->Cell(30,10, utf8_decode('Monto'),1,0,'C');
    $pdf->Ln(10);
    foreach($key as $key2){
        $pdf->Cell(30,10, utf8_decode($key2['che_numero']),1,0,'C');
        $pdf->Cell(40,10, utf8_decode($key2['che_banco']),1,0,'C');
        $pdf->Cell(60,10, utf8_decode($key2['che_titular']),1,0,'C');
        $pdf->Cell(30,10, utf8_decode($key2['che_fecha']),1,0,'C');
        $pdf->Cell(30,10, utf8_decode(number_format($key2['che_monto'],0,',','.')),1,0,'C');
        $pdf->Ln(10);
    }
    $pdf->Ln(40);
}

$objVentas = new Venta();
$objVentas->listVenta($fecha);

foreach((array)$objVentas as $key){
    $pdf->Cell(50,10, utf8_decode('Cantidad de ventas: '.count($key)));
    $pdf->Ln(10);

    $pdf->Cell(40,10, utf8_decode('Correlativo'),1,0,'C');
    $pdf->Cell(40,10, utf8_decode('Rut Cliente'),1,0,'C');
    $pdf->Cell(80,10, utf8_decode('Nombre Cliente'),1,0,'C');
    $pdf->Cell(30,10, utf8_decode('Total Venta'),1,0,'C');
    $pdf->Ln(10);
    
    foreach($key as $key2){
        $pdf->Cell(40,10, utf8_decode($key2['ven_id']),1,0,'C');
        $pdf->Cell(40,10, utf8_decode($key2['cli_rut']),1,0,'C');
        $pdf->Cell(80,10, utf8_decode($key2['cli_nombre']),1,0,'C');
        $pdf->Cell(30,10, utf8_decode(number_format($key2['ven_valor_neto'],0,',','.')),1,0,'C');
        $pdf->Ln(10);
    }
}



$pdf->Output();
?> 