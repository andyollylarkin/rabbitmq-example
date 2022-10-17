# Example of PHP([AMQP lib](https://php-amqplib.github.io/php-amqplib/)) and [RabbitMQ](https://www.rabbitmq.com/)

### Installation:
1. ```shell
    $ composer install # install project requirements
    ```
2. Change IP address in **consumer.php** and **producer.php**

### Example description:
Example of using rabbitmq exchange and queues. Used direct exchange by routing key

> 2 queues: **first_queue**, **second_queue**.
> Routing key for first_queue: **first_queue_tag**,
> for second: **second_queue_tag**