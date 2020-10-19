<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MessageService {

    public function purchaseNew ($message) {

        $messageEncode = json_encode($message);

        $sendMessage = new AMQPMessage($messageEncode);

        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'admin', 'admin');

        $channel = $connection->channel();

        $channel->exchange_declare(
            'purchase',
            'direct', # type
            false,    # passive
            true,    # durable
            false     # auto_delete
        );

        $channel->queue_declare('new_purchase');

        $channel->queue_bind('new_purchase', 'purchase', 'purchase_create');

        $channel->basic_publish($sendMessage, 'purchase', 'purchase_create');

        $channel->close();
        $connection->close();
    }
}
