<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'CMS' => [
            'class' => 'common\modules\brancon\cms\Module',
        ],
    ],
];
