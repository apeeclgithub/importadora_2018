<?php
require("../../library/fpdf/fpdf.php");
//require("../model/classDatabase.php");
header("Content-Type: text/html; charset=iso-8859-1 ");

$con= mysql_connect("localhost","root","");
mysql_query("SET NAMES 'utf8'");
if($con){   
    $db = mysql_select_db("optica_db",$con);
    if(!$db){ 
        echo "Problemas para conectar a la BD";
    }
}else{
    echo "Problemas para conectar con el servidor";
}

class PDF extends FPDF
{
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
    $this->Cell(50,10,utf8_decode('Nombre'),1,0,'C');
    $this->Cell(30,10,utf8_decode('Rut'),1,0,'C');
    $this->Cell(25,10,utf8_decode('Fono'),1,0,'C');
    $this->Cell(25,10,utf8_decode('Celular'),1,0,'C');
    $this->Cell(70,10,utf8_decode('Dirección'),1,0,'C');
    $this->Cell(35,10,utf8_decode('Comuna'),1,0,'C');
    $this->Cell(30,10,utf8_decode('Giro'),1,0,'C');
    $this->Ln(10);
}

function Client(){
    $clientes = mysql_query("SELECT * FROM cliente");
    $item = 0;

    while($clientes2 = mysql_fetch_array($clientes)){
        $item = $item+1;
        $this->Cell(15,10, utf8_decode($item),1,0,'C');
        $this->Cell(50,10,utf8_decode($clientes2['CLI_NOMBRE']),1,0);
        $this->Cell(30,10,$clientes2['CLI_RUT'],1,0);
        $this->Cell(25,10,$clientes2clientes2['CLI_FONO'],1,0);
        $this->Cell(25,10,$clientes2['CLI_CELULAR'],1,0);
        $this->Cell(70,10,utf8_decode($clientes2['CLI_DIRECCION']),1,0);
        $this->Cell(35,10,utf8_decode($clientes2['CLI_COMUNA']),1,0);
        $this->Cell(30,10,utf8_decode($clientes2['CLI_GIRO']),1,0);
        $this->Ln(10);
    }

  }

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
}
}

$pdf = new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Client();
$pdf->Output();
?>