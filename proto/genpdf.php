<?php
// reference the Dompdf namespace
use Dompdf\Dompdf;


// include autoloader
require_once 'dompdf/autoload.inc.php';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('<b>hello world</b>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("dlcefichiersalope");
