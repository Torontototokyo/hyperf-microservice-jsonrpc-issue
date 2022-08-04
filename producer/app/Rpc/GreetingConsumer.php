<?php

use Hyperf\RpcClient\AbstractServiceClient;
class GreetingConsumer extends AbstractServiceClient
{
   protected $serviceName = 'GreetingService';
}