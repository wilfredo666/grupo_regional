<?php
include 'conexion.php';
require 'fpdf/fpdf.php';
$cod_proyecto_atl=$_GET['id'];

/*consulta*/
$atl=mysqli_fetch_array(mysqli_query($con,"select nombre, nombre_proyecto from hoja_costos_atl JOIN cliente ON hoja_costos_atl.cliente=cliente.codigo WHERE codigo_hoja_costos=$cod_proyecto_atl"));

$todo_atl="SELECT codigo_hoja_costos, nombre, nombre_proyecto, fecha_hora_creacion from hoja_costos_atl JOIN usuario ON hoja_costos_atl.id_usuario=usuario.id_usuario JOIN cliente ON hoja_costos_atl.cliente=cliente.codigo";
$todo_atl2=mysqli_query($con,$todo_atl);

/*while($datos=mysqli_fetch_array($todo_atl2)){
    echo $datos[0];
}*/
setlocale(LC_ALL,"es_ES");
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
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function ImprovedTable($cabecera)
    {
        // Anchuras de las columnas
        $w = array(35, 35, 45, 40,40);
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
while($datos=mysqli_fetch_array($todo_atl2)){
    $pdf->Cell(35,6,$datos[0],'LR');
    $pdf->Cell(35,6,$datos[1],'LR');
    $pdf->Cell(45,6,$datos[2],'LR',0,'R');
    $pdf->Cell(40,6,$datos[3],'LR',0,'R');
    $pdf->Ln();
}

$pdf->Output();


?>