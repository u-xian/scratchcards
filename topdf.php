<?php 
require_once('./Connections/conn.php');
mysql_select_db($database_conn, $conn);
require './fpdf17/fpdf.php';

class PDF extends FPDF
{
//Better table



function Table_300($header,$id)
{
    //Column widths
    $w=array(25,25,25);
    //Header
	$this->Cell($w[0],5,'','TBL');
    $this->Cell($w[1],5,'300 RWF','TB');
	$this->Cell($w[1],5,'','TBR');
	$this->Ln();
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Data
     $result = mysql_query("select batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=1 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
        $this->Cell($w[0],5,$row['batch'],'LR');
        $this->Cell($w[1],5,$row['start_serialnumber'],'LR');
        $this->Cell($w[2],5,$row['end_serialnumber'],'LR');
        $this->Ln();
        }
	
	     
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=1");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }
	$this->Cell(25,5,'Total Pins:'.$t1,'TBL');
    $this->Cell(15,5,'','TB');
	$this->Cell(35,5,'Total cards:'.$t2,'TBR');
}
function Table_500($header,$id)
{
    //Column widths
    $w=array(25,25,25);
    //Header
	$this->Cell($w[0],5,'','TBL');
    $this->Cell($w[1],5,'500 RWF','TB');
	$this->Cell($w[1],5,'','TBR');
	$this->Ln();
	$this->Cell(80);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Data
	
     $result = mysql_query("select batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=2 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		$this->Cell(80);
        $this->Cell($w[0],5,$row['batch'],'LR');
        $this->Cell($w[1],5,$row['start_serialnumber'],'LR');
        $this->Cell($w[2],5,$row['end_serialnumber'],'LR');
        $this->Ln();
        }
		 $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=2");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }
	$this->Cell(80);
	$this->Cell(25,5,'Total Pins:'.$t1,'TBL');
    $this->Cell(15,5,'','TB');
	$this->Cell(35,5,'Total cards:'.$t2,'TBR');
}

function Table_1000($header,$id)
{
    //Column widths
    $w=array(25,25,25);
    //Header
	$this->Cell($w[0],5,'','TBL');
    $this->Cell($w[1],5,'1000 RWF','TB');
	$this->Cell($w[1],5,'','TBR');
	$this->Ln();
	$this->Cell(160);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Data
     $result = mysql_query("select batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=3 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		$this->Cell(160);
        $this->Cell($w[0],5,$row['batch'],'LR');
        $this->Cell($w[1],5,$row['start_serialnumber'],'LR');
        $this->Cell($w[2],5,$row['end_serialnumber'],'LR');
        $this->Ln();
        }
    $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=3");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }
	$this->Cell(160);
	$this->Cell(25,5,'Total Pins:'.$t1,'TBL');
    $this->Cell(15,5,'','TB');
	$this->Cell(35,5,'Total cards:'.$t2,'TBR');
}

function Table_2000($header,$id)
{
    //Column widths
    $w=array(25,25,25);
    //Header
	$this->Cell($w[0],5,'','TBL');
    $this->Cell($w[1],5,'2000 RWF','TB');
	$this->Cell($w[1],5,'','TBR');
	$this->Ln();
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Data
     $result = mysql_query("select batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=4 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
          $this->Cell($w[0],5,$row['batch'],'LR');
          $this->Cell($w[1],5,$row['start_serialnumber'],'LR');
          $this->Cell($w[2],5,$row['end_serialnumber'],'LR');
          $this->Ln();
        }	
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=4");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }
	$this->Cell(25,5,'Total Pins:'.$t1,'TBL');
    $this->Cell(15,5,'','TB');
	$this->Cell(35,5,'Total cards:'.$t2,'TBR');
}

function Table_5000($header,$id)
{
    //Column widths
    $w=array(25,25,25);
    //Header
	$this->Cell($w[0],5,'','TBL');
    $this->Cell($w[1],5,'5000 RWF','TB');
	$this->Cell($w[1],5,'','TBR');
	$this->Ln();
	$this->Cell(80);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],'LRB','C');
    $this->Ln();
    //Data
	$result = mysql_query("select batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=5 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $this->Cell(80);
          $this->Cell($w[0],5,$row['batch'],'LR');
          $this->Cell($w[1],5,$row['start_serialnumber'],'LR');
          $this->Cell($w[2],5,$row['end_serialnumber'],'LR');
          $this->Ln();
        }
    $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=5");
    while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }		
    $this->Cell(80);
	$this->Cell(25,5,'Total Pins:'.$t1,'TBL');
    $this->Cell(15,5,'','TB');
	$this->Cell(35,5,'Total cards:'.$t2,'TBR');
}
function Table_10000($header,$id)
{
    //Column widths
    $w=array(25,25,25);
    //Header
	$this->Cell($w[0],5,'','TBL');
    $this->Cell($w[1],5,'10000 RWF','TB');
	$this->Cell($w[1],5,'','TBR');
	$this->Ln();
	$this->Cell(160);
   for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],'LRB','C');
    $this->Ln();
    //Data
	$result = mysql_query("select batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=6 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $this->Cell(160);
          $this->Cell($w[0],5,$row['batch'],'LR');
          $this->Cell($w[1],5,$row['start_serialnumber'],'LR');
          $this->Cell($w[2],5,$row['end_serialnumber'],'LR');
          $this->Ln();
        }
	$result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=6");
    while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }		
	$this->Cell(160);
	$this->Cell(25,5,'Total Pins:'.$t1,'TBL');
    $this->Cell(15,5,'','TB');
	$this->Cell(35,5,'Total cards:'.$t2,'TBR');
}

