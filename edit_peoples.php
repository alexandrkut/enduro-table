<?php
//$auth_req=1;
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
	echo "<h1>Редактирование спортсмена</h1>";
  }else{
  echo "<h1>Добавление спортсмена</h1>";  
  }
?>
  <a href="<?=$_SERVER['PHP_SELF']?>">Очистить</a><br>
  <div class="main">
  <form autocomplete="oт" id="form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
  <input  type="hidden" name="id" id="id">
    <div class="field">   
  <label for="number">Номер:</label>
  <input type="text" name="number" id="number" size="3"><br>
  </div>
  <div class="field">   
  <label for="fio">ФИО:</label>
  <input required type="text" name="fio" id="fio" size="50"><br>
  </div>
  <div class="field">
       <label for="date">Дата рождения:</label>
  <input required class="date" type="text" id="date" name="date" READONLY ><br>
    </div>
    <div class="field">
    <label for="place">Место проживания:</label>
  <input required type="text" name="place" id="place" size="30"><br>
  </div> 
      <div class="field">
    <label for="moto">Мотоцикл:</label>
  <input required type="text" name="moto" id="moto" size="30"><br>
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
echo '<script type="text/javascript">';
if ( $_GET["id"] != ""){
$edit_id = $_GET["id"];

$sqli = $mysqli->prepare("select id,number,fio,date,place,moto,description from peoples where id = ?");
$sqli->bind_param('i', $edit_id);
$sqli->execute();
$result = $sqli->get_result();
$edit = $result->fetch_array(MYSQLI_ASSOC);


echo 'document.getElementById("id").value="'.$edit["id"].'" ; ';
echo 'document.getElementById("number").value="'.$edit["number"].'" ; ';
echo 'document.getElementById("fio").value="'.safe_str($edit["fio"]).'" ; ';
echo 'document.getElementById("date").value="'.$edit["date"].'" ; ';
echo 'document.getElementById("place").value="'.safe_str($edit["place"]).'" ; ';
echo 'document.getElementById("moto").value="'.safe_str($edit["moto"]).'" ; ';
echo 'document.getElementById("description").value="'.safe_str($edit["description"]).'" ; ';

echo 'document.getElementById("button1").value="Редактировать" ; ';
echo 'document.getElementById("delete").style.visibility="visible" ; ';
}else{
echo 'document.getElementById("delete").style.visibility="hidden" ; ';
}
echo 'get("peoples","1")';
echo '</script>';
  




if ( $_POST["id"] != "" and $_POST["delete"] != "on"){

$sqli = $mysqli->prepare("update peoples set number =?, fio =?, date=?, place =?, moto =?, description =? where id =? ");
$sqli->bind_param('isssssi', $_POST["number"], $_POST["fio"], $_POST["date"], $_POST["place"], $_POST["moto"], $_POST["description"], $_POST["id"]);
$sqli->execute();

}elseif( $_POST["id"] != "" and $_POST["delete"] == "on"){

$sqli = $mysqli->prepare("delete from peoples where id = ? ");
$sqli->bind_param('i', $_POST["id"]);
$sqli->execute();
}elseif( $_POST["id"] == "" and $_POST["fio"] != "") {
$sqli = $mysqli->prepare("insert into peoples (number,fio,date,place,moto,description) values(?,?,?,?,?,?) ");
$sqli->bind_param('isssss', $_POST["number"],$_POST["fio"], $_POST["date"], $_POST["place"],$_POST["moto"], $_POST["description"]);
$sqli->execute();
}else{


}
 //echo "!!!".$_POST["id"]."-".$_POST["title"]."-".$_POST["date"]."-".$_POST["place"]."-".$_POST["description"];
 
?>
