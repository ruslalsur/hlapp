<?php
require_once('vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * класс "Заяц"
 */
class Rabbit {
    private AMQPStreamConnection $connection;
    private AMQPProtocolChannel $cannel;
    private String $queue;

    public function __construct(String $queue) {
        try {
            // rabbit-connection абстрагирует (что на молодежном сленге означает - "забей") соединение сокета и 
            // выражает озабоченность в согласовании версии протокола и аутентификации
            $this->connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
            $this->channel = $this->connection->channel();
            $this->queue = $queue;

            // Очередь бедет создана, если она уже не существует на сервере RabbitMQ. 
            // Содержимое сообщения представляет собой массив байтов, поэтому вы можно кодировать все, что нам нравится.
            $this->channel->queue_declare($this->queue, false, true, false, false);
        } catch (AMQPException $e) {
            echo $e->getMessage();
        } catch (AMQPProtocolChannelException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * постановка сообщения в очередь переданной в конструктор
     */
    public function publish($message) {
        try {
            $this->channel->basic_publish(new AMQPMessage($message), '', $this->queue);
            $this->close();
        } catch (AMQPException $e) {
            echo $e->getMessage();
        } catch (AMQPProtocolChannelException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * получение сообщении из очереди переданной в конструктор
     */
    public function receive() {
        $handler = function($message) {
            echo 'пришло сообщение от сервера с зайцами, цитирую: ', $message->body, "\t";
            echo 'очередь: ', $this->queue, "\n";
        };

        try {
            $this->channel->basic_consume($this->queue, '', false, true, false, false, $handler);

            // держим канал открытым, пока есть для чего
            while (count($this->channel->callbacks)) {
                $this->channel->wait();
            }
            $this->close();
        } catch (AMQPException $e) {
            echo $e->getMessage();
        } catch (AMQPProtocolChannelException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * прекращение балагана с зайцами (закрытие канала и соединения)
     */
    private function close() {
        try {
            $this->channel->close();
            $this->connection->close();
        } catch (AMQPProtocolChannelException $e) {
            echo $e->getMessage();
        }
    }
}