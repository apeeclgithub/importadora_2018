<?php 
include_once('../../library/fpdf/fpdf.php'); 
header("Content-Type: text/html; charset=iso-8859-1 ");
require_once '../model/classDatabase.php';



class PDF extends FPDF
{
   //Cabecera de página
	function Header()
	{

		$this->Image('../../public/img/logo.png',87,8,33);

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
		
	}

	function TablaCliente(){
		$this->SetFont('Arial','',12);
		$this->Cell(40,5, utf8_decode('Nombre: '));
		$this->Ln(5);
		$this->Cell(40,5, utf8_decode('Dirección: '));
		$this->Ln(5);
		$this->Cell(40,5, utf8_decode('Comuna: '));
		$this->Ln(5);
		$this->Cell(40,5, utf8_decode('Rut: '));
		$this->Ln(5);
		$this->Cell(40,5, utf8_decode('Fono: '));
		$this->Ln(5);
		$this->Cell(40,5, utf8_decode('Celular: '));
	}

/*	function TablaBasica() {
    //Cabecera
	$this->Cell(20,10, utf8_decode('Código'),1,0,'C');
	$this->Cell(100,10, utf8_decode('Descripción'),1,0,'C');
	$this->Cell(20,10, utf8_decode('Cantidad'),1,0,'C');
	$this->Cell(30,10, utf8_decode('P. Unitario'),1,0,'C');
	$this->Cell(20,10, utf8_decode('Total'),1,0,'C');
    $this->Ln();

    require_once '../model/classCarrito.php';
	if(!@session_start()){session_start();}
			$carrito->get_content();
			$carro = $carrito;
			

      $this->Cell(20,10, var_dump($carrito),1);
      /*$this->Cell(100,10,"hola2",1);
      $this->Cell(20,10,"hola3",1);
      $this->Cell(30,10,"hola4",1);
      $this->Cell(20,10,"hola4",1);
      $this->Ln();
      $this->Cell(20,10,"hola",1);
      $this->Cell(100,10,"hola2",1);
      $this->Cell(20,10,"hola3",1);
      $this->Cell(30,10,"hola4",1);
      $this->Cell(20,10,"hola4",1);
  }*/
  	function Client(){

  	}

//Pie de página
  function Footer()
  {

  	

  }

}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(10);

require_once '../model/classVenta.php';
$objVenta = new Venta();
$objVenta->selectVentaById($_GET['id']); 
foreach ((array) $objVenta as $key) {
    foreach ($key as $key2 => $value) {
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(40,5,"N. de Venta: ");
        $pdf->Cell(100,5,$value['ven_id']);
		$pdf->Ln(5);
		$pdf->Cell(40,5,"Fecha: ");
        $pdf->Cell(100,5,$value['ven_fecha']);
        $pdf->Ln(15);
        
		$pdf->Cell(40,5, utf8_decode('Nombre:'));
        $pdf->Cell(100,5,utf8_decode($value['cli_nombre']));
		$pdf->Ln(5);
		$pdf->Cell(40,5, utf8_decode('Dirección: '));
        $pdf->Cell(100,5,$value['cli_direccion']);
		$pdf->Ln(5);
		$pdf->Cell(40,5, utf8_decode('Comuna: '));
        $pdf->Cell(100,5,$value['cli_comuna']);
		$pdf->Ln(5);
		$pdf->Cell(40,5, utf8_decode('Rut: '));
        $pdf->Cell(100,5,$value['cli_rut']);
		$pdf->Ln(5);
		$pdf->Cell(40,5, utf8_decode('Fono: '));
        $pdf->Cell(100,5,$value['cli_fono']);
		$pdf->Ln(5);
		$pdf->Cell(40,5, utf8_decode('Celular: '));
        $pdf->Cell(100,5,$value['cli_celular']);
    }
}

$pdf->Ln(10);

$pdf->Cell(35,10, utf8_decode('Código'),1,0,'C');
$pdf->Cell(95,10, utf8_decode('Descripción'),1,0,'C');
$pdf->Cell(20,10, utf8_decode('Cantidad'),1,0,'C');
$pdf->Cell(25,10, utf8_decode('P. Unitario'),1,0,'C');
$pdf->Cell(20,10, utf8_decode('Total'),1,0,'C');
$pdf->Ln();

$objVenta->selectProductVenta($_GET['id']);

foreach ((array) $objVenta as $key) {
    foreach ($key as $key2 => $value) {
	  	$pdf->Cell(35,10, utf8_decode($value['pro_codigo']),1,0);
        $pdf->Cell(95,10, utf8_decode($value['pro_descripcion']),1,0);
        $pdf->Cell(20,10, utf8_decode($value['det_cantidad']),1,0);
        $pdf->Cell(25,10, utf8_decode($value['det_valor']),1,0);
        $pdf->Cell(20,10, utf8_decode($value['det_cantidad']*$value['det_valor']),1,0);
        $pdf->Ln();
    }
}

$objVenta->selectTotalVenta($_GET['id']);

foreach ((array) $objVenta as $key) {
    foreach ($key as $key2 => $value) {

    $pdf->SetY(250);
    $pdf->Cell(40,5, 'Fecha Entrega: ');
    $pdf->Cell(0,5, $value['ven_fecha']);
    $pdf->Ln(10);
    $pdf->Cell(40,5, utf8_decode('Total:'),0,0);
    $pdf->Cell(40,5, $value['ven_valor_neto'],0,0);
    $pdf->Ln(10);
    $pdf->Cell(80,5,'Firma Cliente: ');
    $pdf->Cell(40,5, 'Firma Vendedor: ');
    }
}
/*$pdf->TablaBasica();
*///Aquí escribimos lo que deseamos mostrar...
$pdf->Output();
?> 