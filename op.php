<?php

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_DEBUG',true);
define('APP_PATH','./admin/');
define('RUNTIME_PATH','./temp/admin/' );
define('BIND_MODULE','Main');
require './lib/core.php';
?>
