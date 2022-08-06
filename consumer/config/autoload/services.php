<?php
return [
    'enable' => [
        // 开启服务发现
        'discovery' => true,
        // 开启服务注册
        'register' => true,
    ],
    // 服务消费者相关配置
    // 服务提供者相关配置
    'consumers'=>[],
    'providers' => [],
    // 服务驱动相关配置
    'drivers' => [
        'nacos' => [
            // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
            // 'url' => '',
            // The nacos host info
            'host' => '114.132.184.216',
            'port' => 8849,
            // The nacos account info
            'username' => 'nacos',
            'password' => 'nacos',
            'guzzle' => [
                'config' => null,
            ],
            'tenant'=>'api',
            'group_name' => 'DEFAULT_GROUP',
            'namespace_id'=>'4254e1d8-3209-4654-bce0-1270680545a6',
            'heartbeat' => 5,
            'ephemeral' => false, // 是否注册临时实例
        ],
    ],
];
