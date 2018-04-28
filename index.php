<?php
//header("location: http://o2o.kexueyou.com/newhtml/");

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_DEBUG',True);
define('APP_PATH','./index/');
define('RUNTIME_PATH','./temp/index/' );
define('BIND_MODULE','Main');
require './lib/core.php';


?>
