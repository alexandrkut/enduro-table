<?php

require_once "config.php";
require_once "functions.php";

if (isset($_GET['term'])){
    $return_arr = array();

$search_fio ="%{$_GET['term']}%";

$sqli = $mysqli->prepare("select id,fio,number from peoples where fio like ?");
$sqli->bind_param('s', $search_fio);
$sqli->execute();
$result = $sqli->get_result();

$results = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $results[] =  array('label' => $row['fio'], 'number' => $row['number'], 'id'=>$row['id']);
}

  }else{
  $results[] =   "nothing";
  
}
echo json_encode($results);
?>