<h1>Логирование</h1>

<?php
require_once('../vendor/autoload.php');
require_once('../config/config.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

if (DEBUG) {
    // вклюение опциональной трассировки
    ini_set('xdebug.auto_trace','On');

    // создание экземпляра класса
    $log = new Logger('log');
    $log->pushHandler(new StreamHandler('../log/warning.log', Logger::WARNING));
    $log->pushHandler(new StreamHandler('../log/debug.log', Logger::DEBUG));
    $log->pushHandler(new StreamHandler('../log/info.log', Logger::INFO));
    $log->pushHandler(new StreamHandler('../log/notice.log', Logger::NOTICE));
    $log->pushHandler(new StreamHandler('../log/error.log', Logger::ERROR));
    $log->pushHandler(new StreamHandler('../log/alert.log', Logger::ALERT));
    $log->pushHandler(new StreamHandler('../log/critical.log', Logger::CRITICAL));
    $log->pushHandler(new StreamHandler('../log/emergency.log', Logger::EMERGENCY));

    // начало замера использования времени и памяти
    $start = microtime(true);
    $memory1 = memory_get_usage();
} else {
    ini_set('xdebug.auto_trace','Off');
}

// тянем время создавая иллюзию бурной деятельности
$data = array();
for ($x = 1; $x < 4000; $x++) {
    for ($y = 1; $y < 5000; $y++) {
        $z = $x * $y - $x / $y + 4596;
    }
    array_push($data, $z);
}
trigger_error('принудительный вызов ошибки для старта трассировки');

if (DEBUG) {
    // создание логов различных уровней
    $log->warning('ПРЕДУПРЕЖДЕНИЕ! Время генерации: ' . (microtime(true) - $start) . ' сек.');
    $log->debug('ОТЛАДКА! Время генерации: ' . (microtime(true) - $start) . ' сек.');
    $log->info('ИНФОРМАЦИЯ! Время генерации: ' . (microtime(true) - $start) . ' сек.');
    $log->error('ОШИБКА! Время генерации: ' . (microtime(true) - $start) . ' сек.');
    $log->alert('ОПОВЕШЕНИЕ! Время генерации: ' . (microtime(true) - $start) . ' сек.');
    $log->critical('КРИТИЧНО! Время генерации: ' . (microtime(true) - $start) . ' сек.');
    $log->emergency('ЭКСТРЕННО! Время генерации: ' . (microtime(true) - $start) . ' сек.');

    // изменения в использовании памяти
    $memory2 = memory_get_usage();
    $memory_diff = $memory2 - $memory1;
    $log->debug('Изменения в использовании памяти: ' . $memory_diff . ' байтов');

    echo 'Информация по логированию содержится в каталоге ../log';
    echo 'Информация по трассировке содержится в каталоге ../log.traces';
}
