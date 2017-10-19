<?php
include "header.php";
require_once "config.php";
require_once "functions.php";


function add_people ($fio,$number){
print "add - ".$fio.", ".$number."\n";
global $mysqli;
$sqli = $mysqli->prepare("insert into peoples (number,fio) values(?,?) ");
$sqli->bind_param('is', $number,$fio);
$sqli->execute();  


}



$data = array();
if (($handle = fopen("peoples.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    
        $num = count($data);
        for ($c=0; $c < 0; $c++) {
            $data[] = $data[$c];
        }
        
        add_people ($data[0],$data[1]);
        }
    fclose($handle);
}
?>