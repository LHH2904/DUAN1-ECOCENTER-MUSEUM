<?php
require('../../tfpdf/tfpdf.php');
// require('../../fpdf/makefont/cp1258.map');
require('../../utils/utility.php');
require_once('../../Database/dbhelper.php');    
// MakeFont('CevicheOne-Regular.ttf','cp1258');
    $orderId = getGet('id');
    $sql = "select order_details.*,product.title,product.thumbnail from order_details left join product on product.id=order_details.product_id where order_details.order_id = $orderId" ;
    $data = executeResult($sql);
    $sql = "Select * from orders where id = $orderId";
    $orderItem=executeResult($sql,true);
    // Page header
    $pdf = new TFPDF();
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);
$pdf->AliasNbPages();

$pdf->Write(10, 'Thông tin khách hàng:');
$pdf->Ln(20);

// Customer information
  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Mã đơn hàng:', 0, 0, 'L');
  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, $orderItem['code'], 0, 1, 'L');

  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Họ và tên:', 0, 0, 'L');
  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, $orderItem['fullname'], 0, 1, 'L');

  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Email:', 0, 0, 'L');
  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, $orderItem['email'], 0, 1, 'L');

  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Điện thoại:', 0, 0, 'L');
  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, $orderItem['phone_number'], 0, 1, 'L');

  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Ngày đặt:', 0, 0, 'L');
  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, $orderItem['order_date'], 0, 1, 'L');

  $pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Địa chỉ:', 0, 0, 'L');
  $pdf->SetFont('DejaVu','',14);
$pdf->MultiCell(60, 10, $orderItem['address'], 0, 'L');

$pdf->SetFont('DejaVu','',14);
$pdf->Cell(60, 10, 'Tổng tiền đơn hàng:', 0, 0, 'L');
$pdf->SetFont('DejaVu','',14);
$pdf->MultiCell(60, 10, '$'.$orderItem['total_money'], 0, 'L');

$pdf->Ln(20);
$pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);
	$width_cell=array(5,35,80,20,30,40);
    $pdf->SetFillColor(235,236,236); 
	$pdf->Cell($width_cell[0],10,'',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Name',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Number',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Price',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Total price',1,1,'C',true); 

	$fill=false;
	$i = 0;
	foreach($data as $item){
	$pdf->Cell($width_cell[0],10,++$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$item['title'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$item['num'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,'$'.number_format($item['price']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,'$'.number_format($item['num']*$item['price']),1,1,'C',$fill);
	$fill = !$fill;

	}
    $pageWidth = $pdf->GetPageWidth();
    $pageHeight = $pdf->GetPageHeight();
    $imageWidth = 50;
    $imageX = $pageWidth - $imageWidth;
    $imageY = 0;
    $pdf->Image('https://scontent.fsgn2-5.fna.fbcdn.net/v/t39.30808-6/341075786_967364607759405_1801021798307137956_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=FnQqP6JbYvgAX-GYUDs&_nc_ht=scontent.fsgn2-5.fna&oh=00_AfB6WRzs9cEAI4RPekYh0EGVpLGQjcBdbr0wqiFFFtTHWA&oe=643A89A5', $imageX - 10 , $imageY + 30, 50, 50, 'jpg');
    $pdf->Ln(10);
	$pdf->Write(10,'Thank you for purchasing from us ');
	
    $pdf->Output();
?>