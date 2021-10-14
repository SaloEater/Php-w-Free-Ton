<?php

declare(strict_types=1);

use Extraton\TonClient\Entity\Net\Filters;
use Extraton\TonClient\Entity\Net\ParamsOfQueryCollection;
use Extraton\TonClient\Entity\Net\ParamsOfSubscribeCollection;
use Extraton\TonClient\TonClient;

require __DIR__ . '/vendor/autoload.php';

$address = 'http://45.138.24.114/';
$config = [
    'network' => [
        'server_address' => $address
    ]
];
$tonClient = new TonClient($config);

$result = $tonClient->version();

echo 'TON SDK version: ' . $result->getVersion() . PHP_EOL;
die;
$srcAddress = '';
$eventValue = '0x1';
$net = $tonClient->getNet();
$query = (new ParamsOfQueryCollection('messages'))
    ->addResultField('id', 'created_at', 'src', 'dst')
    ->addFilter('created_at', Filters::LT, 1634137225);

$result = $net->queryCollection($query);
var_dump($result->getResult());
