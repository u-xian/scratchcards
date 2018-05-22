<?php
require_once('Connections/conn.php');

 if(!empty($_POST['t1']))
   {
        $a1= $_POST['t1'];
   }
 if(!empty($_POST['t2']))
    {
        $a2= $_POST['t2'];
    }

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Europe/London');

/** PHPExcel */
require_once './Classes/PHPExcel.php';


// Create new PHPExcel object
echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Active Date')
			->setCellValue('B1', 'Dealer Name')
			->setCellValue('C1', 'Denomination')
			->setCellValue('D1', 'Batch')
			->setCellValue('E1', 'Start Serialnumber')
            ->setCellValue('F1', 'End Serialnumber')
			->setCellValue('G1', 'Total Pins')
            ->setCellValue('H1', 'Total Cards');

mysql_select_db($database_conn, $conn);
$qry="select a.activdate,c.dealername,b.label,a.batch,a.start_serialnumber,a.end_serialnumber,(a.pins + 1)  as tpins, (a.pins + 1)/b.pinspercard as tcards  from cardsrequest1 a, denomination b, dealers c where a.denom_id=b.id and a.dealer_id=c.id and a.activdate between '$a1' and '$a2' order by  a.activdate,a.batch";
$result = mysql_query($qry);
$i=2; 
while($row = mysql_fetch_array($result))
 {
     
     $dt1=$row['activdate'];
	 $dt2=$row['dealername'];
	 $dt3=$row['label'];
	 $dt4=$row['batch'];
	 $dt5=$row['start_serialnumber'];
	 $dt6=$row['end_serialnumber'];
	 $dt7=$row['tpins'];
	 $dt8=$row['tcards'];
	
	
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

// Rename sheet
echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Active cards');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('./output/activecards2.xlsx');


// Echo memory peak usage
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";
?>