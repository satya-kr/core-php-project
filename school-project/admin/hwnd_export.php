<?php
include("../includes/conn.php");

//$sql_query = "SELECT name, gender, address, designation, age FROM developers LIMIT 10";
$class_name = $_REQUEST['class_name'];
$section_name = $_REQUEST['section_name'];

$sql_class = "select * from peters_class_name where class_id=".$class_name."";
$query_class = mysqli_query( $conn, $sql_class );
$data_class = mysqli_fetch_assoc( $query_class );

$sql_query = "SELECT class_name, class_create_date FROM peters_class_name where class_id =1 LIMIT 10";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	
if(isset($_POST["export_data"])) {	
	$filename = ucfirst($data_class['class_name']).'-'.$section_name.'-'.date('d-m-Y') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
 
}
 header( "location:export_to_excel.php" );





?>