<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
/*        'v2' => [
            'class' => 'api\modules\v2\Module'
        ],*/
    ],
    'components' => [
        'response' => [
            'format'=>'json',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'keyPrefix' => 'sinoapi',
        ],
        'request' => [
            // 'csrfParam' => '_csrf-api',
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-api',
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
            // 'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/nav','v1/language','v1/banner','v1/category'],
                    //不开启复数形式
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/product'],
                    //不开启复数形式
                    'pluralize' => false,
                    'extraPatterns' => [
                        //修改产品浏览次数
                        'POST visitor' => 'visitor', 
                        //热门产品 显示8条
                        'GET hot-product' => 'hot-product',
                        'GET new-product' => 'new-product',
                        'GET view' => 'view',
                        'GET list' => 'list',
                        'GET search' => 'search',
                        'GET category-list' => 'category-list',

                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/news'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET view' => 'view',
                        'POST visitor' => 'visitor',
                        'GET hot-news' => 'hot-news',
                        'GET hot-video' => 'hot-video',
                        'GET group' => 'group',
                        'GET home-news' => 'home-news',
                        'GET video-list' => 'video-list',
                        'GET news-list' => 'news-list',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/contact'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'POST create' => 'create',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/question'],
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/about'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET company-profile' => 'company-profile',
                        'GET video-show' => 'video-show',
                        'GET company-show' => 'company-show',
                        'GET market' => 'market'
                    ],
                ],
            ],
        ],
        
    ],
    'params' => $params,
];