function Table_head($id)
{
  $result3 = mysql_query("select a.creation_date,a.creation_time,a.actno,b.dealername,a.othername from activationno a, dealers b where a.dealerid=b.id and a.id='$id'");
  while($row3 = mysql_fetch_array($result3))
  {
    $y1=$row3['dealername'];
	$y2=$row3['creation_date'];
	$y3=$row3['creation_time'];
    $y4=$row3['actno'];
	$y5=$row3['othername'];
  }	
  $yname=$y1.'  '.$y5;
  $this->Image('./style/logo.png',15,8);
  $this->SetFont('Arial','B',10);
  $this->ln(10);
  $this->SetFont('Arial','B',10);
  $this->SetXY(45,8);
  $this->MultiCell(45,10,'Bill and Collect for Sales SOX Procedure # : P18 Control No : IC24',0);
  $this->SetFont('Arial','',10);
  $this->SetXY(105,5);
  $this->MultiCell(150,5,'IC24: Take approval  for scratch card activation (prior to the actual activation)','TLRB','L');
  $this->SetXY(105,10);
  $this->MultiCell(150,10,'There is a proper management approval for activation of PIN(s) in the prepaid platform.The Warehouse Manager is responsible for informing the Billing Manager.','TLRB','L');
  $this->SetXY(105,30);
  $this->MultiCell(150,5,'Frequency :  Before scratch cards are activated    |    Responsible :  Warehouse Manager','TLRB','L');
  $this->Ln(10);
  $this->SetXY(10,45);
  $this->SetFillColor(200,220,255);
  $this->Cell(0,1,"",0,1,'L',true);
  $this->SetFont('Arial','B',10);
  $this->SetXY(10,50);
  $this->Cell(75,5,'Dealer :  ' .$yname,0,1,'L');
  $this->SetXY(130,50);
  $this->Cell(75,5,'Date :  ' .$y2.' '.$y3,0,1,'L');
  $this->SetXY(225,50);
  $this->Cell(75,5,'Activation No :  '.$y4,0,1,'L');
  $this->Ln(2);
  $this->SetFillColor(200,220,255);
  $this->Cell(0,1,"",0,1,'L',true);
}

}

$pdf=new PDF('L','mm','A4');
//Column titles
$header=array('Batch','Start Serial No','End Serial No');
//$id ="37";
$id=$_GET['id2'];
$result4 = mysql_query("select actno  from activationno where id='$id'");
  while($row4 = mysql_fetch_array($result4))
  {
    $z4=$row4['actno'];
	$filename=$z4.".pdf";
  }	
//Data loading
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->Table_head($id);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(10,60);
$pdf->Table_300($header,$id);
$pdf->SetXY(90,60);
$pdf->Table_500($header,$id);
$pdf->SetXY(170,60);
$pdf->Table_1000($header,$id);
$pdf->SetXY(10,110);
$pdf->Table_2000($header,$id);
$pdf->SetXY(90,110);
$pdf->Table_5000($header,$id);
$pdf->SetXY(170,110);
$pdf->Table_10000($header,$id);
$pdf->Ln(45);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0,1,"",0,1,'L',true);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10,150);
$pdf->Cell(50,30,'Originator:	SAMUEL COUSIN UWIZEYIMANA',0,'L');
$pdf->SetXY(90,150);
$pdf->Cell(50,30,'Authorized by:	PHILIP AMOATENG',0,'L');
$pdf->SetXY(150,150);
$pdf->Cell(50,30,'Checked by:	ALAIN GILBERT NSENGIYUMVA',0,'L');
$pdf->SetXY(220,150);
$pdf->Cell(50,30,'Activated by:	CHRISTIAN UWAKRISTU',0,'L');
$pdf->Output($filename,I);
?>

