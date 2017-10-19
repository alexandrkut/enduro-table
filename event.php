
<?php
include "header.php";
require_once "config.php";
require_once "functions.php";
$event_id = htmlspecialchars($_GET["event"]);
?>
<div>
<a href="index.php">Назад</a>
<hr>
</div>



<?php

$sql = 'select date,title, description from events where id ='.$event_id.';';
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "<h3>".$row[title]."</h3>";
echo "Дата проведения: <b>".$row[date]."<br></b>";
echo "Описание: <b>".$row[description]."</b><br>";


echo '<a href="results.php?event='.$event_id.'">Добавить людей в гонку</a>'; 
?>    
      
<h3 class="center">Зарегистрированные люди</h3>
 <table border="1" >
   
         <tr>   
         <th>Номер</th>
    <th>ФИО</th>
    <th>Спорт</th>
    <th>Место</th>

    </tr>

<?php

$sql = 'select peoples.fio as fio, peoples.number as number, results.result as result, peoples.id as id, results.class as sclass from results,peoples,events where results.people=peoples.id and results.event=events.id and event ='.$event_id.' order by class DESC, fio, result ;';
$result = $mysqli->query($sql);
if ( $result != ""){ 
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
echo '<tr>';
echo '<td>'.$row[number].'</td>';
echo '<td>'.$row[fio].'</td>';
echo '<td>'.$row[sclass].'</td>';
echo '<td>'.$row[result].'</td>';
echo '</tr>';
}            
  
}

?>
</table>

