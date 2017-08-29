<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'rules' => [
        'GET ' => 'site/index',
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => ['todo', 'post']
        ]
    ],
];