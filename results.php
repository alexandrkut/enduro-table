
<?php
include "header.php";

require_once "config.php";
require_once "functions.php";
$event_id = htmlspecialchars($_GET["event"]);

function add_people_to_event ($event,$people,$number,$sclass){
global $mysqli;

$sql = 'select id from results where event="'.$event.'"  and people = "'.$people.'";';
$result = $mysqli->query($sql);
if ( mysqli_num_rows($result) > 0){ 
} else{

$sqli = $mysqli->prepare("insert into results (event,people,number,class) values(?,?,?,?) ");
$sqli->bind_param('iiii', $event, $people,$number,$sclass);
$sqli->execute();  
}




}


?>
<body>

  <div>
<a href="index.php">Назад</a>
<hr>
</div>

<script>

var i;
i = "0";

window.onload = function() {
addF();
get('peoples');
}


function addF() {
   
  i++;

new_form = '<div class="field"><label for="fio">Спортсмен: </label><input type="text" name="fio[]" id="input_'+i+'" value="" class="auto"> <input id="number_'+i+'" name="number[]" /> <select name="class[]" size="1" form="peoples"> <option value="0">Хобби</option><option value="1">Спорт</option><input type="hidden" name="id[]" id="id_'+i+'" value=""></div>'

    $("#input_forms").append(new_form);      // Append the new elements 
   
    $('#input_'+i)
        .focus()
       ;
    
        
    //autocomplete
    $(".auto").autocomplete({
        source: "search.php", 
         delay: 500,
         autoFocus: true,
        minLength: 3,
        select: function(event, ui) {
            $('#number_'+i).val(ui.item.number);
            $('#id_'+i).val(ui.item.id);
            addF()
            }
        
    }); 
    
    
    $('input').keydown(function(e) {
  if (e.keyCode == 13 && e.ctrlKey) {
  this.form.submit(); 
  }else if (e.keyCode == 13){
  event.preventDefault();
  //addF();
  }
});

  
$( ".result" ).click(function() {
  //alert($(this).attr('id')+" - "+$(this).attr('result')+" - "+$(this).attr('event'));
  //$(this).replaceWith('<input type="text" value="'+$(this).prop("value")+'" />');
});      


};





</script>

<p>
   <div class="main">


<?php

$sql = 'select date, title, description from events where id ='.$event_id.';';
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "<h1>Добавление людей в событие \"".$row[title]."\"</h1>";
echo "Дата проведения: <b>".$row[date]."<br></b>";
echo "Описание: <b>".$row[description]."</b><br>";
?>


При наборе фамилии информация подтягивается из базы, снизу список спортсменов в базе<br>
Добавление нового поля происходит автоматически при выборе спортсмена<br>
Ctrl+Enter - отправка данных</p>

    <form autocomplete="off" action="<?=$_SERVER['PHP_SELF']."?event=".$event_id?>" method='post' id="peoples">
   
    <div id="input_forms">
    </div>
    <input class="button" type="submit" id="button1" value="Добавить">
    
    
    </form>


<div>
<?php

if ($_POST['fio'] !=""){
foreach ($_POST['fio'] as  $key => $value) {
if ($value != ""){
    //echo $key." - ".$value.", №".$_POST['number'][$key].", ".$_POST['class'][$key].", ".$_POST['id'][$key]."<br>";
    add_people_to_event ($event_id,$_POST['id'][$key],$_POST['number'][$key],$_POST['class'][$key]);
}
}
}elseif ( $_GET['del_id'] != "" and $_GET['event'] != "" ){
 
$sqli = $mysqli->prepare("delete from results where event = ? and people = ?");
$sqli->bind_param('ii',  $_GET['event'],$_GET['del_id']);
$sqli->execute();
}
?>
    </div>
</div>





 <table class = "date_table" border="1" >
   
         <tr>   
         <th>Номер</th>
    <th>ФИО</th>
    <th>Спорт</th>
    <th>Место</th>

    </tr>

<?php

$sql = 'select peoples.fio as fio, peoples.number as number, results.result as result, peoples.id as id, results.class as sclass from results,peoples,events where results.people=peoples.id and results.event=events.id and event ='.$event_id.' order by class desc,fio, result ;';
$result = $mysqli->query($sql);
if ( $result != ""){ 
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
echo '<tr>';
echo '<td>'.$row[number].' / <a href="results.php?event='.$event_id.'&del_id='.$row[id].'">Удалить</a></td>';
echo '<td>'.$row[fio].'</td>';
echo '<td>'.$row[sclass].'</td>';
echo '<td class="id" id="'.$row[id].'" result="'.$row[result].'" event="'.$event_id.'">'.$row[result].'</td>';
echo '</tr>';
}            
  
}

?>
</table>


<div id="date_table"></div>


 
