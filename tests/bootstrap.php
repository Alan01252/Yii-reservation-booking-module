<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'../../../../deps/yii/framework/yiit.php';
$config=dirname(__FILE__).'../../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);


defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 1);


function shutdown() {
Yii::app()->log->processLogs(null);
Yii::app()->end();
}

register_shutdown_function('shutdown');
