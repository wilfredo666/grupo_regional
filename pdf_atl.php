<?php
include 'conexion.php';
require 'fpdf/fpdf.php';
$id_hoja_costos_atl=$_GET['id_hoja_costos'];
$usuario=$_GET['id'];
/*datos de empleado*/
$dat_empleado=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM empleado JOIN usuario ON empleado.ci=usuario.ci_empleado JOIN datos_laborales ON datos_laborales.ci_empleado=empleado.ci where id_usuario=$usuario"));

/*consulta - cliente, nombre proyecto y tipo de proyecto*/
$atl=mysqli_fetch_array(mysqli_query($con,"select nombre, nombre_proyecto, tipo_proyecto from hoja_costos_atl JOIN cliente ON hoja_costos_atl.cliente=cliente.codigo WHERE id_hoja_costos=$id_hoja_costos_atl"));

/*consulta - costos*/
$cos_totales=mysqli_fetch_array(mysqli_query($con,"select * from costos_totales_atl where id_hoja_costos_atl=$id_hoja_costos_atl"));
/*consulta - personal directo que interviene en la operacion*/
$per_directo=mysqli_query($con,"select * from personal_directo_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*consulta - materiales/servicios que interviene en la operacion*/
$servicios=mysqli_query($con,"select * from servicios_contratados_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*consulta - productos/equipos propios de taller*/
$productos=mysqli_query($con,"select * from producto_propio_taller_atl where id_hoja_costos_atl=$id_hoja_costos_atl");
/*fecha*/
setlocale(LC_ALL, "es_ES");
$fe=strftime("Fecha: %A %d de %B del %Y");

/*carta para hoja de costos atl*/
class PDF extends FPDF{
    function Header(){
        $this->Image('imagenes/grupo_regional.jpg',5,5,30);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        /*$this->Cell(120,10,'Grupo Regional S.R.L.',0,0,'C');*/
        $this->Ln(20);
    }
    function Footer(){
        global $dat_empleado;
        $this->SetY(-90);
        $this->Cell(45,5,'Atentamente',0,1,"C");
        $this->SetY(-85);
        $this->Cell(45,5,$dat_empleado[2].' '.$dat_empleado[4].' '.$dat_empleado[5],0,1,"C");
        $this->SetY(-80);
        $this->Cell(45,5,$dat_empleado[24],0,1,"C");
        $this->SetY(-75);
        $this->Cell(45,5,$dat_empleado[23],0,1,"C");
        $this->SetY(-70);
        $this->Cell(45,5,'www.gruporegional.com',0,1,"C");
        /*$this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');*/
    }
    function ImprovedTable($cabecera){
        // Anchuras de las columnas
        $w = array(95, 12, 18, 35,30);
        // Cabeceras
        for($i=0;$i<count($cabecera);$i++)
            $this->Cell($w[$i],7,$cabecera[$i],1,0,'C');
        $this->Ln();
        // Datos
        // Línea de cierre
        /*$this->Cell(array_sum($w),0,'','T');*/
    }
}

//utf8_decode()
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('imagenes/membretado.jpg',0,0,230,280);
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
$t_cos_tot1=0;
$t_cos_tot2=0;
$t_cos_tot3=0;
$t_cos_tot4=0;
$t_cos_tot5=0;

while($row1=mysqli_fetch_array($per_directo)){
    if($row1[9]!=0){
        $pdf->Cell(95,6,$row1[2],'LR');
        $pdf->Cell(12,6,$row1[5],'R',0,'C');
        $pdf->Cell(18,6,$row1[6],'R',0,'C');
        $pdf->Cell(35,6,number_format($row1[9]/$row1[6]/$row1[5],2,".",""),'R',0,'C');
        $pdf->Cell(30,6,$row1[9],'R',0,'C');
        $pdf->Ln();
        $t_cos_tot1=$t_cos_tot1+$row1[9];   
    }
}

/*materiales/servicios que interviene en la operacion*/
while($row3=mysqli_fetch_array($servicios)){
    if($row3[9]!=0){
        $pdf->Cell(95,6,$row3[2],'LR');
        $pdf->Cell(12,6,$row3[4],'',0,'C');
        $pdf->Cell(18,6,$row3[5],'LR',0,'C');
        $pdf->Cell(35,6,number_format($row3[9]/$row3[5],2,".",""),'R',0,'C');
        $pdf->Cell(30,6,$row3[9],'R',0,'C');
        $pdf->Ln();
        $t_cos_tot3=$t_cos_tot3+$row3[9];
    }

}
/*productos/equipos propios de taller*/
while($row4=mysqli_fetch_array($productos)){
    if($row4[5]!=0){
        $pdf->Cell(95,6,$row4[2],'LR');
        $pdf->Cell(12,6,'','C');
        $pdf->Cell(18,6,$row4[3],'LR',0,'C');
        $pdf->Cell(35,6,$row4[4],'R',0,'C');
        $pdf->Cell(30,6,$row4[5],'R',0,'C');
        $pdf->Ln();
        $t_cos_tot4=$t_cos_tot4+$row4[5];   
    }
}

$pdf->Cell(125,6,'','T',0,"C");
$pdf->SetX(135);
$pdf->Cell(35,6,'Subtotal = ',1,0,"C");
$pdf->SetX(170);
if($atl[2]=="EXTERNO"){
    $pdf->Cell(30,6,number_format($t_cos_tot1+$t_cos_tot2+$t_cos_tot3+$t_cos_tot4+$t_cos_tot5,2,".",""),1,1,"C");
}else{
    $pdf->Cell(30,6,$cos_totales[13],1,1,"C");
}
$pdf->SetX(135);
$pdf->Cell(35,6,'F.E.E.('.$cos_totales[9].'%) = ',1,0,"C");
$pdf->SetX(170);
$pdf->Cell(30,6,$cos_totales[10],1,1,"C");
$pdf->SetX(135);
$pdf->Cell(35,6,'Total = ',1,0,"C");
$pdf->SetX(170);
if($atl[2]=="EXTERNO"){
    $pdf->Cell(30,6,number_format($t_cos_tot1+$t_cos_tot2+$t_cos_tot3+$t_cos_tot4+$t_cos_tot5+$cos_totales[10],2,".",""),1,1,"C");
}else{
    $pdf->Cell(30,6,$cos_totales[13],1,1,"C");
}
$pdf->Ln();

$pdf->Output();

?>