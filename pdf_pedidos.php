<?php
require('admin/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(-80,10,'Empresa Word Case',0,0,'C');
    $this->Ln(10);

    $this->Cell(65,10,'Reporte de Pedidos del Cliente ',0,0,'C');
    

	$this->Ln(20);
    $this->Cell(80, 10, 'NOMBRE DEL PRODUCTO', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'PRECIO', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'CANTIDAD', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'TRX_ID', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$msqli = new mysqli("localhost", "root", "", "wordcase");
session_start();
$user_id = $_SESSION["uid"];
$consulta = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
$resultado = $msqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(80, 10,  utf8_decode($row ['product_title']), 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row ['product_price'], 1, 0, 'C', 0);
	$pdf->Cell(50, 10,$row ['qty'], 1, 0, 'C', 0);
	$pdf->Cell(35, 10, $row ['trx_id'], 1, 1, 'C', 0);
}

$pdf->Output();
?>