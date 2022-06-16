<?php

/*call the FPDF library*/

namespace Controllers;

use DateTime;
use FPDF\FPDF;
use QRCODE;
use Exception;
use Models\Order;
use Models\User;

$QR_BASEDIR = dirname(__FILE__) . DIRECTORY_SEPARATOR;

// Required libs

include $QR_BASEDIR . "../vendor/phpqrcode/qrconst.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrconfig.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrtools.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrspec.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrimage.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrinput.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrbitstream.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrsplit.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrrscode.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrmask.php";
include $QR_BASEDIR . "../vendor/phpqrcode/qrencode.php";


// require('../vendor/fpdf184/fpdf.php');
//require_once("../vendor/phpqrcode/qrlib.php");

class InvoiceController
{

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

		//$pdf->Image('../views/images/logo3.PNG', 10, 10, -300);
		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(71, 5, 'Haarlem Festival', 0, 0);
		$pdf->Cell(59, 5, '', 0, 0);
		$pdf->Cell(59, 5, 'Details', 0, 1);

		$pdf->SetFont('Arial', '', 10);

		$user = $_SESSION['user'];
		$orderID = $_SESSION['orderID'];
		$date = date_create()->format('Y-m-d H:i:s');


		$pdf->Cell(130, 5, 'Haarlem', 0, 0);
		$pdf->Cell(25, 5, 'Customer ID:', 0, 0);
		$pdf->Cell(34, 5, $user->userID, 0, 1);



		$pdf->Cell(25, 5, 'Invoice Date:', 0, 0);
		$pdf->Cell(34, 5, $date, 0, 1);

		$pdf->Cell(130, 5, '', 0, 0);
		$pdf->Cell(25, 5, 'Invoice No:', 0, 0);
		$pdf->Cell(34, 5, $orderID, 0, 1);


		$pdf->SetFont('Arial', 'B', 15);
		$pdf->Cell(130, 5, 'Bill To:   ' . $user->firstName . " " . $user->lastName, 0, 0);
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

		foreach ($_SESSION["reservations"] as $events => $values) {
			if ("Food" == $values['type']) {
				$pdf->Cell(10, 6, $i, 1, 0);
				$pdf->Cell(80, 6, "Food", 1, 0);
				$pdf->Cell(23, 6, $events["quantity"], 1, 0, 'R');
				$pdf->Cell(30, 6, chr(128) . ' ' . number_format($events["totalPrice"], 2, ',', '.'), 1, 0, 'R');
				$pdf->Cell(20, 6, '% ' . 0.21, 1, 0, 'R');

			}
			else if ("Dance" == $values['type']) {
				$pdf->Cell(10, 6, $i, 1, 0);
				$pdf->Cell(80, 6, "Dance", 1, 0);
				$pdf->Cell(23, 6, $events["amount"], 1, 0, 'R');
				$pdf->Cell(30, 6, chr(128) . ' ' . number_format($events["totalPrice"], 2, ',', '.'), 1, 0, 'R');
				$pdf->Cell(20, 6, '% ' . 0.21, 1, 0, 'R');
			}

			$i++;

			$pdf->Cell(25, 6, chr(128) . ' ' . number_format($_SESSION['totalAmount'], 2, ',', '.'), 1, 1, 'R');


			$pdf->Cell(118, 6, '', 0, 0);
			$pdf->Cell(25, 6, 'total', 0, 0);
			$pdf->Cell(45, 6, chr(128) . ' ' . number_format($_SESSION['totalAmount'], 2, ',', '.'), 1, 1, 'R');


			// ------------------ QR CODE --------------//

			//Add QR code

			QRcode::png(20, 'QRcode.png');

			$pdf->Image("QRcode.png", 20, 190, 50, 50);


			$file = $pdf->Output('S', "invoice/{$orderID}.pdf",  false);
			$pdf->output();

			require_once 'mailercontroller.php';


			try {
				//Recipients
				$mail->setFrom('hfgroup2a@gmail.com', 'Haarlem festival');
				$mail->addAddress('659495@student.inholland.nl');               //Name is optional
				$mail->addAddress('alex.arkhipov.7590@gmail.com');

				//Attachments
				$mail->addAttachment($file);         //Add attachments
				$mail->addStringAttachment($file, "invoice.pdf");

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Invoice';
				$mail->Body    = "Thank you for your purchase {$user->firstName}  {$user->lastName}!<br><br>

	Please see attached for Haarlem festival invoice, due on {$now}. Do not hesitate to reach out if you have any questions.<br> <br>
	
	Kind Regards,<br><br>
	The Haarlem Festival team";
				$mail->AltBody = 'Hereby, your invoice:';
				$mail->send();
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
}
