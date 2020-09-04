<?php
require_once '../config.php';
require_once '../redisCacheProvider.php';

$redis = new Redis();
$connection = $redis->connect(SERVER_NAME, NO_SQL_PORT);
if ($connection) {
    $cache = new redisCacheProvider($connection);
} else {
    echo "ошибка соединения redis";
}
$cache_time1 = time();

$data = $cache->get('Diane');

$cache_time = time() - $cache_time1;
echo $cache_time;

if (!$data) {
    $db_time1 = time();

    $connection = mysqli_connect(SERVER_NAME, USER, PASSWORD, DATABASE, SQL_PORT);
    if (!$connection) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    $result = mysqli_query($connection,"SELECT * FROM employees WHERE 'firstName' = 'Diane'");
    $data = [];
    while($row = mysqli_fetch_assoc($result)) $data[] = $row;
    mysqli_close($connection);

    $db_time = time() - $db_time1;
    echo $db_time;
}

echo $data;

