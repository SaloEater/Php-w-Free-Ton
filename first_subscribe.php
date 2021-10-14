<?php

use Extraton\TonClient\Entity\Net\Filters;
use Extraton\TonClient\Entity\Net\ParamsOfSubscribeCollection;
use Extraton\TonClient\TonClient;

require __DIR__ . '/vendor/autoload.php';

$config = [
    'network' => [
        'server_address' => '45.138.24.114'
    ]
];
$tonClient = new TonClient($config);

$id = '0:e433b6a2cde8c45a9d7f440c16a4b7c57adab546fb98d5c89a1b98b038cab09e';
$net = $tonClient->getNet();
$query = (new ParamsOfSubscribeCollection('messages'))
    ->addResultField('id', 'data')
    ->addFilter('id', Filters::EQ, $id);

$result = $net->subscribeCollection($query);
var_dump($result);