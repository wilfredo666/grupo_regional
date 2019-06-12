<?php
include 'conexion.php';
require 'fpdf/fpdf.php';
include 'num_a_letras.php';

$id_ordenCompra=$_GET['id_ordenCompra'];
$usuario=$_GET['id'];

/*fecha*/
setlocale(LC_ALL, "es_ES");
$fe=strftime("%A %d de %B del %Y");

/*datos de orden de compra*/
$datos_oc=mysqli_fetch_array(mysqli_query($con,"SELECT cod_ordenCompra,
nombre,
nit,
direccion,
num_contactos,
ci_empleado,
dias_credito_oc,
ciudad_oc,
id_ordenCompra
FROM orden_compra
JOIN proveedor ON orden_compra.id_proveedor=proveedor.id_proveedor
JOIN usuario ON orden_compra.id_empleado=usuario.id_usuario
WHERE id_ordenCompra=$id_ordenCompra"));

/*datos de empleado*/
$datos_em=mysqli_fetch_array(mysqli_query($con,"SELECT nombre,
segundo_nombre,
apellido_paterno,
apellido_materno,
cargo,
correo_corporativo
FROM empleado
JOIN datos_laborales ON datos_laborales.ci_empleado=empleado.ci
WHERE ci=$datos_oc[5]"));

/*detalle de orden de compra*/
$detalle=mysqli_query($con,"select * from detalle_ordencompra where id_ordenCompra=$id_ordenCompra");

class PDF extends FPDF{
    function Header(){
        global $datos_oc;
        $this->SetX(140);
        $this->SetFont('Arial','B',15);
        $this->Multicell(70,6,"ORDEN DE COMPRA\nNro.: ".$datos_oc[7]." ".$datos_oc[8]."/2019\nCod.: ".$datos_oc[0],0,"L");
        $this->Ln(5);
    }
    function Footer(){
        global $datos_oc;
        global $fe;
        $this->SetY(-35);
        $this->SetX(75);
        $this->Multicell(100,5,'         ________________________ 
        Aceptacion proveedor:
        '.$fe,0,"C");

    }
    function ImprovedTable($cabecera){
        // Anchuras de las columnas
        $w = array(20, 90, 45, 45);
        // Cabeceras
        for($i=0;$i<count($cabecera);$i++)
            $this->Cell($w[$i],7,$cabecera[$i],1,0,'C');
        $this->Ln();
    }
}

//utf8_decode() - cuerpo
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);

/*datos empleado && empresa*/
$pdf->SetX(140);
$pdf->Multicell(65,5,'        Generado por: 
        '.$datos_em[0].' '.$datos_em[2].' '.$datos_em[3].'
        '.$datos_em[4].'
        '.$datos_em[5],0,"L");
$pdf->SetY(35);
$pdf->SetX(10);
$pdf->Multicell(100,5,"Av. Calampampa N° 2982 esq. J. Baptista\nCochabamba - Bolivia\nTelefono: 591-4474722\nwww.gruporegional.com",0,"L");
$pdf->Ln(5);

/*datos proveedor*/
$pdf->writeHTML('<b>PARA: </b>'.$datos_oc[1].'<br><b>NIT: </b>'.$datos_oc[2].'<br><b>Dir.: </b>'.$datos_oc[3].'<br><b>Telefonos: </b>'.$datos_oc[4]);
$pdf->Ln(10);

$pdf->writeHTML("<u><b>Partes:</b></u> Mediante la presente Grupo Regional Srl. con NIT 159488029 en adelante denominado el COMPRADOR Y ".$datos_oc[1]." con NIT: ".$datos_oc[2]." en adelante denominado el PROVEEDOR.<br><u><b>Objeto:</b></u> El PROVEEDOR se compromete a la entrega del siguiente bien o servicio:");

$pdf->Ln(10);

/*datos para tabla*/
$cos_tot=0;
$cabecera = array('Cantidad', 'Detalle', 'Costo unitario (Bs)', 'Costo total (Bs)');
$pdf->ImprovedTable($cabecera);
while($row1=mysqli_fetch_array($detalle)){
    if($row1[2]!=0){
        $pdf->Cell(20,6,$row1[2],'LR',0,'C');
        $pdf->Cell(90,6,$row1[3],'R',0,'C');
        $pdf->Cell(45,6,$row1[4],'R',0,'C');
        $pdf->Cell(45,6,$row1[6],'R',0,'C');
        $pdf->Ln();
        $cos_tot=number_format($cos_tot+$row1[6],2,".","");   
    }
}
$pdf->Cell(200,6,'','T',0,"C");
$pdf->SetX(120);
$pdf->Cell(45,6,'Total = ',1,0,"C");
$pdf->Cell(45,6,$cos_tot,1,1,"C");
$literal=valorEnLetras($cos_tot);
$pdf->Ln(5);

$pdf->writeHTML("<u><b>Forma de pago:</b></u> El valor total contempla todos los costos incluyendo impuestos y no podrá ser modificado salvo aceptación plena del comprador. El valor a pagar es de Bs. ".$cos_tot.".- (".$literal."), la forma a pagar convenida es de ".$datos_oc[6]." días después de la entrega del servicio y del/la factura o recibo a nombre de: GRUPO REGIONAL S.R.L. con NIT 159488029.<br><u><b>Garantía: </b></u>El PROVEEDOR otorga una garantía sobre el servicio efectuado y la calidad del mismo, cualquier inconveniente atribuible al PROVEEDOR será reparado sin costo alguno al COMPRADOR. En caso de existir cotización la misma formara parte inseparable de la presente ORDEN DE COMPRA.<br><u><b>Aceptación: </b></u>El PROVEEDOR acepta la presente orden de compra y se compromete a dar cumplimiento a los términos expuestos en la misma. El PROVEEDOR se compromete a avisar oportunamente cualquier contratiempo que pudiese suscitarse por carácter de fuerza mayor que impidiese dar cumplimiento al compromiso asumido. El COMPRADOR a efecto de evitar perjuicios o daños por el incumplimiento de la misma una vez aceptada la orden. El PROVEEDOR deberá solicitar cada pago adjuntando el recibo/factura y copia de la presente orden debidamente firmada por autoridad competente de Grupo Regional Srl.
");
$pdf->Output();
?>