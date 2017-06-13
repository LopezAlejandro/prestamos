<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'es',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-yOMBf9swUpVzu2OmfRgHWQVJZYK3jLE',
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
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'i18n' => [
        'translations' => [
            'kvgrid' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@vendor/kartik-v/yii2-grid/messages',
            ],
      	],
    		],  
    ],
    'params' => $params,
     'modules' => [
		'gridview' =>  [
        	'class' => 'kartik\grid\Module'
    		],
    		'datecontrol' =>  [
         'class' => 'kartik\datecontrol\Module',
         'displaySettings' => [
                'date' => 'dd-MM-yyyy',
                'time' => 'hh:mm:ss a',
                'datetime' => 'dd-MM-yyyy hh:mm:ss a',
            ],
            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'php:U', 
                'time' => 'php:H:i:s',
                'datetime' => 'php:Y-m-d H:i:s',
            ],
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
            
    		],
    		'treemanager' =>  [
          'class' => '\kartik\tree\Module',
          // see settings on http://demos.krajee.com/tree-manager#module
      	]
    		
		],
];

$config['modules']['gii']['class'] = 'yii\gii\Module';
//Add this into backend/config/main-local.php
$config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
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
    //$config['modules']['gii'] = ['class' => 'yii\gii\Module',
    $config['modules']['gii']['class'] = 'yii\gii\Module';
//Add this into backend/config/main-local.php
	$config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ]; 
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    
}

return $config;
