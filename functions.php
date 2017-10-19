    <?php
$mysqli = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->query('SET names "utf8"');


function exec_sql ($sql){
global $mysqli;
if (! $mysqli->query($sql)){
  echo "не выполнить запрос<br>";
  }else{
    //echo "запрос выполнен<br>";
  }
}

function safe_str ($str){
global $mysqli;
  return mysqli_real_escape_string($mysqli,htmlspecialchars($str));
  
}

?>