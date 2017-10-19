<?php
include "header.php";
require_once "config.php";
require_once "functions.php";
?>
<div>
<a href="index.php">Назад</a>
<hr>
</div>


<?php

if ( $_GET["edit"] == "1"){  
	echo "<h1>Редактирование мероприятия</h1>";
  }else{
  echo "<h1>Добавление мероприятия</h1>";  
  }
?>
  <a href="<?=$_SERVER['PHP_SELF']?>">Очистить</a><br>
  <div class="main">
  <form autocomplete="on" id="form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
  <input  type="hidden" name="id" id="id">
  <div class="field">   
  <label for="title">Название мероприятия:</label>
  <input required type="text" name="title" id="title" size="30"><br>
  </div>
  <div class="field">
       <label for="date">Дата:</label>
  <input required class="date" type="text" id="date" name="date" READONLY ><br>
    </div>
    <div class="field">
    <label for="place">Место проведения:</label>
  <input required type="text" name="place" id="place" size="30"><br>
  </div>
    <div class="field">
    <label for="description">Описание:</label>
  
  <TEXTAREA name="description" rows="5" cols="25" id="description"></TEXTAREA><br>
        </div>
        
        
    <div class="field" id="delete">
     <label for="delete" id="delete_label">Удалить:</label>
  <input type="checkbox" name="delete" onclick="toggle(this,'delete_label')">
    </div>
  
  <input class="button" type="submit" id="button1" value="Добавить">
    
	</form>
  </div>    


<div id="date_table"></div>


<?php
//Загрузка из базы данных о мероприятии и запихивание их в поля
echo '<script type="text/javascript">';
if ( $_GET["id"] != ""){
$edit_id = $_GET["id"];


$sqli = $mysqli->prepare("select id,title,date,place,description from events where id = ?");
$sqli->bind_param('i', $edit_id);
$sqli->execute();
$result = $sqli->get_result();
$edit = $result->fetch_array(MYSQLI_ASSOC);

echo 'document.getElementById("id").value="'.$edit["id"].'" ; ';
echo 'document.getElementById("title").value="'.safe_str($edit["title"]).'" ; ';
echo 'document.getElementById("date").value="'.$edit["date"].'" ; ';
echo 'document.getElementById("place").value="'.safe_str($edit["place"]).'" ; ';
echo 'document.getElementById("description").innerHTML ="'.safe_str($edit["description"]).'" ; ';

echo 'document.getElementById("button1").value="Редактировать" ; ';
echo 'document.getElementById("delete").style.visibility="visible" ; ';
}else{
echo 'document.getElementById("delete").style.visibility="hidden" ; ';
}
echo 'get("events","1")';
echo '</script>';
  




if ( $_POST["id"] != "" and $_POST["delete"] != "on"){
// обновление
$sqli = $mysqli->prepare("update events set title =?, date=?, place =?, description =? where id =? ");
$sqli->bind_param('ssssi', $_POST["title"], $_POST["date"], $_POST["place"], $_POST["description"], $_POST["id"]);
$sqli->execute();

}elseif( $_POST["id"] != "" and $_POST["delete"] == "on"){
//удаление
$sqli = $mysqli->prepare("delete from events where id = ? ");
$sqli->bind_param('i', $_POST["id"]);
$sqli->execute();
    
}elseif( $_POST["id"] == "" and $_POST["title"] != "") {
//добавление
$sqli = $mysqli->prepare("insert into events (title,date,place,description) values(?,?,?,?) ");
$sqli->bind_param('ssss', $_POST["title"], $_POST["date"], $_POST["place"], $_POST["description"]);
$sqli->execute();

}else{


}
 //echo "!!!".$_POST["id"]."-".$_POST["title"]."-".$_POST["date"]."-".$_POST["place"]."-".$_POST["description"];
 
?>
