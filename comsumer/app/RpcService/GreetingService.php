<?php
namespace App\RpcService;
use Nacos\Grpc\GreetingInterface;
use Hyperf\RpcServer\Annotation\RpcService;
#[RpcService(name: 'GreetingService', server: 'jsonrpc', publishTo: 'nacos',protocol: 'jsonrpc-http')]
class GreetingService implements GreetingInterface
{
    public function sayHello()
    {
        // TODO: Implement sayHello() method.
        return 'Hello';
    }

    public function sayGoodbye()
    {
        // TODO: Implement sayGoodbye() method.
        return 'Goodbye';
    }

    public function say(string $words)
    {
        // TODO: Implement say() method.
        return $words;
    }

}