<?php 

include 'class_convert.php';

$fileName = 'Result.csv';
 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header('Content-Description: File Transfer');
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename={$fileName}");
header("Expires: 0");
header("Pragma: public");


$Convert = new Convert('data');


$Convert->sortByKey();


$fh = @fopen( 'php://output', 'w' );

foreach ($Convert->data as $data) {
	$tem = array();
	$tem[0] = $data['name'];
	$tem[1] = $data['code'];
    fputcsv($fh, $tem);
}

fclose($fh);



?>