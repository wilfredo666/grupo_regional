<?php
include 'conexion.php';
require 'fpdf/fpdf.php';

$id_ordenCompra=$_GET['id_ordenCompra'];
$usuario=$_GET['id'];

/*fecha*/
setlocale(LC_ALL, "es_ES");
$fe=strftime("Fecha: %A %d de %B del %Y");

/*datos de orden de compra*/
$datos_oc=mysqli_fetch_array(mysqli_query($con,"SELECT cod_ordenCompra,
nombre,
nit,
direccion,
num_contactos,
ci_empleado
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


class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Ln(20);
    }
        function Footer(){
        global $datos_em;
        $this->SetY(-90);
        $this->Cell(45,5,'Atentamente',0,1,"C");
        $this->SetY(-85);
        $this->Cell(45,5,$datos_em[0].' '.$datos_em[2].' '.$datos_em[3],0,1,"C");
        $this->SetY(-80);
        $this->Cell(45,5,$datos_em[4],0,1,"C");
        $this->SetY(-75);
        $this->Cell(45,5,$datos_em[5],0,1,"C");
        $this->SetY(-70);
        $this->Cell(45,5,'www.gruporegional.com',0,1,"C");
    }
}
//utf8_decode() - cuerpo
$pdf = new PDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('imagenes/membretado.jpg',0,0,230,280);
$pdf->SetFont('Times','',12);
/*datos empleado*/
/*$pdf->SetX(140);
$pdf->Cell(60,5,'GENERADO POR:',0,1,"R");
$pdf->SetX(140);
$pdf->Cell(60,5,'GENERADO POR:',0,1,"R");*/
/*datos empresa*/
$pdf->Cell(5,5,'',0,1);
$pdf->Cell(60,5,'Av. Calampampa N° 2982 esq. J. Baptista',0,1,"L");
$pdf->Cell(60,5,'Cochabamba - Bolivia ',0,1,"L");
$pdf->Cell(60,5,'Telefono: 591-4474722 ',0,1,"L");
/*datos proveedor*/
$pdf->Cell(5,5,'',0,1);
$pdf->Cell(60,5,'PARA:',0,1,"L");
$pdf->Cell(60,5,$datos_oc[1],0,1,"L");
$pdf->Cell(60,5,'NIT: '.$datos_oc[2],0,1,"L");
$pdf->Cell(60,5,'Dir.: '.$datos_oc[3],0,1,"L");
$pdf->Cell(60,5,'Telefonos: '.$datos_oc[4],0,1,"L");
$pdf->Multicell(200,5,'


Partes: Mediante la presente Grupo Regional Srl. con NIT 159488029 en adelante denominado el COMPRADOR Y '.$datos_oc[1].' con NIT: '.$datos_oc[2].' en adelante denominado el PROVEEDOR.
Objeto: El PROVEEDOR se compromete a la entrega del siguiente bien o servicio:',0,"L",false);

$pdf->Multicell(200,5,'Forma de pago: El valor total contempla todos los costos incluyendo impuestos y no podrá ser modificado salvo aceptación plena del comprador. El valor a pagar es de Bs. 655.00.- (Seiscientos cincuenta y cinco 00/100 BOLIVIANOS), la forma a pagar convenida es de 15 días después de la entrega del servicio, de la factura a nombre de: GRUPO REGIONAL S.R.L. con NIT 159488029.
Garantía: El PROVEEDOR otorga una garantía sobre el servicio efectuado y la calidad del mismo, cualquier inconveniente atribuible al PROVEEDOR será reparado sin costo alguno al COMPRADOR. En caso de existir cotización la misma formara parte inseparable de la presente ORDEN DE COMPRA. 
Aceptación: El PROVEEDOR acepta la presente orden de compra y se compromete a dar cumplimiento a los términos expuestos en la misma. El PROVEEDOR se compromete a avisar oportunamente cualquier contratiempo que pudiese suscitarse por carácter de fuerza mayor que impidiese dar cumplimiento al compromiso asumido. El COMPRADOR a efecto de evitar perjuicios o daños por el incumplimiento de la misma una vez aceptada la orden. El PROVEEDOR deberá solicitar cada pago adjuntando el recibo/factura y copia de la presente orden debidamente firmada por autoridad competente de Grupo Regional Srl.
',0,"L",false);


$pdf->Output();
?>