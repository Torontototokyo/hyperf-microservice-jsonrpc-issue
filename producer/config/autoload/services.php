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
                'id' => $interface,
                'registry' => [
                    'protocol' => 'nacos',
                    'address' => 'http://114.132.184.216:8849',
                ],
                'protocol' => 'jsonrpc-http',
                'options' => [
                    'connect_timeout' => 5.0,
                    'recv_timeout' => 5.0,
                    'settings' => [
                        // 根据协议不同，区分配置
                        'open_eof_split' => true,
                        'package_eof' => "\r\n",
                        // 'open_length_check' => true,
                        // 'package_length_type' => 'N',
                        // 'package_length_offset' => 0,
                        // 'package_body_offset' => 4,
                    ],
                    // 重试次数，默认值为 2，收包超时不进行重试。暂只支持 JsonRpcPoolTransporter
                    'retry_count' => 2,
                    // 重试间隔，毫秒
                    'retry_interval' => 100,
                    // 使用多路复用 RPC 时的心跳间隔，null 为不触发心跳
                    'heartbeat' => 30,
                    // 当使用 JsonRpcPoolTransporter 时会用到以下配置
                    'pool' => [
                        'min_connections' => 1,
                        'max_connections' => 32,
                        'connect_timeout' => 10.0,
                        'wait_timeout' => 3.0,
                        'heartbeat' => -1,
                        'max_idle_time' => 60.0,
                    ],
                ],
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
