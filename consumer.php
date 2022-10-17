<?php
require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;


$connection = new AMQPStreamConnection('/** IP of your rabbitmq server instance here */', 5672, 'rabbit', 'rabbit');
$channel = $connection->channel();

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

$queue = readline("Enter queue: ");

$channel->basic_consume($queue, '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}