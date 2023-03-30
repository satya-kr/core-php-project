<?php
include("../includes/conn.php");
$sql = "UPDATE peters_documents set document_status = 0 where document_create_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
$run_sql = $conn->query($sql);
?>