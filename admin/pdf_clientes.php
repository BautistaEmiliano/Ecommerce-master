<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',8);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(-100,10,'Empresa Word Case',0,0,'C');
    $this->Ln(10);

    $this->Cell(60,10,'Reporte de Clientes Registrados ',0,0,'C');
    

	$this->Ln(20);
    $this->Cell(10, 10, 'ID', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'NOMBRE', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'APELLIDO', 1, 0, 'C', 0);
    $this->Cell(60, 10, 'CORREO', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'DIREC 1', 1, 0, 'C', 0);
  
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
$consulta = "SELECT * FROM user_info";
$resultado = $msqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(10, 10, $row ['user_id'], 1, 0, 'C', 0);
	$pdf->Cell(40, 10, utf8_decode($row ['firs_name']), 1, 0, 'C', 0);
	$pdf->Cell(40, 10, utf8_decode($row ['last_name']), 1, 0, 'C', 0);
	$pdf->Cell(60, 10, utf8_decode($row ['email']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row ['mobile']), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($row ['address1']), 1, 1, 'C', 0);
    
    
}

$pdf->Output();
?>