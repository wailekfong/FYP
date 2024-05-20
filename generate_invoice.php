<?php
require ('fpdf184/fpdf.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'fyp');

//get invoices data
$query = mysqli_query($con,"SELECT * FROM orders o 
	INNER JOIN users u ON o.user_id = u.user_id
	where
 order_id = '".$_GET['id']."'");

 $orders = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
 $pdf->Image('Picture/logo.png',0,0,20);// logo of your company


$pdf->Cell(130	,10,'',0,0);

$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

  $pdf->Ln();

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);



$pdf->Cell(130	,5,'No.3,Jalan Abdullah 8, KUALA LUMPUR',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,$orders['order_id'],0,1);//end of line


$pdf->Cell(130	,5,'Phone +611 755 7437',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34 ,5,$orders['created_date'],0,1);//end of line


$pdf->Cell(130	,5,'Fax +607 755 1122',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,$orders['user_id'],0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Ship to',0,1);//end of line

$query= mysqli_query($con,"select * from orders where order_id = '8'");

if(isset($_GET['order_id']))
{
	$id = $_GET['order_id'];
	$query= "select * from orders where id = '$id'";
	$result = $con->prepare($query);
	$result->execute();
	if($result->rowCount()!=0)
	{
		while($orders=mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$orders['shipping_address'],0,0);
	$pdf->Cell(189	,10,'',0,1);//end of line

	$pdf->Cell(90	,5,$orders['postal_code']." ".$orders['city']." ".$orders['state'],0,1);

	}
	
	}
	
}


//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90 ,5,$orders['User_First_Name'].$orders['User_Last_Name'],0,1);
$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(90	,5,$orders['company'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$orders['shipping_address'],0,1);


$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$orders['postal_code'],0,1);
//$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,'dwad',0,1);
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$orders['city'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$orders['state'],0,1);


$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$order['phone'],0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Qty',1,0);

$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con,"select * from order_item oi INNER JOIN products p ON p.product_id = oi.product_id where oi.order_id= '".$orders['order_id']."'");
$tax = 12; //total tax
$amount = 0; //total amount




//display the items
while($item = mysqli_fetch_array($query)){
	$amount += $item['item_quantity']*$item['product_price'];
	$pdf->Cell(130	,5,$item['product_name'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format($item['item_quantity']),1,0);
	$pdf->Cell(34	,5,number_format($item['item_quantity']*$item['product_price'],2),1,1,'R');//end of line
	//accumulate tax and amount
	//$amount += $item['amount'];
}





//summary



/*$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Taxable',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($tax),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'10%',1,1,'R');//end of line*/



$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total',0,0);
$pdf->Cell(4	,5,'RM',0,0);
$pdf->Cell(30	,5,number_format($amount,2),0,1,'R');//end of line
//$pdf->Cell(4	,5,'RM',border,0);
















ob_end_clean();
$pdf->Output();

?>
<!--error_reporting(0)
