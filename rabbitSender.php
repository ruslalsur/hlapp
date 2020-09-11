<?php
    require_once 'Classes/Rabbit.php';

    $rabbit1 = new Rabbit('queue1');

    $rabbit1->publish('кто крайний за первым зайцем?');