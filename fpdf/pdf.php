<?php
require('fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18 );
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,' Factura de compra',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(40, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(80, 10, 'Descripcion', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Precio', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Decuento', 1, 1, 'C', 0);
}
}
require '../php/conexion_be.php';
$consulta = "SELECT * FROM productos";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $row['descripcion'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['precio'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['descuento'], 1, 0, 'C', 0);
    
}
$pdf->Output();
?>