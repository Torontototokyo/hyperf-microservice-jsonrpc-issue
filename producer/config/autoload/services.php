<?php
return [
    'enable' => [
        // 开启服务发现
        'discovery' => true,
        // 开启服务注册
        'register' => true,
    ],
    // 服务消费者相关配置
    'consumers' => value(function () {
        $consumers = [];
        // 这里示例自动创建代理消费者类的配置形式，顾存在 name 和 service 两个配置项，这里的做法不是唯一的，仅说明可以通过 PHP 代码来生成配置
        // 下面的 FooServiceInterface 和 BarServiceInterface 仅示例多服务，并不是在文档示例中真实存在的
        $services = [
            'GreetingService' => \Nacos\Grpc\GreetingInterface::class,
        ];
        foreach ($services as $name => $interface) {
            $consumers[] = [
                'name' => $name,
                'service' => $interface,
                'registry' => [
                    'protocol' => 'nacos',
                    'address' => 'http://114.132.184.216:8849',
                ]
            ];
        }
        return $consumers;
    }),
    // 服务提供者相关配置
    'providers' => [],
//    'consumers'=>[],
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
            'group_name' => 'DEFAULT_GROUP',
            'namespace_id' => '4254e1d8-3209-4654-bce0-1270680545a6',
            'heartbeat' => 5,
            'ephemeral' => false, // 是否注册临时实例
        ],
    ],
];
