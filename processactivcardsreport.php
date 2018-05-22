<?php
session_start();
require_once('Connections/conn.php');

$username=$_SESSION['username'];

 if(!empty($_POST['t1']))
   {
        $a1= $_POST['t1'];
   }
 if(!empty($_POST['t2']))
    {
        $a2= $_POST['t2'];
    }
 if(!empty($_POST['t3']))
    {
        $a3= $_POST['t3'];
    }
 
 if ($a3=="c")
	{
	  $qry="select a.creation_date,a.activation_date,concat(b.dealername,' ',d.othername) as fullname,c.label,sum(a.pins) as tpins,sum(a.cards) as tcards,(sum(a.pins) * c.pinsvalue) as amount,e.loginname from cardsrequest1 a, dealers b,denomination c, activationno d, logins e where a.dealer_id=b.id and a.denom_id =c.id and a.act_id=d.id and a.user_id=e.id and a.creation_date between '$a1' and '$a2' and d.confirmation=1 and d.finconfirm=1 and a.status=1 group by a.creation_date,a.act_id,a.dealer_id,a.denom_id,a.activation_date";
      $date_type="created";	  
	}
 else if ($a3=="a")
	{
	  $qry="select a.creation_date,a.activation_date,concat(b.dealername,' ',d.othername) as fullname,c.label,sum(a.pins) as tpins,sum(a.cards) as tcards,(sum(a.pins) * c.pinsvalue) as amount,e.loginname from cardsrequest1 a, dealers b,denomination c, activationno d, logins e where a.dealer_id=b.id and a.denom_id =c.id and a.act_id=d.id and a.user_id=e.id and a.activation_date between '$a1' and '$a2' and d.confirmation=1 and d.finconfirm=1 and d.billingconfirm=1  and a.status=1 group by a.creation_date,a.act_id,a.dealer_id,a.denom_id,a.activation_date";
      $date_type="activated";	
	}
   else
   {
     echo "Not found";
   }


/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Europe/London');

/** PHPExcel */
require_once './Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Creation Date')
			->setCellValue('B1', 'Activation Date')
            ->setCellValue('C1', 'Dealer Name')
            ->setCellValue('D1', 'Label')
			->setCellValue('E1', 'Total Pins')
			->setCellValue('F1', 'Total Cards')
            ->setCellValue('G1', 'Amount')
			->setCellValue('H1', 'Login Name');

mysql_select_db($database_conn, $conn);
//$qry="select a.creation_date,a.activation_date,concat(b.dealername,' ',d.othername) as fullname,c.label,sum(a.pins) as tpins,sum(a.cards) as tcards,(sum(a.pins) * c.pinsvalue) as amount,e.loginname from cardsrequest1 a, dealers b,denomination c, activationno d, logins e where a.dealer_id=b.id and a.denom_id =c.id and a.act_id=d.id and a.user_id=e.id and ."$field_name". between '$a1' and '$a2' and d.confirmation=1 and d.finconfirm=1 and d.billingconfirm=1  group by a.creation_date,a.act_id,a.dealer_id,a.denom_id,a.activation_date";
$result = mysql_query($qry);
$i=2; 
while($row = mysql_fetch_array($result))
 {
     
     $dt1=$row['creation_date'];
	 $dt2=$row['activation_date'];
	 $dt3=$row['fullname'];
	 $dt4=$row['label'];
	 $dt5=$row['tpins'];
	 $dt6=$row['tcards'];
	 $dt7=$row['amount'];
	 $dt8=$row['loginname'];
	
	
	// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $dt1)
			->setCellValue('B'.$i, $dt2)
			->setCellValue('C'.$i, $dt3)
			->setCellValue('D'.$i, $dt4)
			->setCellValue('E'.$i, $dt5)
            ->setCellValue('F'.$i, $dt6)
			->setCellValue('G'.$i, $dt7)
			->setCellValue('H'.$i, $dt8);
	$i=$i+1;
 }			

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$filename="./output/report_".$username.".xlsx";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filename);

?>