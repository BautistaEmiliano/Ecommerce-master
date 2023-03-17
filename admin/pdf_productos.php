<?php
require('fpdf/fpdf.php');

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

    $this->Cell(65,10,'Reporte de Productos ',0,0,'C');
    

	$this->Ln(20);
    $this->Cell(15, 10, 'ID', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'ID_CAT', 1, 0, 'C', 0);
    $this->Cell(100, 10, 'NOMBRE', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'PRECIO', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM products";
$resultado = $msqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(15, 10, $row ['product_id'], 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row ['product_cat'], 1, 0, 'C', 0);
	$pdf->Cell(100, 10, utf8_decode($row ['product_title']), 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row ['product_price'], 1, 1, 'C', 0);
}

$pdf->Output();
?>