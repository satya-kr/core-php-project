<?php
include_once "config/Core.php";

$database = new Database();
$db = $database->getConn();
$corex = new Core($db);

// echo $corex->read("testox");
$stmt = $corex->read("testox");
// print_r($stmt);

    while ($row = $stmt->fetch_array(MYSQLI_BOTH)) {
        // extract($row_category);
        echo $row[0]." - ".$row[1]."<br>";
    }

$data = $corex->readSingle('testox', 2);

$row = $data->fetch_array(MYSQLI_BOTH);

echo "<br>".$row['id']." - ". $row['name'];

$num_row = $corex->numrow("testox");
echo "<br> Number Of rows In table : ".$num_row;
// echo "<br>";
// print_r($corex->where_in('name','Aks','id'));
