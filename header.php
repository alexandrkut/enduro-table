<?php
if ($auth_req) {
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Enduro SPb"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Без авторизации нельзя.';
    exit;
  } else {
    $ok=0;
    //global $auth_user=$_SERVER['PHP_AUTH_USER'];
    $fp=fopen("{$_SERVER['DOCUMENT_ROOT']}/enduro/user.data",'r');
    while (!feof($fp)) {
      list ($u,$p)=explode(' ',fgets($fp));
      $p=trim($p);
      if ($u==$_SERVER['PHP_AUTH_USER'] && $p==$_SERVER['PHP_AUTH_PW']) {
        $ok=1;
        break;
      }
    }
    if (!$ok) {
      header('WWW-Authenticate: Basic realm="Enduro SPb"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Без авторизации нельзя.';
      exit;
    }
  }
}
?>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 <script src="js/scripts.js" type="text/javascript"></script>
 <script src="js/pickmeup.min.js" type="text/javascript"></script>  
 <link rel="stylesheet" type="text/css" href="css/pickmeup.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>


