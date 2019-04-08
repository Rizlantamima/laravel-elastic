<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Rizlantamima\ElasticQuent\Elastic;

$elastic = new Elastic('');
$elastic = $elastic->setHost('')->setUsername('')->setPassword('');
echo json_encode($elastic->findOrFail(''));
