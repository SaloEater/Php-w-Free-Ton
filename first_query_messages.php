<?php

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

$srcAddress = '';
$eventValue = '0x1';
$net = $tonClient->getNet();
$id = '0:e433b6a2cde8c45a9d7f440c16a4b7c57adab546fb98d5c89a1b98b038cab09e';
$query = (new ParamsOfQueryCollection('messages'))
    ->addResultField('id', 'body')
    ->addFilter('src', Filters::EQ, $id)
    ->addFilter('msg_type', Filters::EQ, 2);

$result = $net->queryCollection($query);
var_dump($result);