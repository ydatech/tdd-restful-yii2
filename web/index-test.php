<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require (__DIR__ . '/../vendor/autoload.php');
require (__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
$env = __DIR__ . '/../';

// load .env
 (new Dotenv\Dotenv($env))->load();

$config = require (__DIR__ . '/../config/test.php');

// app
 (new yii\web\Application($config))->run();



