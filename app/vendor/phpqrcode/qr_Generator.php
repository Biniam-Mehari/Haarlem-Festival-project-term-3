<?php
//require_once("phpqrcode/qrlib.php");
require_once("qrlib.php");

//QRcode::png($_GET['code']); // get the data to store in QR code

QRcode::png('https://b683-143-176-204-165.ngrok.io/HFPROJECT-group2-V1/app/public/views/homepage.php'); 