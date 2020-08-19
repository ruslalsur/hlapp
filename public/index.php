<h1>Тестовый скрипт</h1>

<?php
  $start = microtime(true);
  for ($x=1; $x<10000; $x++) {
    for ($y=1; $y<5000; $y++) {
      $x*$y-$x/$y+4596;
    }
  }
  echo 'Время генерации: ' . ( microtime(true) - $start ) . ' сек.';
