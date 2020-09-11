<?php
    require_once 'Classes/Rabbit.php';

    $rabbit1 = new Rabbit('queue1');

    // получаем сообщения из очереди (отправку и получение разнести по разным серверам, как и сам сервер очередей)
    $rabbit1->receive();

