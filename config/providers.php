<?php

return [

    'providers' => [

        'DataProviderX' => [
            'class' => \App\Http\Abstraction\Classes\UserXClass::class,
            'file_name' => 'DataProviderX',
        ],

        'DataProviderY' => [
            'class' => \App\Http\Abstraction\Classes\UserYClass::class,
            'file_name' => 'DataProviderY',
        ],

//        'DataProviderZ' => [
//            'class' => \App\Http\Abstraction\Classes\UserZClass::class,
//            'file_name' => 'DataProviderZ',
//        ],

    ],
];
