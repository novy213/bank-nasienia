<?php

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
            'cookieValidationKey' => 'bank-nasienia',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern' => '/getbuhaj',
                    'route' => '/api/getbuhaj',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/addbuhaj',
                    'route' => '/api/addbuhaj',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/getclients',
                    'route' => '/api/getclients',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/addclient',
                    'route' => '/api/addclient',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/deletebuhaj/<id:\d+>',
                    'route' => '/api/deletebuhaj',
                    'verb' => 'DELETE',
                ],
                [
                    'pattern' => '/deleteclient/<id:\d+>',
                    'route' => '/api/deleteclient',
                    'verb' => 'DELETE',
                ],
                [
                    'pattern' => '/getprzyjecia',
                    'route' => '/api/getprzyjecia',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/getwydania',
                    'route' => '/api/getwydania',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/addwydanie',
                    'route' => '/api/addwydanie',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/editbuhaj/<id:\d+>',
                    'route' => '/api/editbuhaj',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/editclient/<id:\d+>',
                    'route' => '/api/editclient',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/adddostawa',
                    'route' => '/api/adddostawa',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/getdostawa',
                    'route' => '/api/getdostawa',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/getilosc',
                    'route' => '/api/getilosc',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/zmienilosc',
                    'route' => '/api/zmienilosc',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/deleteilosc',
                    'route' => '/api/deleteilosc',
                    'verb' => 'DELETE',
                ],
                [
                    'pattern' => '/addmetryczka',
                    'route' => '/api/addmetryczka',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => '/getarchiwum',
                    'route' => '/api/getarchiwum',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/getmetryczka/<id:\d+>',
                    'route' => '/api/getmetryczka',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/getmagazyn/<id:\d+>',
                    'route' => '/api/getmagazyn',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => '/deleteprzyjecia/<id:[\w-]+>',
                    'route' => '/api/deleteprzyjecia',
                    'verb' => 'DELETE',
                ],
            ],
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'api/index',
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
        'allowedIPs' => ['127.0.0.1', '::1', '172.22.0.1'],
    ];
}

return $config;
