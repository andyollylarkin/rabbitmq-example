<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('/** IP of your rabbitmq server instance here */', 5672, 'rabbit', 'rabbit');
$channel = $connection->channel();
while (true) {
    $inputMsg = readline("Enter message: ");
    $inputRoutingKey = readline("Enter routing key: ");
    $msg = new AMQPMessage($inputMsg);
    $channel->basic_publish($msg, 'php_test_ex_fanout', $inputRoutingKey);
    echo "[x] Send Hello!\n";
}