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
            //Este codigo serve para meter os POST da api a funcionar
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
                    'controller' => 'api/hotels',
                    'pluralize' => false,
                ],
                //Pacotes:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/packages',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'GET detalhes/{id}' => 'detalhes', // 'detalhes' é 'actionDetalhes'
                    ],
                ],
                //Atividades:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/activities',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'GET all/{id}' => 'all', // 'all' é 'actionAll'
                        //Esta era so para teste
                        'POST activitie' => 'activitie', // 'activitie' é 'actionActivitie'
                    ],
                ],
                //Atividades por pacote:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/activitiespackages',
                    'pluralize' => false,
                ],
                //Aeroportos:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/airports',
                    'pluralize' => false,
                ],
                //Imagens dos pacotes:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/packageimages',
                    'pluralize' => false,
                ],
                //Info dos users:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/usersinfo',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'PUT update/{id}' => 'update', // 'update' é 'actionUpdate'
                        'GET buscar/{id}' => 'buscar', // 'buscar' é 'actionBuscar'
                    ],
                ],
                //Packages dos users:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/userspackages',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'POST compra' => 'compra', // 'update' é 'actionCompra'
                        'GET historico/{id}' => 'historico', // 'update' é 'actionHistorico'
                    ],
                ],
                //Registo:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/registar',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'POST user' => 'user', // 'update' é 'actionUser'
                    ],
                ],
                //Login:
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/login',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'POST user' => 'user', // 'update' é 'actionUser'
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
