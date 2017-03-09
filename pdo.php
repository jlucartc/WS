<?php

define("DB","mysql");
define("DB_HOST","localhost");
define("DB_NAME","ws");
define("DB_USER","root");
define("DB_PASS","");

$pdo = new PDO(DB.":host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USER,DB_PASS);

?>
