<?php

namespace Controllers;

use FPFP\FPDF;
use Models\User;
use Models\Order;
use Exception;
/*call the FPDF library*/

require('../vendor/fpdf184/fpdf.php');
require_once("../vendor/phpqrcode/qrlib.php");

class InvoiceController {

    public function index()
    {


//session_start();


/*A4 width : 219mm*/

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial', 'B', 20);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(59, 5, 'Invoice', 0, 0);
$pdf->Cell(59, 10, '', 0, 1);

$pdf->Image('../views/images/logo3.PNG',10,10,-300);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71, 5, 'Haarlem Festival', 0, 0);
$pdf->Cell(59, 5, '', 0, 0);
$pdf->Cell(59, 5, 'Details', 0, 1);

$pdf->SetFont('Arial', '', 10);

$user1 = $_SESSION['user'];
$order1 = $_SESSION['order'];


$pdf->Cell(130, 5, 'Haarlem', 0, 0);
$pdf->Cell(25, 5, 'Customer ID:', 0, 0);
$pdf->Cell(34, 5, $user1->getUserID(), 0, 1);






$pdf->Cell(25, 5, 'Invoice Date:', 0, 0);
$pdf->Cell(34, 5, $order1->getOrderDate(), 0, 1);

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Invoice No:', 0, 0);
$pdf->Cell(34, 5, $order1->getOrderID(), 0, 1);


$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(130, 5, 'Bill To:   ' . $user1->getFirstName() . " " . $user1->getLastName(), 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(189, 10, '', 0, 1);



$pdf->Cell(50, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
/*Heading Of the table*/
$pdf->Cell(10, 6, 'N', 1, 0, 'C');
$pdf->Cell(80, 6, 'Description', 1, 0, 'C');
$pdf->Cell(23, 6, 'Qty', 1, 0, 'C');
$pdf->Cell(30, 6, 'Unit Price', 1, 0, 'C');
$pdf->Cell(20, 6, 'Sales Tax', 1, 0, 'C');
$pdf->Cell(25, 6, 'Total', 1, 1, 'C');
/*Heading Of the table end*/
$pdf->SetFont('Arial', '', 10);
$i = 1;
foreach ($_SESSION["orderItems"] as $cartItem) {

	$pdf->Cell(10, 6, $i, 1, 0);
	$pdf->Cell(80, 6, $cartItem["eventName"], 1, 0);
	$pdf->Cell(23, 6, $cartItem["quantity"], 1, 0, 'R');
	$pdf->Cell(30, 6, chr(128) . ' ' . number_format($cartItem["price"], 2, ',', '.'), 1, 0, 'R');
	$pdf->Cell(20, 6, '% ' . $cartItem['VAT'], 1, 0, 'R');
	$pdf->Cell(25, 6, chr(128) . ' ' . number_format($order1->getTotalPrice(), 2, ',', '.'), 1, 1, 'R');

	$i++;
}



$pdf->Cell(118, 6, '', 0, 0);
$pdf->Cell(25, 6, 'total', 0, 0);
$pdf->Cell(45, 6, chr(128). ' ' . number_format($order1->getTotalPrice(), 2, ',', '.'), 1, 1, 'R');


// ------------------ QR CODE --------------//

//Add QR code

QRcode::png($order1->getOrderID(), 'QRcode.png');

$pdf->Image("QRcode.png", 20, 190, 50, 50);


$file = $pdf->Output('S', "invoice/{$order1->getOrderID()}.pdf",  false);

require_once 'mailer.php';


try {
	//Recipients
	$mail->setFrom('hfgroup2a@gmail.com', 'Haarlem festival');
	$mail->addAddress($user1->getEmail());               //Name is optional
	$mail->addAddress('malsalmy@yahoo.com');

	//Attachments
	$mail->addAttachment($file);         //Add attachments
	$mail->addStringAttachment($file, "invoice.pdf");

	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'Invoice';
	$mail->Body    = "Thank you for your purchase {$user1->getFirstName()}  {$user1->getLastName()}!<br><br>

	Please see attached for Haarlem festival invoice, due on {$order1->getOrderDate()}. Do not hesitate to reach out if you have any questions.<br> <br>
	
	Kind Regards,<br><br>
	The Haarlem festival sales team";
	$mail->AltBody = 'Here is your invoice';
	$mail->send();
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    }
}