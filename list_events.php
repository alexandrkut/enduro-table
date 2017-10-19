 <?php
require_once "config.php";
require_once "functions.php";


?>


<table border="1" class="center">
      <caption><h3>События</h3></caption>
         <tr>
    <th>Дата</th>
    <th>Название</th>
    <th>Место</th>
    <th>Описание</th>
    <th>Кол-во уч.</th>
    </tr>

<?php


$sql = 'select id,title,date,place,description from events order by date';
$result = $mysqli->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){

$sql1 = 'select count(id) as cnt from results where event = '.$row[id].';';
$result1 = $mysqli->query($sql1);
$cnt = $result1->fetch_array(MYSQLI_ASSOC)[cnt];



echo '<tr>';
echo '<td>';
if ($_GET["edit"] == "1"){
echo '<a href="edit_events.php?id='.$row["id"].'">редактировать</a>&ensp;';
}
echo '<a href="event.php?event='.$row["id"].'">'.$row["date"].'</a></td>';
echo '<td>'.safe_str($row["title"]).'</td>';
echo '<td>'.safe_str($row["place"]).'</td>';
echo '<td>'.safe_str($row["description"]).'</td>';
echo '<td>'.safe_str($cnt).'</td>';
echo '</tr>';
}
  

?>
</table>