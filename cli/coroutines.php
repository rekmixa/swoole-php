<?php

require __DIR__ . '/../vendor/autoload.php';

Co\run(function() {
  go(function() {
    while (true) {
      sleep(1);

      echo 'Process 1' . PHP_EOL;
      echo date('H:i:s') . PHP_EOL;
    }
  });

  go(function() {
    while (true) {
      sleep(1);

      echo 'Process 2' . PHP_EOL;
      echo date('H:i:s') . PHP_EOL;
    }
  });

  go(function() {
    while (true) {
      sleep(1);

      echo 'Process 3' . PHP_EOL;
      echo date('H:i:s') . PHP_EOL;
    }
  });
});
