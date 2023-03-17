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
    
    $this->Cell(65,10,'Reporte de Marcas ',0,0,'C');
    

	$this->Ln(20);
    $this->Cell(15, 10, 'ID', 1, 0, 'C', 0);
    $this->Cell(140, 10, 'NOMBRE', 1, 1, 'C', 0);
    
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
$consulta = "SELECT * FROM brands";
$resultado = $msqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(15, 10, $row ['brand_id'], 1, 0, 'C', 0);
	$pdf->Cell(140, 10, utf8_decode($row ['brand_title']) , 1, 1, 'C', 0);
	
}

$pdf->Output();
?>