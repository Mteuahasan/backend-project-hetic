<?php
$f3=require('lib/base.php');

$f3->config('config/config.ini');
$f3->config('config/routes.ini');

$f3->set('ONERROR',function($f3){
   echo \Template::instance()->render('error.html');
});

$f3->run();
?>