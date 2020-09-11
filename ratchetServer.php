<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Classes/ConnectionsManager.php';
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Classes\ConnectionsManager;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ConnectionsManager()
        )
    ), 8080
);

$server->run();