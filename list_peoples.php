 <?php
require_once "config.php";
require_once "functions.php";
?>

<table border="1">
      <caption><h3>Спортсмены</h3></caption>
         <tr>
    <th>Номер</th>
    <th>ФИО</th>
    <th>Дата рождения</th>
    <th>Место</th>
    <th>Мотоцикл</th>
    <th>Описание</th>
    </tr>

<?php

$sql = 'select id,number,fio,date,place,moto,description from peoples order by fio';
$result = $mysqli->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){

echo '<tr>';
echo '<td>';
if ($_GET["edit"] == "1"){
echo '<a href="edit_peoples.php?id='.$row["id"].'">редактировать</a>&ensp;';
}
echo $row[number].'</td>';
echo '<td>'.safe_str($row[fio]).'</td>';
echo '<td>'.$row[date].'</td>';
echo '<td>'.safe_str($row[place]).'</td>';
echo '<td>'.safe_str($row[moto]).'</td>';
echo '<td>'.safe_str($row[description]).'</td>';
echo '</tr>';
}
?>
</table>
