<?php
$dbtest = require __DIR__ . '/test_db.php';
// config/test.php
$config = yii\helpers\ArrayHelper::merge(
    require (__DIR__ . '/web.php'),
    [
        'id' => 'api-tests',
        'components' => [
            'db' => $dbtest
        ]
    ]
);
return $config;
