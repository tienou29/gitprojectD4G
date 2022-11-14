<?php

$redis = new Redis();
//Connecting to Redis
$redis->connect('redis-14012.c2.eu-west-1-3.ec2.cloud.redislabs.com', 14012);
$redis->auth('0t4Hg0ju4ZcmzP8hRmGIENEBR5G6QnFX');

//Cookie part
//array to string
$value = $_COOKIE["panier"];
$monArrayTri=explode('/',$value);
//Longueur du Cookie
$lengthArray=count($monArrayTri);


//Appel de la librairie
require('fpdf185/fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// GFG logo image
		$this->Image('header.png', 30, 8, 20);

		// GFG logo image
		$this->Image('header.png', 160, 8, 20);
		// Set font-family and font-size
		$this->SetFont('Times','B',20);
		// Move to the right
		$this->Cell(80);
		// Set the title of pages.
		$this->Cell(30, 20, 'Your Green Basket', 0, 2, 'C');
		// Break line with given space
		$this->Ln(5);
	}
	// Page footer
	function Footer()
	{
		$this->Cell(160);

		$this->Cell(30,20, 'Made by Madeleine',0,2,'n');
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Set font-family and font-size of footer.
		$this->SetFont('Arial', 'I', 8);
		// set page number
		$this->Cell(0, 10, 'Page ' . $this->PageNo() .
		'/{nb}', 0, 0, 'C');
	}
}



// Create new object.
$pdf = new PDF();
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();

// Set font-family and font-size.
$pdf->SetFont('Times','',12);
$position_detail = 60;
//Requête des données
for ($i = 0; $i < count($monArrayTri); $i++) {
	$r1= $redis->hget($monArrayTri[$i], "id-base");
	$r2= $redis->hget($monArrayTri[$i], "famille origine");
	$r3= $redis->hget($monArrayTri[$i], "planet");
	$r4= $redis->hget($monArrayTri[$i], "people");
	$r5= $redis->hget($monArrayTri[$i], "prosperity");
	$r6= $redis->hget($monArrayTri[$i], "criteres");
	$r7= $redis->hget($monArrayTri[$i], "test 1.1.1");
	//affichage de chaque info

	$pdf->MultiCell(190,10,"ID-base: ".utf8_decode($r1),'1','C',0);
	$pdf->MultiCell(190,10,"Famille origine: ".utf8_decode($r2),'LRB','L',0);
	$pdf->MultiCell(190,10,"Planet: ".utf8_decode($r3),'LRB','T',0);
	$pdf->MultiCell(190,10,"People: ".utf8_decode($r4),'LRB','L',0);
	$pdf->MultiCell(190,10,"Prosperity: ".utf8_decode($r5),'LRB','L',0);
	$pdf->MultiCell(190,10,"Criteres: ".utf8_decode($r6),'LRB','L',0);
	$pdf->MultiCell(190,10,"Realisation: ".utf8_decode($r7),'LRB','L',0);
	$pdf->MultiCell(190,10,"",0,'L',0);


}

$pdf->Output();

?>
