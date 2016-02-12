<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
             'user' => [
                'class' => 'dektrium\user\Module',
                 ],

             'gridview' =>  [
            'class' => '\kartik\grid\Module',
             // enter optional module parameters below - only if you need to  
             // use your own export download action or custom translation 
             // message source
             'downloadAction' => 'gridview/export/download',
              'i18n' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                            'basePath' => '@kvgrid/messages',
                            'forceTranslation' => true

                        ]
               ],

            ],
    'components' => [

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => ['@webroot/themes/thm1'],
                    //'@app/views' => ['@webroot/themes/thm2'],
                    'baseUrl'=>'@web'
                ]
            ]
        ],

        'sms' => [
            'class' => 'app\vendor\LabsMobileSMS\LabsMobileSMS',
            'LMaccount_username'=>'luis.malpica.18@gmail.com',
            'LMaccount_password'=>'dt42vd86',
            'LMaccount_clientapi'=>'priv006',
        ],

        'mailer' => [
         'class' => 'yii\swiftmailer\Mailer',
         //'viewPath' => '@common/mail',
         'useFileTransport'=>false,
         'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'luis.malpica.18@gmail.com',
            'password' => 'UnetMalpica22',
            'port' => '587',
            'encryption' => 'tls',
           ],
        ], 

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'DoingITeasy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
