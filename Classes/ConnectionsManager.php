<?php
namespace app\Classes;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ConnectionsManager implements MessageComponentInterface {
    protected $connections;

    public function __construct() {
        $this->connections = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connectionOpen) {
        $this->connections->attach($connectionOpen);
        echo "New connection! ({$connectionOpen->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $connectionFrom, $connectionData) {
        $connections = count($this->connections) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $connectionFrom->resourceId, $connectionData, $connections, $connections == 1 ? '' : 's');

        foreach ($this->connections as $connection) {
            if ($connectionFrom !== $connection) {
                $connection->send($connectionData);
            }
        }
    }

    public function onClose(ConnectionInterface $connectionClose) {
        $this->connections->detach($connectionClose);
        echo "Connection {$connectionClose->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $connectionError, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $connectionError->close();
    }
}