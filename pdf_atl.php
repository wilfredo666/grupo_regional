<?php
include 'conexion.php';
require 'fpdf/fpdf.php';
$id_hoja_costos_atl=$_GET['id'];

/*consulta*/
$atl=mysqli_fetch_array(mysqli_query($con,"select nombre, nombre_proyecto from hoja_costos_atl JOIN cliente ON hoja_costos_atl.cliente=cliente.codigo WHERE id_hoja_costos=$id_hoja_costos_atl"));

/*consulta - personal directo que interviene en la operacion*/
$per_directo=mysqli_query($con,"select * from personal_directo_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*consulta - materiales que interviene en la operacion*/
$materiles=mysqli_query($con,"select * from materiales_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*consulta - servicios que interviene en la operacion*/
$servicios=mysqli_query($con,"select * from servicios_contratados_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*consulta - productos propios de taller*/
$productos=mysqli_query($con,"select * from producto_propio_taller_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*consulta - equipos propios*/
$equipos=mysqli_query($con,"select * from equipo_propio_atl where id_hoja_costos_atl=$id_hoja_costos_atl");

$fe=strftime("%A %d de %B del %Y");

/*carta para hoja de costos atl*/
class PDF extends FPDF{
    function Header(){
        $this->Image('imagenes/grupo_regional.jpg',5,5,30);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,10,'Grupo Regional S.R.L.',0,0,'C');
        $this->Ln(20);
    }
    function Footer(){
        $this->SetY(-45);
        $this->Cell(190,6,'Atentamente',0,1,"C");
        $this->SetY(-39);
        $this->Cell(190,6,'persona',0,1,"C");
        $this->SetY(-33);
        $this->Cell(190,6,'puesto',0,1,"C");
        $this->SetY(-27);
        $this->Cell(190,6,'correo',1,1,"C");
        $this->SetY(-21);
        $this->Cell(190,6,'www.gruporegional.com',1,1,"C");
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function ImprovedTable($cabecera)
    {
        // Anchuras de las columnas
        $w = array(75, 20, 20, 40,40);
        // Cabeceras
        for($i=0;$i<count($cabecera);$i++)
            $this->Cell($w[$i],7,$cabecera[$i],1,0,'C');
        $this->Ln();
        // Datos
        // Línea de cierre
        /*$this->Cell(array_sum($w),0,'','T');*/
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetX(140);
$pdf->Cell(60,10,$fe,0,1,"R");
$pdf->Cell(60,10,'Señores.- '.$atl[0],0,1,"L");
$pdf->Cell(60,10,'Presente.- ',0,1,"L");
$pdf->SetX(60);
$pdf->Cell(60,10,'Ref: '.$atl[1],0,1,"C");
$pdf->Cell(190,10,'De nuestra consideracion, nos es grato dirigimos a ustedes  a los efectos de hacerle llegar al siguiente detalle:',0,1,"L");
$pdf->Cell(60,10,'Detalle por utilitarios:',0,1,"L");
/*datos para tabla*/
$cabecera = array('Item', 'Dias', 'Cantidad', 'Costo unitario (Bs)', 'Costo total (Bs)');
$pdf->ImprovedTable($cabecera);
/*personal directo*/

while($row1=mysqli_fetch_array($per_directo)){
    $pdf->Cell(75,6,$row1[2],'LR');
    $pdf->Cell(20,6,$row1[5],'R');
    $pdf->Cell(20,6,$row1[6],'R',0,'R');
    $pdf->Cell(40,6,$row1[9]/$row1[6]/$row1[5],'R',0,'R');
    $pdf->Cell(40,6,$row1[9],'R',0,'R');
    $pdf->Ln();
}

/*meteriales*/
while($row2=mysqli_fetch_array($materiles)){
    $pdf->Cell(75,6,$row2[2],'LR');
    $pdf->Cell(20,6,'','R');
    $pdf->Cell(20,6,$row2[4],'R',0,'R');
    $pdf->Cell(40,6,$row2[8]/$row2[4],'R',0,'R');
    $pdf->Cell(40,6,$row2[8],'R',0,'R');
    $pdf->Ln();
}
/*servicios*/
while($row3=mysqli_fetch_array($servicios)){
    $pdf->Cell(75,6,$row3[2],'LR');
    $pdf->Cell(20,6,'','R');
    $pdf->Cell(20,6,$row3[5],'R',0,'R');
    $pdf->Cell(40,6,$row3[9]/$row3[5],'R',0,'R');
    $pdf->Cell(40,6,$row3[9],'R',0,'R');
    $pdf->Ln();
}
/*productos propios*/
while($row4=mysqli_fetch_array($productos)){
    $pdf->Cell(75,6,$row4[2],'LR');
    $pdf->Cell(20,6,'','R');
    $pdf->Cell(20,6,$row4[3],'R',0,'R');
    $pdf->Cell(40,6,$row4[6]/$row4[3],'R',0,'R');
    $pdf->Cell(40,6,$row4[6],'R',0,'R');
    $pdf->Ln();
}
/*equipos propios*/
while($row5=mysqli_fetch_array($equipos)){
    $pdf->Cell(75,6,$row5[2],'LR');
    $pdf->Cell(20,6,'','R');
    $pdf->Cell(20,6,$row5[3],'R',0,'R');
    $pdf->Cell(40,6,$row5[6]/$row5[3],'R',0,'R');
    $pdf->Cell(40,6,$row5[6],'R',0,'R');
    $pdf->Ln();
}

$pdf->Cell(115,6,'','T',0,"C");
$pdf->SetX(125);
$pdf->Cell(40,6,'Subtotal = ',1,0,"C");
$pdf->SetX(165);
$pdf->Cell(40,6,' ',1,1,"C");
$pdf->SetX(125);
$pdf->Cell(40,6,'F.E.E. 17% = ',1,0,"C");
$pdf->SetX(165);
$pdf->Cell(40,6,' ',1,1,"C");
$pdf->SetX(125);
$pdf->Cell(40,6,'Total = ',1,0,"C");
$pdf->SetX(165);
$pdf->Cell(40,6,' ',1,1,"C");
$pdf->Ln();

$pdf->Output();


?>