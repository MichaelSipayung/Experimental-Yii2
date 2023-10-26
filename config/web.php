<?php

use app\components\TaskNavigation;
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VwTF4MSeuexVamokeKVOyLGFi7MIeVlU',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //uncomment this to set default behavior
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
     
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        //experimental for automatically include all widgets in all views
        //this case is button navigation for student data
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        //uncomment this to set default behavior
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],*/
        /* 
        */
        //the modified urlManager will be like this controller/action 
        'urlManager'=> [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=> [
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        
    ],
    'params' => $params,
    //adding the default behavior for student
    'defaultRoute' => 'student/index',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
