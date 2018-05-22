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
	
	     
         $result1 = mysql_query("select a.denom_id,sum(pins) + ((count(`start_serialnumber`) + count(`end_serialnumber`)) / 2 )  as tpins,(sum(a.pins) + ((count(a.start_serialnumber) + count(a.end_serialnumber)) / 2 )) / b.pinspercard   as tcards from `cardsrequest1` a, `denomination` b where a.act_id='$id'  and a.denom_id=b.id and a.denom_id=1 group by a.denom_id");
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
		 $result1 = mysql_query("select a.denom_id,sum(pins) + ((count(`start_serialnumber`) + count(`end_serialnumber`)) / 2 )  as tpins,(sum(a.pins) + ((count(a.start_serialnumber) + count(a.end_serialnumber)) / 2 )) / b.pinspercard   as tcards from `cardsrequest1` a, `denomination` b where a.act_id='$id'  and a.denom_id=b.id and a.denom_id=2 group by a.denom_id");
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
    $result1 = mysql_query("select a.denom_id,sum(pins) + ((count(`start_serialnumber`) + count(`end_serialnumber`)) / 2 )  as tpins,(sum(a.pins) + ((count(a.start_serialnumber) + count(a.end_serialnumber)) / 2 )) / b.pinspercard   as tcards from `cardsrequest1` a, `denomination` b where a.act_id='$id'  and a.denom_id=b.id and a.denom_id=3 group by a.denom_id");
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
         $result1 = mysql_query("select a.denom_id,sum(pins) + ((count(`start_serialnumber`) + count(`end_serialnumber`)) / 2 )  as tpins,(sum(a.pins) + ((count(a.start_serialnumber) + count(a.end_serialnumber)) / 2 )) / b.pinspercard   as tcards from `cardsrequest1` a, `denomination` b where a.act_id='$id'  and a.denom_id=b.id and a.denom_id=4 group by a.denom_id");
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
    $result1 = mysql_query("select a.denom_id,sum(pins) + ((count(`start_serialnumber`) + count(`end_serialnumber`)) / 2 )  as tpins,(sum(a.pins) + ((count(a.start_serialnumber) + count(a.end_serialnumber)) / 2 )) / b.pinspercard   as tcards from `cardsrequest1` a, `denomination` b where a.act_id='$id'  and a.denom_id=b.id and a.denom_id=5 group by a.denom_id");
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
	$result1 = mysql_query("select a.denom_id,sum(pins) + ((count(`start_serialnumber`) + count(`end_serialnumber`)) / 2 )  as tpins,(sum(a.pins) + ((count(a.start_serialnumber) + count(a.end_serialnumber)) / 2 )) / b.pinspercard   as tcards from `cardsrequest1` a, `denomination` b where a.act_id='$id'  and a.denom_id=b.id and a.denom_id=6 group by a.denom_id");
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
  $result3 = mysql_query("select a.actdate,a.acttime,a.actno,b.dealername from activationno a, dealers b where a.dealerid=b.id and a.id='$id'");
  while($row3 = mysql_fetch_array($result3))
  {
    $y1=$row3['dealername'];
	$y2=$row3['actdate'];
	$y3=$row3['acttime'];
    $y4=$row3['actno'];
  }	
  $this->Image('./image/logo.png',10,8,30);
  $this->ln(10);
  $this->SetFont('Arial','B',14);
  $this->Cell(100);
  $this->Cell(55,10,'Card Activation Form',1,1,'C');
  $this->Ln(7);
  $this->SetFillColor(200,220,255);
  $this->Cell(0,1,"",0,1,'L',true);
  $this->SetFont('Arial','B',10);
  $this->SetXY(15,40);
  $this->Cell(75,5,'Dealer :  ' .$y1,0,1,'L');
  $this->SetXY(95,40);
  $this->Cell(75,5,'Date :  ' .$y2.' '.$y3,0,1,'L');
  $this->SetXY(175,40);
  $this->Cell(75,5,'Activation No :  '.$y4,0,1,'L');
  $this->Ln(2);
  $this->SetFillColor(200,220,255);
  $this->Cell(0,1,"",0,1,'L',true);
}

}

$pdf=new PDF('L','mm','A4');
//Column titles
$header=array('Batch','Start Serial No','End Serial No');
//$id ="184";
$act_no=$_POST['t1'];
$result = mysql_query("select id from activationno where actno='$act_no'");
while($row = mysql_fetch_array($result))
 {
    $id=$row['id'];
 }

$filename='./output/'.$act_no.'.pdf';			  
//Data loading
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->Table_head($id);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(10,50);
$pdf->Table_300($header,$id);
$pdf->SetXY(90,50);
$pdf->Table_500($header,$id);
$pdf->SetXY(170,50);
$pdf->Table_1000($header,$id);
$pdf->SetXY(10,100);
$pdf->Table_2000($header,$id);
$pdf->SetXY(90,100);
$pdf->Table_5000($header,$id);
$pdf->SetXY(170,100);
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
$pdf->Cell(50,30,'Checked by:	ALPHA BUNDU',0,'L');
$pdf->SetXY(220,150);
$pdf->Cell(50,30,'Activated by:	CHRISTIAN UWAKRISTU',0,'L');
$pdf->Output($filename,'F');
?>

