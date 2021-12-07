<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //'modules' => [],
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' =>
                [
                    'application/json' => 'yii\web\JsonParser',
                ],

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                //API:
                //Hoteis:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'hotels',
                    'pluralize' => false,
                ],
                //Pacotes:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/packages',
                    'pluralize' => false,

                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                    ],

                    'extraPatterns' => [
                        'GET {id}/detalhes' => 'detalhes', // 'detalhes' é 'actionDetalhes'
                    ],
                ],
                //Atividades:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/activities',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'POST activitie' => 'activitie', // 'activitie' é 'actionActivitie'
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
