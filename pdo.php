<?php

define("DB","mysql");
define("DB_HOST","fdb16.biz.nf:3306");
define("DB_NAME","2309980_ws");
define("DB_USER","2309980_ws");
define("DB_PASS","1234abcde");

$pdo = new PDO(DB.":host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USER,DB_PASS);

?>
